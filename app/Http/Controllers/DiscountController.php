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

class DiscountController extends Controller
{

//	public function manageDiscount(Request $request)
//    {
//        $productDiscountData = [];
//        return view('discount.manage',['productDiscountData'=>$productDiscountData]);
//    }

	public function manage_discounts_rebates(Request $request)
    {
        if (!isset($request->upc_product_code)){
            $upc_product_code = null;
        }else{
            $upc_product_code = $request->upc_product_code;
        }
        $all_seller_products = Product::where('seller_id', Auth::user()->getAuthIdentifier())->get();
        if ($upc_product_code == null){
            $productDiscountData = [];
            $product_title = '';
            return view('discount.manage',['productDiscountData'=> $productDiscountData, 'all_seller_products' => $all_seller_products, 'product_title' => $product_title]);
        }else {
            $data = array(
                'api_password' => $this->api,
                'upc_product_code' => $upc_product_code,
                'seller_email' => Auth::user()->email_address
            );
            $HOST = $this->host;
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $HOST . "/api/product/discounts",
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
            $response = json_decode( $response , true);
            $product_title = Product::where('upc_product_code', $upc_product_code)->first()->product_title;
            $productDiscountData = json_decode(json_encode($response['data']));
            return view('discount.manage',['productDiscountData'=> $productDiscountData, 'all_seller_products' => $all_seller_products, 'product_title' => $product_title]);
        }
    }

	public function edit_product_discount_rebate(Request $request)
    {
        if (!isset($request->upc_product_code)){
            $upc_product_code = null;
        }else{
            $upc_product_code = $request->upc_product_code;
        }
        $data = array(
            'api_password' => $this->api,
            'upc_product_code' => $upc_product_code,
            'seller_email' => Auth::user()->email_address
        );
        $HOST = $this->host;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $HOST . "/api/product/discounts",
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
        $response = json_decode( $response , true);
        if(isset($response)){
            foreach($response['data'] as $one){
                if($one['id'] == $request->discount_id){
                    $discount_data = json_decode(json_encode($one));
                    return view('discount.update-discount', compact('discount_data'));
                }else{
                    continue;
                }
            }
        }
        $discount_data = [];
        return view('discount.update-discount', compact('discount_data'));
    }

    public function update_product_discount_rebate(Request $request)
    {
        $data = [
            'api_password' => $this->api,
            'upc_product_code' => $request->get('product'),
            'seller_email' => Auth::user()->email_address,
            '_method' => 'PUT'
        ];

        $dTypes = $request->get('discount_types');

        foreach($dTypes as $key => $dis) {
            // Validation
//            $discount_title = $dTypes[$key]['title'];
//            if (!preg_match("/^[a-zA-Z ]*$/",$discount_title)) {
//                return redirect(route('manage-discounts-rebates', ['upc_product_code' => $request->get('product')]))->with('error',"Only letters and white space allowed in Discount Title.");
//            }
//            if ($dTypes[$key]['amount'] <= 0){
//                return redirect(route('manage-discounts-rebates', ['upc_product_code' => $request->get('product')]))->with('error',"Amount must be greater then 0.");
//            }
//            if ($dTypes[$key]['qty'] <= 0){
//                return redirect(route('manage-discounts-rebates', ['upc_product_code' => $request->get('product')]))->with('error',"Quantity must be greater then 0.");
//            }

            if(!isset($dTypes[$key]['applicability'])) {
                $data['discount_types['.$key.'][applicability]'] = 'specific';
            }
            foreach($dis as $key2=>$value) {
                if($key2 == 'qty') {
                    if(!empty($value)) {
                        $data['discount_types['.$key.']['.$key2.']'] = $value;
                    }
                } else{
                    $data['discount_types['.$key.']['.$key2.']'] = $value;
                }
            }
        }
        $HOST = $this->host;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $HOST . "/api/product/discount/" . $request->discount_id,
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
        $result = json_decode( $response , true);
        if(isset($result)){
            if($result['success'] == 1){
                return redirect(route('manage-discounts-rebates', ['upc_product_code' => $request->get('product')]))->with('success',"Product discount has been updated successfully.");
            } else {
                return redirect(route('manage-discounts-rebates', ['upc_product_code' => $request->get('product')]))->with('error',"Error occured. Please try again later.");
            }
        }else{
            return redirect(route('manage-discounts-rebates', ['upc_product_code' => $request->get('product')]))->with('error',"Error occured. Please try again later.");
        }
    }

