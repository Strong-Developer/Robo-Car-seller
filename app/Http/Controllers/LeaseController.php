<?php

namespace App\Http\Controllers;

use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use App\Product;
use phpDocumentor\Reflection\Element;
use PHPMailer\PHPMailer\Exception;

class LeaseController extends Controller
{

	public function manageLease(Request $request)
    {
        if (!isset($request->upc_product_code)){
            $upc_product_code = null;
        }else{
            $upc_product_code = $request->upc_product_code;
        }
        $all_seller_products = Product::where('seller_id', Auth::user()->getAuthIdentifier())->get();
        if ($upc_product_code == null){
            $productLeaseData = [];
            $product_title = '';
            return view('lease.manage',['productLeaseData'=> $productLeaseData, 'all_seller_products' => $all_seller_products, 'product_title' => $product_title]);
        }else {
            $data = array(
                'api_password' => $this->api,
                'upc_product_code' => $upc_product_code,
                'seller_email' => Auth::user()->email_address
            );

            $HOST = $this->host;
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => $HOST."/api/seller-lease-parameters/show",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                "Accept: application/json"
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            $response = json_decode( $response , true);
            $product_title = Product::where('upc_product_code', $upc_product_code)->first()->product_title;
            if(isset($response['seller_lease_parameters'])) {
                $productLeaseData = json_decode(json_encode($response['seller_lease_parameters']));
            }else{
                $productLeaseData = [];
            }

            return view('lease.manage',['productLeaseData'=> $productLeaseData, 'all_seller_products' => $all_seller_products, 'product_title' => $product_title]);
        }
    }

