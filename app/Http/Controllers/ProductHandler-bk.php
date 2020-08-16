<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductImage;
use App\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PHPMailer\PHPMailer\Exception;

class ProductHandler extends Controller
{



     protected $products ;
     public $host ;

     public function __construct(Request $request)
     {

       // $this->api = $request->get('api_key') ;

        if($request->get('plugin_mode') === 'live'){
            //$this->host = Config::get('endpoint')['live_host'] ;
            $this->host = 'http://beta.robonegotiator.online';
        } else {
            //$this->host = Config::get('endpoint')['sandbox_host'] ;
            $this->host = 'http://beta.robonegotiator.online';

        }
     }


     /*
     * @monish 10/03/20
     */
    public function addProduct(Request $request){

        //return $request->all();

        $request['expiry_date'] = Carbon::parse($request->get('expiry_date'))->format('Y-m-d');

        $data = [
            'upc_product_code' =>$request['upc_product_code'],// From Form
            'title' => $request['product_title'],// From Form
            'seller_email' =>  Auth::user()->email_address,// From Form
            'category' => $request->get('category'),// Drop Down - Automobiles, Real Estate, Electronics, Industrial,
            // Others
            'api_password' =>$this->api,// GIVEN ABOVE - SAME
            'parameter1' =>  $request->get('make'),// From Form
            'parameter2' =>  $request->get('model'),// From Form
            'parameter3' =>  $request->get('condition'),// From Form
            'parameter4' =>  $request->get('color'),// From Form
            'parameter5' =>  $request->get('size'),// From Form
        ];

        $HOST = $this->host;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            //    CURLOPT_PORT => "8000",
            CURLOPT_URL => $HOST . "/api/addProduct",
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


        $result = json_decode($response , true);

        if($result['success'] === true) {

            $register_seller_deal =  $this->addSellerDeal($request);

            $register_seller_deal_result = json_decode($register_seller_deal , true);
            $save_product = Product::create([
               'seller_id' => Auth::user()->getAuthIdentifier(),
               'request_id' => $register_seller_deal_result['request_id'],
               'product_title' => $request->get('product_title') ,
               'upc_product_code'=> $request->get('upc_product_code'),
               'make' => $request->get('make'),
               'model' => $request->get('model'),
               'condition' => $request->get('condition'),
               'color' => $request->get('color') ,
               'size' => $request->get('size') ,
               'url' => $request->get('url'),
               'price' => str_replace(',','',$request->get('price')),
               'seller_original_quantity' => $request->get('seller_original_quantity'),
               'category' => $request->get('category'),
               'special_deal_price' => str_replace(',','',$request->get('special_deal_price')),
               'lowest_price'=> str_replace(',','',$request->get('lowest_price')),
               'deal_expiry_date' => $request->get('expiry_date'),
               'product_description' => $request->get('product_description'),
            ]);


           if($request->product_img !== null) {

               foreach ($request->product_img as $item) {

                   $file = $item;

                   $path = Storage::disk('local')->put(time() . $file->getClientOriginalName(), $file);

                   ProductImage::create([
                       'product_id' => $save_product->id, 'product_upc_code' => $save_product->upc_product_code, 'file_path' => $path
                   ]);

               }

           }


           //session()->put('success','Your Product is uploaded in your catalog and special Deal for RoboNegotiator has been sent to RoboNegotiator. RoboNegotiator will find/ match new buyers soon');
           session()->put('success','Your Product is uploaded in your <a target="_blank" href="'.route('home.catalog').'">Product Catalog</a> and a special deal for RoboNegotiator has been sent. Website visitors will be able to negotiate soon');
           return redirect()->back() ;
        }


        if(array_key_exists('errors', $result)){
            return redirect()->back()->withErrors($result['errors'])->withInput($request->all());
        }

        session()->put('error','Something went wrong to add the deal !');

        return redirect()->back()->withInput($request->all());



    }

