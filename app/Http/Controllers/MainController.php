<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function page_one(){
        return view('page_one');
    }
    public function page_two(Request $request){
        return view('page_two', compact('request'));
    }
    public function api_curl_request($url, $post_data){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $post_data,
    ));
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response);
    }
    public function api_call(Request $request){
        $HOST = $this->host;
        if($request->qty > 0){
            if($request->role == "Seller"){
                if($request->mode == "Auto"){
                    if($request->seller_deal_price > $request->seller_lowest_deal_price){
                        $post_data = array('api_password' => $request->api_key, 'upc_product_code' => $request->upc_product_code, 'seller_email' => $request->email_address,'seller_phone' => $request->phone_number, 'seller_first_name' => $request->first_name,'seller_orignal_quantity' => $request->qty,'title' => $request->title,'category' => $request->category,'seller_deal_price' => $request->seller_deal_price,'seller_lowest_deal_price' => $request->seller_lowest_deal_price,'parameter1' => $request->parameter1,'parameter2' => $request->parameter2,'parameter3' => $request->parameter3, 'seller_currency' => 'USD', 'seller_negotiation_mode' => strtolower($request->mode));
                    }else{
                        return redirect('/demo')->with('error', json_encode(array(array('Target Sell Price must be greater then Lowest Sell Price.'))));
                    }
                }else{
                    $post_data = array('api_password' => $request->api_key, 'upc_product_code' => $request->upc_product_code, 'seller_email' => $request->email_address,'seller_phone' => $request->phone_number, 'seller_first_name' => $request->first_name,'seller_orignal_quantity' => $request->qty,'title' => $request->title,'category' => $request->category,'seller_deal_price' => $request->seller_deal_price,'parameter1' => $request->parameter1,'parameter2' => $request->parameter2,'parameter3' => $request->parameter3, 'seller_currency' => 'USD', 'seller_negotiation_mode' => strtolower($request->mode));
                }
                $url = $HOST."/api/addSellerDeal";
                $response = $this->api_curl_request($url, $post_data);
                if(!isset($response->success)){
                    return redirect('/demo')->with('error', json_encode($response->errors));
                }else{
                    return redirect('/demo')->with('success', $response->message);
                }
            }
        }else{
            return redirect('/demo')->with('error', json_encode(array(array('Quantity must be greater then 0.'))));
        }
        if($request->role == "Buyer"){
            if($request->qty > 0){
                if($request->mode == "Auto"){
                    if($request->committed_offer < $request->highest_offer){
                        $post_data = array('api_password' => $request->api_key, 'upc_product_code' => $request->upc_product_code, 'buyer_email' => $request->email_address, 'buyer_phone' => $request->phone_number, 'buyer_orignal_quantity' => $request->qty, 'buyer_offer_price' => $request->committed_offer,'buyer_highest_offer_price' => $request->highest_offer, 'buyer_negotiation_mode' => strtolower($request->mode));
                    }else{
                        return redirect('/demo')->with('error', json_encode(array(array('Committed Offer must be less then Highest Offer.'))));
                    }
                }else{
                    $post_data = array('api_password' => $request->api_key, 'upc_product_code' => $request->upc_product_code, 'buyer_email' => $request->email_address, 'buyer_phone' => $request->phone_number, 'buyer_orignal_quantity' => $request->qty, 'buyer_offer_price' => $request->committed_offer, 'buyer_negotiation_mode' => strtolower($request->mode));
                }
                $url = $HOST."/api/addBuyerOffer";
                $response = $this->api_curl_request($url, $post_data);
                if($response->success == false){
                    return redirect('/demo')->with('error', json_encode($response->errors));
                }else{
                    return redirect('/demo')->with('success', $response->message);
                }
            }else{
                return redirect('/demo')->with('error', json_encode(array(array('Quantity must be greater then 0.'))));
            }
        }
    }
}
