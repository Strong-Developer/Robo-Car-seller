<?php
namespace App\Http\Controllers;

use App\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterHandler extends Controller
{
    public function addSeller(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'first_name' => 'required|alpha',
            'email_id' => 'required|email',
            'zip' => 'required|postal_code:NL,DE,FR,BE,US',
            'password' => 'required|min:8|confirmed'
        ]);
        $currency = $request['currency'];
        if($currency == "Select Currency"){
            return response()->json([
                'success' => false,
                'errors' => json_decode(json_encode(array('currency' => array('Currency Not Selected'))), false)
            ]);
        }
        $phone = $request['contact_number'];
        if ($this->validate_phone_number($phone) == false) {
            return response()->json([
                'success' => false,
                'errors' => json_decode(json_encode(array('contact_number' => array('Invalid Phone Number'))), false)
            ]);
        }
        if ($validation->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validation->errors()
            ]);
        }
        $data = [
            'first_name' => $request['first_name'], // FROM FORM
            'email_id' => $request['email_id'], // FROM FORM
            'contact_number' => $request['contact_number'], // FROM FORM
            'currency' => $request['currency'],
            'api_password' => $this->api, // ASK ME
            'zip' => $request['zip']
        ];
        $HOST = $this->host;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $HOST . "/api/addSeller",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            return $err;
        } else {
            $result = json_decode($response, true);
            if ($result['success'] === true) {
                $create_seller = Seller::create([
                    'first_name' => $request['first_name'],
                    'last_name' => $request['last_name'],
                    'company_name' => $request['company_name'],
                    'zip_code' => $request['zip'],
                    'email_address' => $request['email_id'],
                    'password' => bcrypt($request['password']),
                    'cell_no' => $request['contact_number'],
                    'negotiation' => $request['negotiation'],
                    'currency' => !empty($request['currency'])?$request['currency']:'USD'
                ]);
                Auth::loginUsingId($create_seller->id);
            }
            return $response;
        }
    }

    public function validate_phone_number($phone)
    {
        // Allow +, - and . in phone number
        $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
        // Remove "-" from number
        $phone_to_check = str_replace("-", "", $filtered_phone_number);
        // Check the lenght of number
        // This can be customized if you want phone number from a specific country
        if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
            return false;
        } else {
            return true;
        }
    }
}