    public function importDealsFromCSV(Request $request){

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
                $product_imported = 0 ;
                $errors = 0   ;
                $totalItems = 0;
                $parameters_array =  ["Category","Product_title","UPC_product_code","Attribute_1","Attribute_2","Attribute_3","Attribute_4","Attribute_5","URL","Listing_price","Special_deal_price","Lowest_price","Quantity","Expiry_date","Images"] ;
                $row_key = [] ;
                foreach ($csv_data as $key => $row) {
                    $totalItems++;
                    if($key === 0){
                        if($row !== $parameters_array){
                            session()->put('error' , 'The Header of the CSV should be like this , please download the demo ');
                            return redirect()->back() ;
                        }
                        foreach($parameters_array as $ind => $param ){
                            $row_key[$param] = array_search($param , $row) ;
                        }
                    } 
                    else {
                        if (($row[$row_key['Images']] != '' || $row[$row_key['Images']] != null) && ($row[$row_key['Listing_price']] != '' || $row[$row_key['Listing_price']] != null) && ($row[$row_key['Special_deal_price']] != '' || $row[$row_key['Special_deal_price']] != null)) {
                            if (is_numeric($row[$row_key['Special_deal_price']]) && is_numeric($row[$row_key['Listing_price']]) && $row[$row_key['Special_deal_price']] > 0 && $row[$row_key['Listing_price']] > 0) {
                                try {
                                    $data = [
                                        'upc_product_code' => $row[$row_key['UPC_product_code']],// From Form
                                        'title' => $row[$row_key['Product_title']],// From Form
                                        'seller_email' => Auth::user()->email_address,// From Form
                                        'category' => $row[$row_key['Category']],// Drop Down - Automobiles, Real Estate, Electronics,Industrial, Others
                                        'api_password' => $this->api,// GIVEN ABOVE - SAME
                                        'parameter1' => $row[$row_key['Attribute_1']],// From Form
                                        'parameter2' => $row[$row_key['Attribute_2']],// From Form
                                        'parameter3' => $row[$row_key['Attribute_3']],// From Form
                                        'parameter4' => $row[$row_key['Attribute_4']],// From Form
                                        'parameter5' => $row[$row_key['Attribute_5']],// From Form
                                    ];

                                    $HOST = $this->host;
                                    $curl = curl_init();
                                    curl_setopt_array($curl, array(
                                        //    CURLOPT_PORT => "8000",
                                        CURLOPT_URL => $HOST . "/api/addProduct",
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
                                    $result = json_decode($response, true);

                                    if ($result['success'] === true) {

                                        $data = [
                                            'api_password' => $this->api,
                                            'seller_email' => Auth::user()->email_address,
                                            'seller_phone' => Auth::user()->cell_no,
                                            'seller_first_name' => Auth::user()->first_name,
                                            'seller_currency' => 'USD',
                                            'seller_zip' => Auth::user()->zip_code,
                                            'parameter1' => $row[$row_key['Attribute_1']],
                                            'parameter2' => $row[$row_key['Attribute_2']],
                                            'parameter3' => $row[$row_key['Attribute_3']],
                                            'parameter4' => $row[$row_key['Attribute_4']],
                                            'parameter5' => $row[$row_key['Attribute_5']],
                                            'seller_negotiation_mode' => Auth::user()->negotiation,
                                            'upc_product_code' => $row[$row_key['UPC_product_code']],
                                            'title' => $row[$row_key['Product_title']],
                                            'seller_orignal_quantity' => $row[$row_key['Quantity']],
                                            'category' => $row[$row_key['Category']],
                                            'seller_deal_price' => str_replace(',', '', $row[$row_key['Special_deal_price']]),
                                            'seller_lowest_deal_price' => str_replace(',', '', $row[$row_key['Lowest_price']]),
                                            'expiry_date' => Carbon::parse($row[$row_key['Expiry_date']])->format('Y-m-d')
                                        ];

                                        // $HOST = "http://robo.liaison.website";
                                        //$HOST = "http://beta.robonegotiator.online";
                                        $HOST = $this->host;
                                        $curl = curl_init();
                                        curl_setopt_array($curl, array(
                                            CURLOPT_URL => $HOST . "/api/addSellerDeal",
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
                                        $dealResult = json_decode($response , true);

                                        if ($dealResult['success'] === true) {
                                            $save_product = Product::create([
                                                'seller_id' => Auth::user()->getAuthIdentifier(),
                                                'product_title' => $row[$row_key['Product_title']], 
                                                'upc_product_code' =>$row[$row_key['UPC_product_code']], 
                                                'make' => $row[$row_key['Attribute_1']], 
                                                'model' =>$row[$row_key['Attribute_2']], 
                                                'condition' => $row[$row_key['Attribute_3']],
                                                'color' => $row[$row_key['Attribute_4']], 
                                                'size' => $row[$row_key['Attribute_5']], 
                                                'url' =>$row[$row_key['URL']],
                                                'price' => str_replace(',', '', $row[$row_key['Listing_price']]),
                                                'seller_original_quantity' => $row[$row_key['Quantity']],
                                                'category' =>$row[$row_key['Category']], 
                                                'special_deal_price' => str_replace(',', '', $row[$row_key['Special_deal_price']]),
                                                'lowest_price' => str_replace(',', '', $row[$row_key['Lowest_price']]), 
                                                'deal_expiry_date' =>Carbon::parse($row[$row_key['Expiry_date']])
                                            ]);

                                            if ($row[$row_key['Images']] !== null) {
                                                $images = explode(',', $row[$row_key['Images']]);
                                                foreach ($images as $item) {
                                                    try {
                                                        $img_url = $item;
                                                        ProductImage::create([
                                                            'product_id' => $save_product->id, 'product_upc_code' =>$save_product->upc_product_code, 'file_path' => $img_url
                                                        ]);
                                                    } 
                                                    catch (Exception $exception){

                                                    }
                                                }
                                            }
                                            $product_imported++;
                                            session()->put('success', $product_imported . 'Out of '.$totalItems.' from your product list has been uploaded in your <a target="_blank" href="'.route('home.catalog').'">Product Catalog</a> and a special deal for RoboNegotiator has been sent. Website visitors will be able to negotiate soon.');
                                        }
                                        else{
                                            session()->put('error','Something went wrong to add the deal !');
                                        }
                                    } else {
                                        if (array_key_exists('errors', $result)) {
                                            $errors++ ;
                                        } else {
                                            $errors++ ;
                                        }
                                    }
                                } catch (Exception $exception){
                                    $errors++ ;
                                }
                            }
                            else{
                                session()->put('error' , 'Invalid Price Format');
                                return redirect()->back();
                            }
                        }
                        else{
                            session()->put('error' , 'Some Item(s) have Some Errors. Please Check Required Fields and Re Upload the File');
                            return redirect()->back() ;   
                        }
                    }
                }

                return redirect()->back()->with('errors_seller' , $errors) ;


            }else{

                session()->put('error','File size exceeds limit ! please upload file less than or equal 20 M');

                return redirect()->back() ;

            }

        }else{

            session()->put('error','Invalid file extension , please upload in csv format !');

            return redirect()->back() ;
        }

    }



    public function addSellerDeal(Request $request){


           $data = [

               'api_password' => $this->api,
               'seller_email' => Auth::user()->email_address,
               'seller_phone' => Auth::user()->cell_no,
               'seller_first_name' => Auth::user()->first_name,
               'seller_currency' => 'USD',
               'seller_zip' => Auth::user()->zip_code,
               'parameter1' => $request->get('make'),
               'parameter2' => $request->get('model'),
               'parameter3' => $request->get('condition'),
               'parameter4' => $request->get('color'),
               'parameter5' => $request->get('size'),
               'seller_negotiation_mode' => Auth::user()->negotiation,
               'upc_product_code' => $request->get('upc_product_code'),
               'title' => $request->get('product_title'),
               'seller_orignal_quantity' => $request->get('seller_original_quantity'),
               'category' => $request->get('category'),
               'seller_deal_price' => str_replace(',','',$request->get('special_deal_price')),
               'seller_lowest_deal_price' => str_replace(',','',$request->get('lowest_price')) ,
                'expiry_date' =>  $request->get('expiry_date')



           ];
            $HOST = $this->host;
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $HOST . "/api/addSellerDeal",
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

           return $response ;


    }

    public function editDeal(Request $request){

         $deal = Product::where('id',$request->get('deal_id'))->with(['images'])->first();

         if($deal !== null){
             if($deal->images !== null) {
                 foreach ($deal->images as $image) {
                     if (strpos($image->file_path, 'http') !== false) {
                         $image->main_file_path = $image->file_path;
                     } else {
                         $image->main_file_path = url('storage/app/' . $image->file_path);
                     }
                 }
             }
             return view('edit-product')->with('product' , $deal) ;
         }

    }

    public function getAllProducts(Request $request){

        $products = Product::where('upc_product_code' , $request->get('upc_product_code'))->with(['seller','images'])->first();

        if($products){
            return $products;
        }else{
            $products = [
                "product_title"=>"BMW 328i",
            ];

            return $products;
        }

        
    }

    public function getProducts(Request $request){

       // return $request->all() ;
        $this->baseFilter($request) ;

        if($request->get('category') !== null) {

            $this->filterByCategory($request->get('category')) ;
        }

        if($request->get('condition') !== null) {

            $this->filterByCondition($request->get('condition')) ;
        }

        if($request->get('make') !== null) {

            $this->filterByMake($request->get('make')) ;
        }

        if($request->get('model') !== null) {

            $this->filterByModel($request->get('model')) ;
        }

        if($request->get('size') !== null) {

            $this->filterBySize($request->get('size')) ;
        }

        if($request->get('color') !== null) {

            $this->filterByCondition($request->get('color')) ;
        }


        if($request->get('order') === null) {

            $request['order'] = 'desc' ;
        }


        $this->order($request->get('order')) ;

        return $this->products ;


    }

    public function baseFilter(Request $request){

        $this->products = Product::where('product_title','<>', null ) ;

    }

    public function filterByCategory($category){

        $this->products = $this->products->where('category','=', $category) ;

    }

    public function filterByModel($model){

        $this->products = $this->products->where('model','=', $model) ;

    }

    public function filterByMake($make){

        $this->products = $this->products->where('make','=', $make) ;

    }

    public function filterBySize($size){

        $this->products = $this->products->where('size','=', $size) ;

    }

    /*
    * @monish 10/03/20
    */
    public function manageProducts(Request $request){

        $products = Product::where('seller_id','=' , Auth::user()->getAuthIdentifier())->with(['images'])->orderBy('id','desc')->paginate(50);

        //return $products;

        return view('manage-products')->with([
            'products' => $products
        ]);

    }

    public function filterByColor($color){

        $this->products = $this->products->where('color','=', $color) ;

    }

    public function filterByCondition($condition){

        $this->products = $this->products->where('condition','=', $condition) ;

    }


    public function order($order){

        $this->products = $this->products->with(['images'])->orderBy('id', $order)->paginate(50) ;

        foreach ($this->products  as $product){

            foreach ($product->images as $image) {
                if (strpos($image->file_path, 'http') !== false) {
                    $image->main_file_path = $image->file_path ;
                } else {
                    $image->main_file_path = 'storage/app/'.$image->file_path ;
                }
            }
        }


    }

    public function addBuyerOffer(Request $request){

        if($request->get('request_id') !== null) {
            return $this->updateBuyerOffer($request) ;
        }

        $request['api_password'] = $this->api ;


        $request['expiry_date'] = Carbon::parse($request->get('expiry_date'))->format('Y-m-d');

        $data = [

            'api_password' => $this->api,
            'buyer_email' => $request->buyer_email ,// From Form
            'buyer_phone' => $request->buyer_phone ,// From Form
            'buyer_orignal_quantity' => $request->buyer_original_quantity,//from Form
            'buyer_offer_price' =>$request->buyer_offer_price  ,// From Form
            'buyer_negotiation_mode' => $request->buyer_negotiation_mode, // From Question above
            'buyer_highest_offer_price' =>$request->buyer_highest_offer_price, // From Form
            'upc_product_code' =>$request->upc_product_code,// From Catalog stored before
            'buyer_currency' => 'USD',
            'buyer_zip' => $request->buyer_zip,// From Form
            'expiry_date' => $request->get('expiry_date'),

        ];


        $HOST = $this->host;
        //$HOST = "http://beta.robonegotiator.online";
        //$HOST = "http://me.liaison.website";
        // $HOST = "http://robo.liaison.website";
        //$HOST = "http://localhost:8000";
        $curl = curl_init();
        curl_setopt_array($curl, array(
            //    CURLOPT_PORT => "8000",
            CURLOPT_URL => $HOST . "/api/addBuyerOffer",
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


        //return $response ;
        $result = json_decode( $response , true) ;

        if($request->get('json_result') !== null){
            return response()->json( $result) ;
        }

        if(! array_key_exists('errors' , $result)) {
            session()->put('success' , 'Your offer for purchase has been sent to RoboNegotiator. You should hear directly from RoboNegotiator if there is a matching deal from any seller.');

            return redirect()->back() ;

        }

        return redirect()->back()->withErrors($result['errors'])->withInput($request->all());

    }


    public function updateBuyerOffer(Request $request){

        $request['api_password'] = $this->api ;


        $request['expiry_date'] = Carbon::parse($request->get('expiry_date'))->format('Y-m-d');

        $data = [

            'api_password' => $this->api,
            'request_id' => $request->get('request_id') ,
            'buyer_email' => $request->buyer_email ,// From Form
            'buyer_phone' => $request->buyer_phone ,// From Form
            'buyer_orignal_quantity' => $request->buyer_original_quantity,//from Form
            'buyer_offer_price' =>$request->buyer_offer_price  ,// From Form
            'buyer_negotiation_mode' => $request->buyer_negotiation_mode, // From Question above
            'buyer_highest_offer_price' =>$request->buyer_highest_offer_price, // From Form
            'upc_product_code' =>$request->upc_product_code,// From Catalog stored before
            'buyer_currency' => 'USD',
            'buyer_zip' => $request->buyer_zip,// From Form
            'expiry_date' => $request->get('expiry_date'),

        ];


        $HOST = $this->host;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            //    CURLOPT_PORT => "8000",
            CURLOPT_URL => $HOST . "/api/updateBuyerOffer",
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


        //return $response ;
        $result = json_decode( $response , true) ;

        if($request->get('json_result') !== null){
            return response()->json($result) ;
        }

        if(! array_key_exists('errors' , $result)) {
            session()->put('success' , 'Your offer for purchase has been sent to RoboNegotiator. You should hear directly from RoboNegotiator if there is a matching deal from any seller.');

            return redirect()->back() ;

        }

        return redirect()->back()->withErrors($result['errors'])->withInput($request->all())
            ;

    }

    public function getIntelligenceReport(Request $request){

        if($request->get('upc_product_code') !== null) {

            $data = [

                'api_password' => $this->api,

            ];
            $HOST = $this->host;
            $curl = curl_init();
            curl_setopt_array($curl, array(
                //    CURLOPT_PORT => "8000",
                CURLOPT_URL => $HOST . "/api/business/analytic/products/offers",
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

            $result = json_decode($response, true);

            if (array_key_exists('data', $result) && $result['data'] != []) {

                foreach($result['data'] as $key=>$row){
                    if($row['upc_product_code']==$request->get('upc_product_code')){
                        return $result['data'][$key];
                    }
                }

            }

            return $result;

        }

        return null ;

    }


    public function getMarketPriceOfProduct(Request $request){

        if($request->get('upc_product_code') !== null) {

            $market_prices = [];
            //for($year=2020;$year>=2010;$year--){

                if ($request->get('upc_product_code') == 'BMW_328i_White') {
                    $model = 'BMW 328i';
                    $year = '2012';
                    $color = 'White';
                }
                elseif($request->get('upc_product_code') == 'lexus_es330_green'){
                    $model = 'Lexus ES330';
                    $year = '2005';
                    $color = 'Green';
                }
                else{
                    $model = $request->get('upc_product_code');
                    $year = '2020';
                    $color = 'Red';   
                }

                $data = [

                    "model" => $model,
                    "color" => $color,
                    "year" => $year,
                    "zip" => "9163",
                ];
                $HOST = $this->host;
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    //    CURLOPT_PORT => "8000",
                    CURLOPT_URL => $HOST . "/api/getMarketPriceOfProduct",
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

                $result = json_decode($response, true);

                $market_prices[] = $result['market_price'];

            //}

            return $market_prices;

            /*if (array_key_exists('data', $result) && $result['data'] === []) {
                session()->put('success', 'No progress yet !');

            }

            return $result['data'];*/

        }

        return null ;

    }

    public function getDemographicsReport(Request $request)
    {
        if($request->get('upc_product_code') !== null) {

            $data = [
                'UPC_Product_Code' => "Lexus_ES330_Green",   
            ];

            /*** Highest Demographics ***/
            $HOST = $this->host;
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $HOST . "/api/getHighestInEachDemographics",
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

            $result1 = json_decode($response, true);

            /*** Indiviual Demographics ***/
            $HOST = $this->host;
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $HOST . "/api/getMostCommonDemographics",
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

            $result2 = json_decode($response, true);

            $results['no_of_Deals'] = $result1['total'];
            $results['Buyer_Age'] = $result1['max_param3'];
            $results['Buyer_Sex'] = $result1['max_param1'];
            $results['Buyer_Annual_Income'] = str_replace("-",'-$',$result1['max_param4']);
            $results['percenage_distribution'] = $result2['top_2_param_percentage_distribution'];
            $results['sex_of_buyer'] = $result2['parameter1_value'];
            $results['race'] = $result1['max_param2'];
            $results['age_group_of_buyer'] = $result2['parameter3_value'];
            $results['income_group_of_buyer'] =  str_replace("-",'-$',$result2['parameter2_value']);

            /*$price = explode('-', $result1['max_param4']);
            $age = explode('-', $result1['max_param3']);

            $results['min_price_highest_demo'] = $price[0];
            $results['max_price_highest_demo'] = $price[1];
            $results['min_age_highest_demo'] = $age[0];
            $results['max_age_highest_demo'] = $age[1];

            $price1 = explode('-', $result2['parameter2_value']);
            $age1 = explode('-', $result2['parameter3_value']);

            $results['min_price_indiviual_demo'] = $price1[0];
            $results['max_price_indiviual_demo'] = $price1[1];
            $results['min_age_indiviual_demo'] = $age1[0];
            $results['max_age_indiviual_demo'] = $age1[1];*/

            return $results;

        }
        
    }

    public function getDealIntelligence(Request $request){

        if($request->get('upc_product_code') !== null) {

            $data = [
                'UPC_Product_Code' => $request->get('upc_product_code'),   
            ];
            $HOST = $this->host;
            $curl = curl_init();
            curl_setopt_array($curl, array(
                //    CURLOPT_PORT => "8000",
                CURLOPT_URL => $HOST . "/api/getDealIntelligence",
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

            $result = json_decode($response, true);

            return $result ;

            if (array_key_exists('data', $result) && $result['data'] === []) {
                session()->put('success', 'No progress yet !');

            }

            if($result['success']){
                return $result['data'];
            }else{
                return false;
            }

        }

        return null ;

    }

    public function getmatchedBuyers(Request $request){

        if($request->get('upc_product_code') !== null) {

            $data = [

                'api_password' => $this->api,

            ];
            $HOST = $this->host;
            $curl = curl_init();
            curl_setopt_array($curl, array(
                //    CURLOPT_PORT => "8000",
                CURLOPT_URL => $HOST . "/api/business/analytic/products/matched/buyers",
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

            $result = json_decode($response, true);

            if (array_key_exists('data', $result) && $result['data'] != []) {

                foreach($result['data'] as $key=>$row){
                    if($row['upc_product_code']==$request->get('upc_product_code')){
                        return $result['data'][$key];
                    }
                }

            }

            return $result;

        }

        return null ;

    }

    /*
    * @monish 11/03/2020
    */
    public function getCustomerProfile(Request $request){

        if($request->get('buyer_email_id') != null) {

            $data = [
                'Buyer_Email' => $request->get('buyer_email_id'),   
            ];
            $HOST = $this->host;
            $curl = curl_init();
            curl_setopt_array($curl, array(
                //    CURLOPT_PORT => "8000",
                CURLOPT_URL => $HOST . "/getCustomerProfile",
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

            $result = json_decode($response, true);

            if($result){
                return view('customer-profile')->with([
                    'customer_details' => $result,
                ]);
            }else{
                $result['Buyer_Email'] = $request->get('buyer_email_id');
                return view('customer-profile')->with([
                    'customer_details' => $result,
                ]);
            }

            

        }

        return null;

    }


    /*public function getDealProgress(Request $request){


        if($request->get('upc_product_code') !== null) {

            $data = [
                'api_password' => $this->api,
                'upc_product_code' => $request->get('upc_product_code'),
                'seller_email' => Auth::user()->email_address
            ];
            //$HOST = "http://me.liaison.website";
            // $HOST = "http://robo.liaison.website";
            $HOST = "http://beta.robonegotiator.online";
            // $HOST = "http://localhost:8000";
            $curl = curl_init();
            curl_setopt_array($curl, array(
                //    CURLOPT_PORT => "8000",
                CURLOPT_URL => $HOST . "/api/getDealProgress",
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

            $result = json_decode($response, true);

            //return $result ;

            if (array_key_exists('data', $result) && $result['data'] === []) {
                session()->put('success', 'No progress yet !');

            }

            if($result['success']){
                return $result['data'];
            }else{
                return false;
            }

        }

        return null ;

    }*/

    /*
    * @monish 12/03/2020
    */
    public function editDealAction(Request $request){

        $pid = $request->get('pid');

        $data = [
            'request_id' => $request->get('request_id'),
            'api_password' =>$this->api,// GIVEN ABOVE - SAME
            'seller_email' =>  Auth::user()->email_address,// From Form
            'seller_phone' => Auth::user()->cell_no,
            'seller_first_name' => Auth::user()->first_name,
            'seller_orignal_quantity' => $request->get('seller_original_quantity'),
            'parameter1' =>  $request->get('make'),// From Form
            'parameter2' =>  $request->get('model'),// From Form
            'parameter3' =>  $request->get('condition'),// From Form
            'parameter4' =>  $request->get('color'),// From Form
            'parameter5' =>  $request->get('size'),// From Form
            'seller_deal_price' =>  $request->get('special_deal_price'),// From Form
            'seller_negotiation_mode' =>  'auto',// From Form
            'seller_lowest_deal_price' =>  $request->get('lowest_price'),// From Form
            'upc_product_code' =>$request['upc_product_code'],// From Form
            'title' => $request['product_title'],// From Form
            'category' => $request->get('category'),// Drop Down - Automobiles, Real Estate, Electronics, Industrial,
            // Others

        ];
        $HOST = $this->host;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            //    CURLOPT_PORT => "8000",
            CURLOPT_URL => $HOST . "/api/updateSellerDeal",
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


        $result = json_decode($response , true);

        if(isset($result['success']) && $result['success'] === true) {

            $save_product = [
               'seller_id' => Auth::user()->getAuthIdentifier(),
               'request_id' => $result['request_id'],
               'product_title' => $request->get('product_title') ,
               'upc_product_code'=> $request->get('upc_product_code'),
               'make' => $request->get('make'),
               'model' => $request->get('model'),
               'condition' => $request->get('condition'),
               'color' => $request->get('color') ,
               'size' => $request->get('size') ,
               'url' => $request->get('url'),
               'price' => str_replace(',','',$request->get('price')),
               'seller_original_quantity' => $request->get('seller_original_quantity'),
               'category' => $request->get('category'),
               'special_deal_price' => str_replace(',','',$request->get('special_deal_price')),
               'lowest_price'=> str_replace(',','',$request->get('lowest_price')),
               'deal_expiry_date' => $request->get('expiry_date'),
               'product_description' => $request->get('product_description'),
            ];

            $update = Product::where('id', $pid)->update($save_product);


            if($request->product_img !== null) {

                $delete = ProductImage::where('product_id', $pid)->delete();

               foreach ($request->product_img as $item) {

                   $file = $item;

                   $path = Storage::disk('local')->put(time() . $file->getClientOriginalName(), $file);

                   ProductImage::create([
                       'product_id' => $pid, 'product_upc_code' => $request->get('upc_product_code'), 'file_path' => $path

                   ]);

               }

           }
           session()->put('success','Deal Updated Successfully!');
            return redirect()->route('editProduct',['deal_id' => $pid]);
        }else{
            session()->put('error','Something went wrong to Update the deal!');

            return redirect()->route('editProduct',['deal_id' => $pid]);
        }
    }

    public function getDealProgress(Request $request){


        if($request->get('upc_product_code') !== null) {

            $data = [


                'api_password' => $this->api,
                'upc_product_code' => $request->get('upc_product_code'),
                'seller_email' => Auth::user()->email_address

            ];
            $HOST = $this->host;
            $curl = curl_init();
            curl_setopt_array($curl, array(
                //    CURLOPT_PORT => "8000",
                CURLOPT_URL => $HOST . "/api/getDealProgress",
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

            $result = json_decode($response, true);

            // return $response ;

            if (array_key_exists('data', $result) && $result['data'] === []) {
                session()->put('success', 'No progress yet !');

            }


            return $result['data'];

        }

        return null ;



    }


    public function setNegotiationRules(Request $request){


        $data = [


            'api_password' => $this->api,
            'seller_email' => Auth::user()->email_address,
            'upc_product_code' => $request->upc_product_code,
            'buyer_repeat_customer' =>$request->get('buyer_repeat_customer'), // Means adjustment towards pro-buyer if
            'buyer_more_quantity_percent' =>($request->get('buyer_more_quantity') / 10) * 100,
            'buyer_repeat_customer_percent' =>  ($request->get('buyer_repeat_customer') / 10) * 100 ,
            'buyer_repeat_customer_unit' =>'10',
            'buyer_aggressive_selling' => $request->get('buyer_aggressive_selling'), //Means adjustment towards
            // pro-buyer
            'buyer_aggressive_selling_percent' =>  ($request->get('buyer_aggressive_selling') / 10) *
                100 ,
            'buyer_aggressive_selling_unit' =>'10',

            'buyer_more_quantity' => $request->get('buyer_more_quantity'), //If buyer is buying more quantity (more than
            // 1),
            'buyer_more_quantity_unit' =>'10',
            'buyer_low_demand' => $request->get('buyer_low_demand'),
            'buyer_low_demand_percent' => ($request->get('buyer_low_demand') / 10) * 100 ,
            'buyer_low_demand_unit' =>'10',
            'seller_hot_item' => $request->get('seller_hot_item'),
            'seller_hot_item_percent' => ($request->get('seller_hot_item') / 10) * 100 ,
            'seller_hot_item_unit' =>'10',
            'seller_motivated_buyer' => $request->get('seller_motivated_buyer'),
            'seller_motivated_buyer_percent' => ($request->get('seller_motivated_buyer') / 10) * 100 ,
            'seller_motivated_buyer_unit' =>'10',
            'seller_shipping_cost' => $request->get('seller_shipping_cost'),
            'seller_shipping_cost_percent' => ($request->get('seller_shipping_cost') / 10) * 100 ,
            'seller_shipping_cost_unit' =>'10',
            'buyer_demographic' => $request->get('buyer_demographic'),
            'buyer_demographic_percent' => ($request->get('buyer_demographic') / 10) * 100 ,
            'buyer_demographic_unit' =>'10',
            'seller_historical_data' => $request->get('seller_historical_data'),
            'seller_historical_data_percent' =>($request->get('seller_historical_data') / 10) * 100 ,
            'seller_historical_data_unit' =>'10'
        ];
        $HOST = $this->host;
        //$HOST = "http://beta.robonegotiator.online";
        // $HOST = "http://robo.liaison.website";
        //$HOST = "http://localhost:8000";
        $curl = curl_init();
        curl_setopt_array($curl, array(
            //  CURLOPT_PORT => "8000",
            CURLOPT_URL => $HOST . "/api/addDealNegotiationParameters",
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


       if(array_key_exists('success' , $result) && $result['success'] === true){

           session()->put('success' , 'Negotiation rules saved successfully');

           return redirect()->back()->withInput($request->all()) ;

       }

        session()->put('error' , $result['messgae']);

        return redirect()->back()->withInput($request->all()) ;


    }



    public function instantDealCheck(Request $request){

        $request['api_password'] = $this->api ;


            $seller_email = $request->get('seller_email');


        $data = [

            'api_password' => $this->api,
            'seller_email' => $seller_email ,// From Form

            'upc_product_code' =>$request->upc_product_code,// From Catalog stored before

        ];


        $HOST = $this->host;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            //    CURLOPT_PORT => "8000",
            CURLOPT_URL => $HOST . "/api/instantDealCheck",
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


        //return $response ;
        $result = json_decode( $response , true) ;


        return response()->json($result) ;

    }





    public function checkBuyerOfferWithId(Request $request){


        if($request->get('upc_product_code') !== null) {

            $data = [

                'api_password' => $this->api,
                'upc_product_code' => $request->get('upc_product_code'),
                'request_id' => $request->get('request_id')

            ];
            $HOST = $this->host;
            $curl = curl_init();
            curl_setopt_array($curl, array(
                //    CURLOPT_PORT => "8000",
                CURLOPT_URL => $HOST . "/api/checkBuyerOfferWithId",
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

            $result = json_decode($response, true);


            return response()->json($result) ;

        }

        return null ;



    }


    public function getDealStatus(Request $request){


        if($request->get('upc_product_code') !== null) {

            $data = [

                'api_password' => $this->api,
                'upc_product_code' => $request->get('upc_product_code'),
                'request_id' => $request->get('request_id')

            ];
            //$HOST = "http://me.liaison.website";
            // $HOST = "http://robo.liaison.website";
            $HOST = $this->host;
            //$HOST = "http://beta.robonegotiator.online";
            // $HOST = "http://localhost:8000";
            $curl = curl_init();
            curl_setopt_array($curl, array(
                //    CURLOPT_PORT => "8000",
                CURLOPT_URL => $HOST . "/api/getDealStatus",
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

            $result = json_decode($response, true);


            return response()->json($result) ;

        }

        return null ;



    }


    public function savePayment(Request $request){


        if($request->get('upc_product_code') !== null) {

            $data = [

                'api_password' => $this->api,
                'buyer_email' => $request->get('buyer_email'),
                'upc_product_code' => $request->get('upc_product_code') ,
                'payment_id' => $request->get('payment_id') ,
                'payer_id' => $request->get('payer_id') ,
                'payment_token' => $request->get('payment_token') ,
                'transaction_id' => $request->get('transaction_id') ,
                'amount' => $request->get('amount') ,
                'currency' => 'USD'

            ];
            $HOST = $this->host;
            $curl = curl_init();
            curl_setopt_array($curl, array(
                //    CURLOPT_PORT => "8000",
                CURLOPT_URL => $HOST . "/api/savePaymentDetail",
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

            $result = json_decode($response, true);


            return response()->json($result) ;

        }

        return null ;



    }

    public function get_strip_payment(Request $request)
    {
        //return $request->all();
        $amount = $request->get('amount')*100;
        $secret_key = $request->get('secret_key');
        $token = $request->get('token');
        $currency = $request->get('currency');
        $description = $request->get('description');
        // Set your secret key. Remember to switch to your live secret key in production!
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey($secret_key);

        /*$session = \Stripe\Checkout\Session::create([
          'payment_method_types' => ['card'],
          'line_items' => [[
            'name' => 'T-shirt',
            'description' => 'Comfortable cotton t-shirt',
            'images' => ['https://example.com/t-shirt.png'],
            'amount' => $amount,
            'currency' => 'usd',
            'quantity' => 1,
          ]],
          'success_url' => 'https://example.com/success?session_id={CHECKOUT_SESSION_ID}',
          'cancel_url' => 'https://example.com/cancel',
        ]);*/

        // `source` is obtained with Stripe.js; see https://stripe.com/docs/payments/accept-a-payment-charges#web-create-token
        $charge = \Stripe\Charge::create([
          'amount' => $amount,
          'currency' => $currency,
          'source' => $token,
          'description' => $description,
        ]);

        return response()->json($charge);
        //return $session;
    }

}
