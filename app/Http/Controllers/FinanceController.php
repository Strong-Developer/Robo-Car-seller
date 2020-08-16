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

class FinanceController extends Controller
{

	public function manageFinance(Request $request)
    {
        if (!isset($request->upc_product_code)){
            $upc_product_code = null;
        }else{
            $upc_product_code = $request->upc_product_code;
        }
        $all_seller_products = Product::where('seller_id', Auth::user()->getAuthIdentifier())->get();
        if ($upc_product_code == null){
            $productFinanceData = [];
            $product_title = '';
            return view('finance.manage',['productFinanceData'=> $productFinanceData, 'all_seller_products' => $all_seller_products, 'product_title' => $product_title]);
        }else {
            $data = array(
                'api_password' => $this->api,
                'upc_product_code' => $upc_product_code,
                'seller_email' => Auth::user()->email_address
            );

            $HOST = $this->host;
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => $HOST."/api/seller-finance-parameters/show",
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

            $product_title = Product::where('upc_product_code', $upc_product_code)->first()->product_title;
            
            if($result['success'] == true){
                $result = $result['seller_finance_parameters'];
                $result =  $result['seller_finance_sub_parameters'];
                $result = $result[0];
                $result['upc_product_code'] = $upc_product_code;                
            } else {
                return view('finance.manage',['all_seller_products' => $all_seller_products, 'product_title' => $product_title]);
            } 
            
            curl_close($curl);
            $productFinanceData = json_decode(json_encode($result));  
                    

            return view('finance.manage',['productFinanceData'=> $productFinanceData, 'all_seller_products' => $all_seller_products, 'product_title' => $product_title]);
        }
    }

	public function addFinanceParameters(Request $request) {

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
                'seller_negotiation_mode' => Auth::user()->negotiation,
                'seller_orignal_quantity' => $request->get('quantity_for_financing'),
            ];
            
            $financeParameters = $request->get('finance_sub_parameter');
            foreach($financeParameters as $key => $financeParam) {
                foreach($financeParam as $key2=>$value) {                   
                        $data['finance_sub_parameter['.$key.']['.$key2.']'] = $value;                    
                }
            }

            $HOST = $this->host;
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => $HOST."/api/seller-finance-parameters/store",
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
                    return redirect('/add-finance-parameters')->with('success',"finance Parameters has been added successfully.");
                } else {
                    
                    return redirect('/add-finance-parameters')->with('error',"Error occured. Please try again later.");
                }
            }else{
                return redirect('/add-finance-parameters')->with('error',"Error occured. Please try again later.");

            }

        }
        return view('finance.add-finance-parameters', ['prodsData' => $prodsData]);
    }


    public function editFinanceParameters(Request $request) {
        $prodCode = $request->get('prodcode');
        $HOST = $this->host;
        if(!empty($prodCode)) {
            if($request->method() == 'POST') {
                $data = [
                'api_password' => (!empty($request->get('api_key'))?$request->get('api_key'):$this->api),
                'upc_product_code' => $prodCode,
                'seller_email' => Auth::user()->email_address,
                'seller_orignal_quantity' => $request->get('seller_orignal_quantity'),
                'seller_negotiation_mode' => Auth::user()->negotiation
                ];

                $financeParameters = $request->get('finance_sub_parameter');

                foreach($financeParameters as $key => $financeParam) {
                    foreach($financeParam as $key2=>$value) {
                        $data['finance_sub_parameter['.$key.']['.$key2.']'] = $value;
                    }
                }

                $curl = curl_init();
                curl_setopt_array($curl, array(
                CURLOPT_URL => $HOST."/api/seller-finance-parameters/update",
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

                // var_dump($result);
                // die();

                if(isset($result)){
                    if($result['success'] == true){
                        return redirect('/manage-finance-parameters')->with('success',"Finance Parameters has been updated successfully.");
                    } else {
                        return redirect('/manage-finance-parameters')->with('error',"Error occured. Please try again later.");
                    }
                }else{
                    return redirect('/manage-finance-parameters')->with('error',"Error occured. Please try again later.");
                }
            }
            $data = array(
                'api_password' => $this->api,
                'upc_product_code' => $prodCode,
                'seller_email' => Auth::user()->email_address
            );


            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => $HOST."/api/seller-finance-parameters/show",
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
            if(isset($response['seller_finance_parameters'])) {
                $productFinanceData = json_decode(json_encode($response['seller_finance_parameters']));
                $sellerDeal = json_decode(json_encode($response['seller_deal']));
                // var_dump($productFinanceData);
                // var_dump($sellerDeal);
                // die();
            }else{
                return redirect()->back();
            }

            return view('finance.edit-finance-parameters',['productFinanceData'=> $productFinanceData,'sellerDeal'=>$sellerDeal]);
        }
         return redirect()->back();
    }

    public function deleteFinance(Request $request) {
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
            CURLOPT_URL => $HOST."/api/seller-finance-parameters/delete",
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
                    return redirect('/manage-finance-parameters')->with('success',"Finance Parameters has been deleted successfully.");
                } else {
                    return redirect('/manage-finance-parameters')->with('error',"Error occured. Please try again later.");
                }
            }else{
                return redirect('/manage-finance-parameters')->with('error',"Error occured. Please try again later.");
            }
        }
    }

    public function getFinanceParameters(Request $request) {
        
        $data = array(
            'api_password' => $this->api,
            'upc_product_code' => $request->get('upc_product_code'),
            'seller_email' => $request->get('seller_email')
        );

        $HOST = $this->host;
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $HOST."/api/seller-finance-parameters/show",
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

    public function addBuyerFinanceParameters(Request $request) {
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
            'interest_rate' => $request->get('interest_rate'),
            'duration_in_month' => $request->get('duration_in_month'),
            'credti_score' => $request->get('credti_score'),
            'buyer_finance_offer_price' => $request->get('buyer_finance_offer_price'),
            'buyer_highest_finance_offer_price' => $request->get('buyer_highest_finance_offer_price'),
            'buyer_negotiation_mode' => $request->get('buyer_negotiation_mode'),
            'expiry_date' => date('Y-m-d', strtotime("+10 days")),
            'seller_finance_parameter_id' => $request->get('seller_finance_parameter_id')
        );
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $HOST."/api/buyer-finance-parameters",
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

    public function updateBuyerFinanceParameters(Request $request) {
        $HOST = $this->host;
        $data = array(
            'api_password' => $this->api,
            'upc_product_code' => $request->get('upc_product_code'),
            'buyer_email' => $request->get('buyer_email'),
            'buyer_phone' => $request->get('buyer_phone'),
            'buyer_currency' => $request->get('buyer_currency'),
            'buyer_zip' => $request->get('buyer_zip'),
            'buyer_highest_finance_offer_price' => $request->get('buyer_highest_finance_offer_price'),
            'buyer_negotiation_mode' => $request->get('buyer_negotiation_mode'),
            'expiry_date' => date('Y-m-d', strtotime("+10 days")),
            'service_request_id' => $request->get('service_request_id')
        );
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $HOST."/api/buyer-finance-parameters/update",
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