	public function addLeaseParameters(Request $request) {
        $products = Product::where('seller_id' , Auth::user()->getAuthIdentifier())->get() ;
        $prodsData = [];
        array_map(function($item) use (&$prodsData) {
                $prodsData[$item['upc_product_code']] = $item['product_title'];
        }, $products->toArray());
        if($request->method() == 'POST') {
            $data = [
                'api_password' => (!empty($request->get('api_key'))?$request->get('api_key'):$this->api),
                'upc_product_code' => $request->get('product'),
                'seller_email' => Auth::user()->email_address,
                'seller_phone' => Auth::user()->cell_no,
                'money_factor' => $request->get('money_factor'),
                'tax_rate' => $request->get('state_tax_rate'),
                'seller_negotiation_mode' => Auth::user()->negotiation,
                'seller_orignal_quantity' => $request->get('quantity_for_leasing'),
            ];
            $leaseParameters = $request->get('lease_sub_parameter');
            foreach($leaseParameters as $key => $leaseParam) {
                foreach($leaseParam as $key2=>$value) {
                    if($key2 == 'residual_value') {
                        if(strpos($value, '%') !== false){
                            $msrp = $request->get('msrp');
                            $percentageValue = (float) $value;
                            $rValue = ($msrp * $percentageValue)/100;
                            $data['lease_sub_parameter['.$key.']['.$key2.']'] = $rValue;
                        } else{
                            $data['lease_sub_parameter['.$key.']['.$key2.']'] = $value;
                        }
                    }else{
                        $data['lease_sub_parameter['.$key.']['.$key2.']'] = $value;
                    }
                }
            }
            $HOST = $this->host;
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => $HOST."/api/seller-lease-parameters/store",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                "Accept: application/json"
            ),
            ));

            $response = curl_exec($curl);
            $result = json_decode( $response , true) ;
            curl_close($curl);
            if(isset($result)){
                if($result['success'] == true){
                    return redirect('/add-lease-parameters')->with('success',"Lease Parameters has been added successfully.");
                } else {
                    return redirect('/add-lease-parameters')->with('error',"Error occured. Please try again later.");
                }
            }else{
                return redirect('/add-lease-parameters')->with('error',"Error occured. Please try again later.");
            }

        }
        return view('lease.add-lease-parameters', ['prodsData' => $prodsData]);
    }

    public function editLeaseParameters(Request $request) {
        $prodCode = $request->get('prodcode');
        $HOST = $this->host;
        if(!empty($prodCode)) {
            if($request->method() == 'POST') {
                $data = [
                'api_password' => (!empty($request->get('api_key'))?$request->get('api_key'):$this->api),
                'upc_product_code' => $prodCode,
                'seller_email' => Auth::user()->email_address,
                'money_factor' => $request->get('money_factor'),
                'tax_rate' => $request->get('state_tax_rate'),
                'seller_negotiation_mode' => Auth::user()->negotiation
                ];
                $leaseParameters = $request->get('lease_sub_parameter');
                foreach($leaseParameters as $key => $leaseParam) {
                    foreach($leaseParam as $key2=>$value) {
                        if($key2 == 'residual_value') {
                            if(strpos($value, '%') !== false){
                                $msrp = $request->get('msrp');
                                $percentageValue = (float) $value;
                                $rValue = ($msrp * $percentageValue)/100;
                                $data['lease_sub_parameter['.$key.']['.$key2.']'] = $rValue;
                            } else{
                                $data['lease_sub_parameter['.$key.']['.$key2.']'] = $value;
                            }
                        }else{
                            $data['lease_sub_parameter['.$key.']['.$key2.']'] = $value;
                        }
                    }
                }
                $curl = curl_init();
                curl_setopt_array($curl, array(
                CURLOPT_URL => $HOST."/api/seller-lease-parameters/update",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $data,
                CURLOPT_HTTPHEADER => array(
                    "Accept: application/json"
                ),
                ));
                $response = curl_exec($curl);
                $result = json_decode( $response , true) ;
                curl_close($curl);
                if(isset($result)){
                    if($result['success'] == true){
                        return redirect('/manage-lease-parameters')->with('success',"Lease Parameters has been updated successfully.");
                    } else {
                        return redirect('/manage-lease-parameters')->with('error',"Error occured. Please try again later.");
                    }
                }else{
                    return redirect('/manage-lease-parameters')->with('error',"Error occured. Please try again later.");
                }
            }
            $data = array(
                'api_password' => $this->api,
                'upc_product_code' => $prodCode,
                'seller_email' => Auth::user()->email_address
            );


            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => $HOST."/api/seller-lease-parameters/show",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                "Accept: application/json"
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            $response = json_decode( $response , true);
            if(isset($response['seller_lease_parameters'])) {
                $productLeaseData = json_decode(json_encode($response['seller_lease_parameters']));
                $sellerDeal = json_decode(json_encode($response['seller_deal']));
            }else{
                Redirect::back();
            }

            return view('lease.edit-lease-parameters',['productLeaseData'=> $productLeaseData,'sellerDeal'=>$sellerDeal]);
        }
        Redirect::back();
    }

    public function deleteLease(Request $request) {
        $prodCode = $request->get('prodcode');
        $HOST = $this->host;
        if(!empty($prodCode)) {
            $data = [
                'api_password' => (!empty($request->get('api_key'))?$request->get('api_key'):$this->api),
                'upc_product_code' => $prodCode,
                'seller_email' => Auth::user()->email_address
            ];
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => $HOST."/api/seller-lease-parameters/delete",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                "Accept: application/json"
            ),
            ));

            $response = curl_exec($curl);
            $result = json_decode( $response , true) ;
            curl_close($curl);
            if(isset($result)){
                if($result['success'] == true){
                    return redirect('/manage-lease-parameters')->with('success',"Lease Parameters has been deleted successfully.");
                } else {
                    return redirect('/manage-lease-parameters')->with('error',"Error occured. Please try again later.");
                }
            }else{
                return redirect('/manage-lease-parameters')->with('error',"Error occured. Please try again later.");
            }
        }
    }

    public function getSellerLeaseParameters(Request $request) {
        $data = array(
            'api_password' => $this->api,
            'upc_product_code' => $request->get('upc_product_code'),
            'seller_email' => $request->get('seller_email')
        );

        $HOST = $this->host;
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $HOST."/api/seller-lease-parameters/show",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_HTTPHEADER => array(
            "Accept: application/json"
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $result = json_decode($response, true);
        if(isset($result['success'])){
            if($result['success'] == true){
                return $response;
            } else {
                return null;
            }
        }else{
            return null;
        }
    }

    public function addBuyerLeaseParameters(Request $request) {
        $HOST = $this->host;
        $data = array(
            'api_password' =>  $this->api,
            'upc_product_code' => $request->get('upc_product_code'),
            'buyer_email' => $request->get('buyer_email'),
            'buyer_phone' => $request->get('buyer_phone'),
            'buyer_currency' => $request->get('buyer_currency'),
            'buyer_zip' => $request->get('buyer_zip'),
            'seller_catalog_id' => '',
            'down_payment' => $request->get('down_payment'),
            'trade_in_value' => $request->get('trade_in_value'),
            'duration_in_month' => $request->get('duration_in_month'),
            'residual_value' => $request->get('residual_value'),
            'miles_allowed_per_year' => $request->get('miles_allowed_per_year'),
            'buyer_lease_offer_price' => $request->get('buyer_lease_offer_price'),
            'buyer_highest_lease_offer_price' => $request->get('buyer_highest_lease_offer_price'),
            'buyer_negotiation_mode' => $request->get('buyer_negotiation_mode'),
            'expiry_date' => date('Y-m-d', strtotime("+10 days")),
            'seller_lease_parameter_id' => $request->get('seller_lease_parameter_id')
        );
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $HOST."/api/buyer-lease-parameters",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_HTTPHEADER => array(
            "Accept: application/json"
        ),
        ));
        $response = curl_exec($curl);

        curl_close($curl);
        $result = json_decode($response, true);
        if(isset($result['success'])){
            if($result['success'] == 1){
                return $response;
            } else {
                return null;
            }
        }else{
            return null;
        }

    }

    public function updateBuyerLeaseParameters(Request $request) {
        $HOST = $this->host;
        $data = array(
            'api_password' => $this->api,
            'upc_product_code' => $request->get('upc_product_code'),
            'buyer_email' => $request->get('buyer_email'),
            'buyer_phone' => $request->get('buyer_phone'),
            'buyer_currency' => $request->get('buyer_currency'),
            'buyer_zip' => $request->get('buyer_zip'),
            'seller_catalog_id' => '',
            'buyer_highest_lease_offer_price' => $request->get('buyer_highest_lease_offer_price'),
            'buyer_negotiation_mode' => $request->get('buyer_negotiation_mode'),
            'expiry_date' => date('Y-m-d', strtotime("+10 days")),
            'service_request_id' => $request->get('service_request_id')
        );
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $HOST."/api/buyer-lease-parameters/update",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_HTTPHEADER => array(
            "Accept: application/json"
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $result = json_decode($response, true);
        if(isset($result['success'])){
            if($result['success'] == true){
                return $response;
            } else {
                return null;
            }
        }else{
            return null;
        }
    }
}