    public function delete_product_discount_rebate(Request $request)
    {
        $HOST = $this->host;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $HOST . "/api/product/delete-product-discount",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => array('product_discount_id' => $request->discount_id,'api_password' => $this->api),
            CURLOPT_HTTPHEADER => array(
                "Accept: application/json"
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($response, true);
        if($result['success'] == 1){
            return redirect()->back()->with('success',"Product discount has been deleted successfully.");
        } else {
            return redirect()->back()->with('error',"Error occured. Please try again later.");
        }
    }

    public function addProductDiscount(Request $request) {
        $products = Product::where('seller_id' , Auth::user()->getAuthIdentifier())->get() ;
        $prodsData = [];
        array_map(function($item) use (&$prodsData) {
                $prodsData[$item['upc_product_code']] = $item['product_title'];
        }, $products->toArray());
        if($request->method() == 'POST') {
            $this->setDiscountTypes($request);
        }
        return view('discount.add-discount', ['prodsData' => $prodsData]);

    }

    public function setDiscountTypes($request) {
        $data = [
            'api_password' => $this->api,
            'upc_product_code' => $request->get('product'),
            'seller_email' => Auth::user()->email_address
        ];
        $dTypes = $request->get('discount_types');

        foreach($dTypes as $key => $dis) {
            if(!isset($dTypes[$key]['applicability'])) {
                $data['discount_types['.$key.'][applicability]'] = 'specific';
            }
            foreach($dis as $key2=>$value) {
                if($key2 == 'qty') {
                    if(!empty($value)) {
                        $data['discount_types['.$key.']['.$key2.']'] = $value;
                    }else{
                        $data['discount_types['.$key.']['.$key2.']'] = -1;
                    }
                } else if($key2 == 'amount') {
                    if(!empty($value)) {
                        $data['discount_types['.$key.']['.$key2.']'] = $value;
                    }else{
                        $data['discount_types['.$key.']['.$key2.']'] = 0;
                    }
                }else{
                    $data['discount_types['.$key.']['.$key2.']'] = $value;
                }
            }
        }

        $HOST = $this->host;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $HOST . "/api/product/discount",
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
        $result = json_decode( $response , true) ;
        // print_r($dTypes);
        // print_r($result);die('test');
        if(isset($result)){
            if($result['success'] == 1){
                return redirect('/add-product-discount')->with('success',"Product discount has been added successfully.");
            } else {
                return redirect('/add-product-discount')->with('error',"Error occured. Please try again later.");
            }
        }else{
            return redirect('/add-product-discount')->with('error',"Error occured. Please try again later.");
        }
    }

    public function discounts_rebates_import(Request $request){
        $this->api = 'f07862522e9585ffd7ca6a6138ec262480b0d91f' ;
        $file = $request->file('csv_to_import');

        // File Details
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $tempPath = $file->getRealPath();
        $fileSize = $file->getSize();
        $mimeType = $file->getMimeType();
        // Valid File Extensions
        $valid_extension = array("csv");
        // 2MB in Bytes
        $maxFileSize = 20097152;
        // Check file extension
        if(in_array(strtolower($extension),$valid_extension)){
            // Check file size
            if($fileSize <= $maxFileSize){
                $path = $request->file('csv_to_import')->getRealPath();
                $data = array_map('str_getcsv', file($path));
                $csv_data = $data;
                $d_r_imported = 0;
                $errors = 0 ;
                $totalItems = 0;
                $parameters_array = ["UPC","Discount_Rebates","Discount_Value","Quantity","Discount_Expiry"];
                $row_key = [] ;

                $data = [
                    'api_password' => $this->api,
                    'upc_product_code' => $csv_data[1][0],
                    'seller_email' => Auth::user()->email_address
                ];

                foreach ($csv_data as $key => $row) {
                    if($key == 0){
                        foreach($row as $index => $one){
                            if($index == 0){
                                continue;
                            }else{
                                if($one == $parameters_array[$index]){
                                    continue;
                                }else{
                                    return redirect()->back()->with('error' , 'The Header of the CSV should be like this , please download the demo.');
                                }
                            }
                        }
                        foreach($parameters_array as $param ){
                            $row_key[$param] = array_search($param , $row);
                        }
                    }
                    else {
                        $totalItems++;
                        $expDate = Carbon::parse($row[$row_key['Discount_Expiry']])->format('Y-m-d');
                        $today = date('Y-m-d',time());
                        if(!empty($row[$row_key['UPC']]) && ($expDate > $today)) {
                            if (($row[$row_key['Discount_Rebates']] != '' || $row[$row_key['Discount_Rebates']] != null)) {
                                if (is_numeric($row[$row_key['Discount_Value']]) && is_numeric($row[$row_key['Quantity']]) && $row[$row_key['Discount_Value']] > 0 && $row[$row_key['Quantity']] > 0) {
                                    $key = $key - 1;
                                    foreach($row as $index => $value) {
                                        $data['discount_types['.$key.'][applicability]'] = 'all';
                                        if($index == 1) {
                                            $data['discount_types['.$key.'][title]'] = $value;
                                        }
                                        $data['discount_types['.$key.'][type]'] = 'buyer';
                                        $data['discount_types['.$key.'][value_type]'] = 'fixed';
                                        if($index == 2) {
                                            $data['discount_types['.$key.'][amount]'] = $value;
                                        }
                                        if($index == 3) {
                                            $data['discount_types['.$key.'][qty]'] = $value;
                                        }
                                        if($index == 4) {
                                            $data['discount_types['.$key.'][expiry_date]'] = $expDate;
                                        }
                                    }
                                } else{
                                    continue;
                                }
                            } else{
                                continue;
                            }
                        } else{
                            continue;
                        }
                    }
                }
                // curl request  here
                $HOST = $this->host;
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => $HOST . "/api/product/discount",
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
                $result = json_decode( $response , true) ;
                if($result['success'] == 1){
                    return redirect('/add-product-discount')->with('success',"Bulk discounts has been added successfully.");
                } else {
                    return redirect('/add-product-discount')->with('error',"Error occured. Please try again later.");
                }
            }else{
                return redirect()->back()->with('error','File size exceeds limit! please upload file less than or equal 20 M');
            }
        }else{
            return redirect()->back()->with('error','Invalid file extension , please upload in csv format!');
        }
    }
}
