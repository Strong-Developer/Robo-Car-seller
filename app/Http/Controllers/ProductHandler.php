<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductImage;
use App\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PHPMailer\PHPMailer\Exception;
use App\ImportHistory;
use Mail;

class ProductHandler extends Controller
{
     protected $products ;


     /*
     * @monish 10/03/20
     */
    public function addProduct(Request $request){
        if($request->product_img == null){
            session()->put('error','At least 1 photo is required');
            return redirect()->back()->withInput($request->all());
        }
        $request['expiry_date'] = Carbon::parse($request->get('expiry_date'))->format('Y-m-d');
        $string = $request->get('price');
        preg_match_all('!\d+\.*\d*!', $string, $matches);
        $final_price = "";
        foreach($matches[0] as $key => $one){
            $final_price = $final_price.$one;
        }
        $request['price'] = $final_price;

        $string = $request->get('special_deal_price');
        preg_match_all('!\d+\.*\d*!', $string, $matches);
        $final_price = "";
        foreach($matches[0] as $key => $one){
            $final_price = $final_price.$one;
        }
        $request['special_deal_price'] = $final_price;

        $string = $request->get('lowest_price');
        preg_match_all('!\d+\.*\d*!', $string, $matches);
        $final_price = "";
        foreach($matches[0] as $key => $one){
            $final_price = $final_price.$one;
        }
        $request['lowest_price'] = $final_price;

        if($request->get('price') <  $request->get('special_deal_price') || $request->get('price') < $request->get('lowest_price') || $request->get('special_deal_price') < $request->get('lowest_price')){
            session()->put('error','List Price must be greater then Deal Price & Deal price must be greater then Lowest price.');
            return redirect()->back()->withInput($request->all());
        }
        // Validation
        $product_title = $request->get('product_title');
        if (!preg_match("/^[a-zA-Z0-9- ]*$/",$product_title)) {
            session()->put('error','Only letters, white spaces and numbers are allowed in Product Title');
            return redirect()->back()->withInput($request->all());
        }

        $url = $request->get('url');
        if($url != ""){
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) {
                session()->put('error','Invalid Url');
                return redirect()->back()->withInput($request->all());
            }
        }
        $string = $request->get('make');
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+]/', $string)) {
            session()->put('error',"One or more of the special characters found in Product Attribute Make");
            return redirect()->back()->withInput($request->all());
        }
        $string = $request->get('model');
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+]/', $string)) {
            session()->put('error',"One or more of the special characters found in Product Attribute Model");
            return redirect()->back()->withInput($request->all());
        }
        $string = $request->get('condition');
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+]/', $string)) {
            session()->put('error',"One or more of the special characters found in Product Attribute Condition");
            return redirect()->back()->withInput($request->all());
        }
        $string = $request->get('color');
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+]/', $string)) {
            session()->put('error',"One or more of the special characters found in Product Attribute Color");
            return redirect()->back()->withInput($request->all());
        }
        $string = $request->get('size');
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+]/', $string)) {
            session()->put('error',"One or more of the special characters found in Product Attribute Size");
            return redirect()->back()->withInput($request->all());
        }

        if ($request['expiry_date'] <= Carbon::now()){
            session()->put('error',"Expiration date must be greater than today's date");
            return redirect()->back()->withInput($request->all());
        }
        $data = [
            'upc_product_code' =>$request['upc_product_code'],// From Form
            'title' => $request['product_title'],// From Form
            'seller_email' =>  Auth::user()->email_address,// From Form
            "seller_phone"=> Auth::user()->cell_no,
            "seller_first_name" => Auth::user()->first_name,
            "seller_orignal_quantity"=> $request->get('seller_original_quantity'),
            'category' => $request->get('category'),// Drop Down - Automobiles, Real Estate, Electronics, Industrial,
            'api_password' => $this->api,// GIVEN ABOVE - SAME
            'parameter1' =>  $request->get('make'),// From Form
            'parameter2' =>  $request->get('model'),// From Form
            'parameter3' =>  $request->get('condition'),// From Form
            'parameter4' =>  $request->get('color'),// From Form
            'parameter5' =>  $request->get('size'),// From Form
            "seller_currency"=> Auth::user()->currency,
            "seller_deal_price"=> $request->get('special_deal_price'),
            "seller_negotiation_mode"=> $request->get('negotiation'),
            "seller_lowest_deal_price"=> $request->get('lowest_price')
        ];

        $HOST = $this->host;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            //    CURLOPT_PORT => "8000",
            CURLOPT_URL => $HOST . "/api/addSellerDeal",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
            )
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $result = json_decode($response , true);
        if(isset($result['success']) && $result['success'] === true) {

            // $register_seller_deal =  $this->addSellerDeal($request);

            // $register_seller_deal_result = json_decode($register_seller_deal , true);
            $save_product = Product::create([
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
               'special_deal_price' => $request->get('special_deal_price'),
               'lowest_price'=> $request->get('lowest_price'),
               'deal_expiry_date' => $request->get('expiry_date'),
               'product_description' => $request->get('product_description')."",
               'negotiation_mode' => $request->get('negotiation')
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
        if(!empty($result)) {
            if(array_key_exists('errors', $result)){
                $string = "";
                 if(isset($result['message'])) {
                    foreach ($result['message'] as $key => $value){
                        if($string == ""){
                            $string = $key;
                        }else{
                            $string = $string .','. $key;
                        }
                    }
                }
                session()->put('error','The '.$string.' field is required.');
                return redirect()->back()->withInput($request->all());
            }
        }
        session()->put('error','Something went wrong to add the deal !');
        return redirect()->back()->withInput($request->all());
    }

    public function importDealsFromCSV(Request $request) {
        $path = $request->file('csv_to_import')->getRealPath();
        $data = array_map('str_getcsv', file($path));
        $csv_data = $data;
        $resData = $this->validateCSVFile($csv_data);
        if(isset($resData['success'])) {
            $path = $request->file('csv_to_import')->getRealPath();
            $file = file($path);
            $fileM = $request->file('csv_to_import');

            // File Details
            $filenameActual = $fileM->getClientOriginalName();
            $filenameActual = basename($filenameActual);
            $data = array_slice($file, 1);
            //loop through file and split every 1000 lines
            $parts = (array_chunk($data, 50));
            $i = 1;
            $files = [];
            foreach($parts as $line) {
                $name = date('y-m-d-H-i-s').$i.'.csv';
                $filename = base_path('resources/pendingimport/'.$name);
                file_put_contents($filename, $line);
                $files[] = $name;
                $i++;
            }
            $imp = new ImportHistory();
            $imp->files_name 	= json_encode($files);
            $imp->actual_name = $filenameActual;
            $imp->seller_id 	= Auth::user()->getAuthIdentifier();
            if ( $imp->save() ) {
                return redirect('/upload-a-deal')->with('success',"Product's/Deal's are queued for importing.");
            } else {
                return redirect('/upload-a-deal')->with('error',"Some error occured. Please try again later.");
            }
        } else {
            return redirect('/upload-a-deal')->with('error',$resData['errors']);
        }
    }

    public function validateCSVFile($dataCSV) {
        $responseData = [];
        $parameters_array =  ["Category","Product_title","UPC_product_code","Attribute_1","Attribute_2","Attribute_3","Attribute_4","Attribute_5","URL","Listing_price","Special_deal_price","Lowest_price","Quantity","Expiry_date","Images","Negotiation_mode","Visible"];
        $errMssg = '';
        foreach ($dataCSV as $key => $rowData) {
            if($key === 0){
                if($rowData !== $parameters_array) {
                    $errMssg .= 'The Header of the CSV file is not matching with example csv file.<br/>';
                    return redirect()->back() ;
                }
            }else{
                $today = date('Y-m-d',time());
                if(empty($rowData[2])) {
                    $errMssg .= "Row ".$key." UPC Product Code field is empty.<br/>";
                }
                if(date('Y-m-d',strtotime($rowData[13])) > $today) {
                    $errMssg .= "Row ".$key." Expiry Date is Invalid.<br/>";
                }
                if(empty($rowData[13])) {
                    $errMssg .= "Row ".$key." Image field is empty.<br/>";
                }
                if(empty($rowData[9])) {
                    $errMssg .= "Row ".$key." Listing price is empty.<br/>";
                }
                if($rowData[9] == 0) {
                    $errMssg .= "Row ".$key." Listing price should be greater than zero.<br/>";
                }
                if(empty($rowData[10])) {
                    $errMssg .= "Row ".$key." Special deal price is empty.<br/>";
                }
            }
            if($errMssg != '') {
                break;
            }
        }
        if($errMssg == '') {
            $responseData['success'] = true;
        }else{
            $responseData['errors'] = $errMssg;
        }
        return $responseData;
    }

    public function importQueuedData(Request $request) {
        $path = base_path("resources/pendingimport/*.csv");
        //run 2 loops at a time
        foreach (array_slice(glob($path),0,1) as $file) {
            if(!empty($file)) {
            $fileName = basename($file);
            $importHistory = ImportHistory::where('files_name', 'like', '%' . $fileName . '%')->first();
            if(!empty($importHistory)){
            $sellerData = Seller::where('id', '=', $importHistory->seller_id )->first();

            if(!empty($sellerData)) {
            //read the data into an array
            $data = array_map('str_getcsv', file($file));
            //loop over the data
            $resData = [];
            foreach($data as $row) {
                $productData = Product::where('upc_product_code','=' , $row[2])->with(['images'])->first();
                $isValidData = $this->checkValidation($row);
               // print_r($isValidData);die('check field');
                if(isset($isValidData['success'])){
                if(empty($productData)) {
                    $data = [
                        'upc_product_code' => $row[2],
                        'title' => $row[1],
                        'seller_email' => $sellerData->email_address,
                        'category' => $row[0],// Drop Down - Automobiles, Real Estate, Electronics,Industrial, Others
                        'api_password' => $this->api,
                        'parameter1' => $row[3],// From Form
                        'parameter2' => $row[4],// From Form
                        'parameter3' => $row[5],// From Form
                        'parameter4' => $row[6],// From Form
                        'parameter5' => $row[7],// From Form
                    ];
                    $HOST = $this->host;
                    $curl = curl_init();
                    curl_setopt_array($curl, array(
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
                    if (isset($result['success']) && $result['success'] === true) {
                        $dataDeal = [
                            'api_password' => $this->api,
                            'seller_email' => $sellerData->email_address,
                            'seller_phone' => $sellerData->cell_no,
                            'seller_first_name' => $sellerData->first_name,
                            'seller_currency' => $sellerData->currency,
                            'seller_zip' => $sellerData->zip_code,
                            'parameter1' => $row[3],
                            'parameter2' => $row[4],
                            'parameter3' => $row[5],
                            'parameter4' => $row[6],
                            'parameter5' => $row[7],
                            'seller_negotiation_mode' => $row[15],
                            'upc_product_code' => $row[2],
                            'title' => $row[1],
                            'seller_orignal_quantity' => $row[12],
                            'category' => $row[0],
                            'seller_deal_price' => str_replace(',', '', $row[10]),
                            'seller_lowest_deal_price' => str_replace(',', '', $row[11]),
                            'expiry_date' => Carbon::parse($row[13])->format('Y-m-d')
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
                            CURLOPT_POSTFIELDS => $dataDeal,
                            CURLOPT_HTTPHEADER => array(),
                        ));

                        $response = curl_exec($curl);
                        $err = curl_error($curl);

                        curl_close($curl);
                        $dealResult = json_decode($response , true);
                        if ($dealResult['success'] === true) {
                            $save_product = Product::create([
                                'seller_id' => $sellerData->id,
                                'product_title' => $row[1],
                                'upc_product_code' =>$row[2],
                                'make' => $row[3],
                                'model' => $row[4],
                                'condition' => $row[5],
                                'color' => $row[6] ,
                                'size' => $row[7],
                                'url' => $row[8],
                                'price' => str_replace(',','',$row[9]),
                                'seller_original_quantity' => $row[12],
                                'category' => $row[0],
                                'special_deal_price' => str_replace(',','',$row[10]),
                                'lowest_price'=> str_replace(',','',$row[11]),
                                'deal_expiry_date' => date('Y-m-d',strtotime($row[13])),
                                'negotiation_mode' => $row[15],
                                'request_id' => $dealResult['request_id'],
                                'visible' => $row[16]
                            ]);

                            if ($row[13] !== null) {
                                $images = explode(',', $row[13]);
                                foreach ($images as $item) {
                                    try {
                                        $img_url = $item;
                                        ProductImage::create([
                                            'product_id' => $save_product->id, 'product_upc_code' =>$save_product->upc_product_code, 'file_path' => $img_url
                                        ]);
                                    }
                                    catch (Exception $exception){
                                        $resData[$row[2]] = " error importing image";
                                    }
                                }
                            }
                            $resData[$row[2]] = " imported successfully";
                        }
                        else{
                            $resData[$row[2]] = " error while importing";
                        }
                    }else{
                        $resData[$row[2]] = " error while importing";
                    }
                } else{
                    if(!empty($productData->request_id) && $productData->request_id != 0){
                    $dataDeal = [
                        'request_id' => $productData->request_id,
                        'api_password' =>$this->api,// GIVEN ABOVE - SAME
                        'seller_email' =>  $sellerData->email_address,// From Form
                        'seller_phone' => $sellerData->cell_no,
                        'seller_first_name' => $sellerData->first_name,
                        'seller_orignal_quantity' => $row[12],
                        'parameter1' => $row[3],
                        'parameter2' => $row[4],
                        'parameter3' => $row[5],
                        'parameter4' => $row[6],
                        'parameter5' => $row[7],
                        'seller_deal_price' => str_replace(',', '', $row[10]),
                        'seller_negotiation_mode' => $row[15],
                        'seller_lowest_deal_price' => str_replace(',', '', $row[11]),
                        'upc_product_code' => $row[2],
                        'title' => $row[1],
                        'category' => $row[0]
                    ];
                    $HOST = $this->host;
                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                        CURLOPT_URL => $HOST . "/api/updateSellerDeal",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "POST",
                        CURLOPT_POSTFIELDS => $dataDeal,
                        CURLOPT_HTTPHEADER => array(),
                    ));

                    $response = curl_exec($curl);
                    $err = curl_error($curl);
                    curl_close($curl);
                    $result = json_decode($response , true);
                    if(isset($result['success']) && $result['success'] === true) {
                        $save_product = [
                            'seller_id' => $sellerData->id,
                            'request_id' => $result['request_id'],
                            'product_title' => $row[1],
                            'upc_product_code'=> $row[2],
                            'make' => $row[3],
                            'model' => $row[4],
                            'condition' => $row[5],
                            'color' => $row[6] ,
                            'size' => $row[7],
                            'url' => $row[8],
                            'price' => str_replace(',','',$row[9]),
                            'seller_original_quantity' => $row[12],
                            'category' => $row[0],
                            'special_deal_price' => str_replace(',','',$row[10]),
                            'lowest_price'=> str_replace(',','',$row[11]),
                            'deal_expiry_date' => date('Y-m-d',strtotime($row[13])),
                            'visible' => $row[16]
                         ];

                         $update = Product::where('id', $productData->id)->update($save_product);

                         if($row[13] !== null) {
                            $delete = ProductImage::where('product_id', $productData->id)->delete();
                            $images = explode(',', $row[13]);
                            foreach ($images as $item) {
                                try {
                                    $img_url = $item;
                                    ProductImage::create([
                                        'product_id' => $productData->id, 'product_upc_code' =>$row[2], 'file_path' => $img_url
                                    ]);
                                }
                                catch (Exception $exception){

                                }
                            }
                        }
                        $resData[$row[2]] = " updated successfully";
                    }
                    } else {
                        $resData[$row[2]] = " error occured";
                    }

                }
                }else{
                    $resData[$row[2]] = $isValidData['errors'];//" updated successfully";
                }
            }
            }
            }
            //die('tetete');
            $existingData = (($importHistory->history_data == '' || $importHistory->history_data == null)?[]:json_decode($importHistory->history_data, true));
            $historyData = array_merge($existingData,$resData);
            $updatehis = ImportHistory::find($importHistory->id);
            $updatehis->history_data = json_encode($historyData);
            $updatehis->save();
            unlink($file);
            }
        }
        die('cron ran successfully');
    }

    public function checkValidation($rowData) {
        $returnData = [];
        $today = date('Y-m-d',time());
        if(empty($rowData[2])) {
            $returnData['errors'] = "UPC Product Code field is empty.";
        }
        if(date('Y-m-d',strtotime($rowData[13])) < $today) {
            $returnData['errors'] = "Expiry Date is Invalid.";
        }
        if(empty($rowData[13])) {
            $returnData['errors'] = "Image field is empty.";
        }
        if(empty($rowData[9])) {
            $returnData['errors'] = "Listing price is empty.";
        }
        if(empty($rowData[10])) {
            $returnData['errors'] = "Special deal price is empty.";
        }
        if(empty($returnData)) {
            return ['success'=>1];
        } else {
            return $returnData;
        }
    }

    public function importDealsFromCSVOld(Request $request){
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
                $parameters_array =  ["Category","Product_title","UPC_product_code","Attribute_1","Attribute_2","Attribute_3","Attribute_4","Attribute_5","URL","Listing_price","Special_deal_price","Lowest_price","Quantity","Expiry_date","Images","Negotiation_mode"] ;
                $row_key = [] ;

                foreach ($csv_data as $key => $row) {

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
                        $totalItems++;
                        $expDate = Carbon::parse($row[$row_key['Expiry_date']])->format('Y-m-d');
                        $today = date('Y-m-d',time());
                        if(!empty($row[$row_key['UPC_product_code']]) && ($expDate > $today)) {
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
                                    //print_r($result);
                                    if ($result['success'] === true) {

                                        $data = [
                                            'api_password' => $this->api,
                                            'seller_email' => Auth::user()->email_address,
                                            'seller_phone' => Auth::user()->cell_no,
                                            'seller_first_name' => Auth::user()->first_name,
                                            'seller_currency' => Auth::user()->currency,
                                            'seller_zip' => Auth::user()->zip_code,
                                            'parameter1' => $row[$row_key['Attribute_1']],
                                            'parameter2' => $row[$row_key['Attribute_2']],
                                            'parameter3' => $row[$row_key['Attribute_3']],
                                            'parameter4' => $row[$row_key['Attribute_4']],
                                            'parameter5' => $row[$row_key['Attribute_5']],
                                            'seller_negotiation_mode' => $row[$row_key['Negotiation_mode']],
                                            'upc_product_code' => $row[$row_key['UPC_product_code']],
                                            'title' => $row[$row_key['Product_title']],
                                            'seller_orignal_quantity' => $row[$row_key['Quantity']],
                                            'category' => $row[$row_key['Category']],
                                            'seller_deal_price' => str_replace(',', '', $row[$row_key['Special_deal_price']]),
                                            'seller_lowest_deal_price' => str_replace(',', '', $row[$row_key['Lowest_price']]),
                                            'expiry_date' => Carbon::parse($row[$row_key['Expiry_date']])->format('Y-m-d')
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
                                        $dealResult = json_decode($response , true);
                                        //print_r($dealResult);die;
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
                                                'deal_expiry_date' =>Carbon::parse($row[$row_key['Expiry_date']]),
                                                'negotiation_mode' => $row[$row_key['Negotiation_mode']]
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
                                           // $totalItems = $totalItems-1;
                                            session()->put('success', $product_imported . 'Out of '.$totalItems.' from your product list has been uploaded in your <a target="_blank" href="'.route('home.catalog').'">Product Catalog</a> and a special deal for RoboNegotiator has been sent. Website visitors will be able to negotiate soon.');
                                        }
                                        else{
                                            session()->put('error','Something went wrong to add the deal !');
                                        }
                                    } else {
                                        //if (array_key_exists('errors', $result)) {
                                            $errors++ ;
                                        //}
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
                            $errors++;
                            //session()->put('error' , 'Some Item(s) have Some Errors. Please Check Required Fields and Re Upload the File');
                            //return redirect()->back() ;
                        }
                        }
                    }
                }
                return redirect('/upload-a-deal')->with('errors_seller',$errors);


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
               'seller_currency' => Auth::user()->currency,
               'seller_zip' => Auth::user()->zip_code,
               'parameter1' => $request->get('make'),
               'parameter2' => $request->get('model'),
               'parameter3' => $request->get('condition'),
               'parameter4' => $request->get('color'),
               'parameter5' => $request->get('size'),
               'seller_negotiation_mode' => $request->get('negotiation'),
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

         $deal = Product::where('request_id',$request->get('request_id'))->with(['images'])->first();
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
        return view('manage-products')->with([
            'products' => $products
        ]);
    }

    public function delete_product(Request $request)
    {
        $product = Product::where('seller_id','=' , Auth::user()->getAuthIdentifier())->where('request_id', $request->request_id)->first();
        if($product){
            $HOST = $this->host;
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $HOST."/api/deleteSellerDeal",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => array('request_id' => $request->request_id, 'api_password' => $this->api),
                CURLOPT_HTTPHEADER => array(
                    "accept: application/json",
                    "X-CSRF-TOKEN: "
                ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            $result = json_decode($response, true);
            if($result['success'] == 1){
                $product->delete();
                return redirect()->back()->with('success',"Product has been deleted successfully.");
            } else {
                return redirect()->back()->with('error',"Error occured. Please try again later.");
            }
        }else{
            return redirect()->back()->with('error',"Error occured. Please try again later.");
        }
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

    public function getBuyerDiscount(Request $request) {
        $data = [
            'api_password' => $this->api,
            'upc_product_code' => $request->upc_product_code,
            'seller_email' => $request->seller_email
        ];

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
        $result = json_decode( $response , true) ;
        if($request->get('json_result') == 1){
            return response()->json($result) ;
        }

        if(! array_key_exists('errors' , $result)) {
            session()->put('success' , 'Your offer for purchase has been sent to RoboNegotiator. You should hear directly from RoboNegotiator if there is a matching deal from any seller.');

            return redirect()->back() ;

        }

        return redirect()->back()->withErrors($result['errors'])->withInput($request->all());

    }

    public function setBuyerDiscount(Request $request) {

        $data = [
            'api_password' => $this->api,
            'buyer_email' => $request->buyer_email
        ];
        $count = 0;
        foreach($request->get('product_discounts') as $dis) {
            foreach($dis as $key2=>$value) {
                $data['product_discounts['.$count.']['.$key2.']'] = $value;
            }
            $count++;
        }
        $HOST = $this->host;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $HOST . "/api/product/discount/buyer/store",
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
        if($request->get('json_result') == 1){
            return response()->json($result) ;
        }

        if(! array_key_exists('errors' , $result)) {
            session()->put('success' , 'Your offer for purchase has been sent to RoboNegotiator. You should hear directly from RoboNegotiator if there is a matching deal from any seller.');

            return redirect()->back() ;

        }

        return redirect()->back()->withErrors($result['errors'])->withInput($request->all());

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
            'buyer_currency' => $request->buyer_currency,
            'buyer_zip' => $request->buyer_zip,// From Form
            'expiry_date' => $request->get('expiry_date'),

            'catalog_url' => $request->get('catalog_url')
        ];



        $HOST = $this->host;
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

        return redirect()->back()->withErrors($result['errors'])->withInput($request->all())
            ;

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
            'catalog_url' => $request->get('catalog_url')


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
        $terms = $request->get('terms');
        if(!empty($terms['upc_product_code'])) {
            $data = [
                'api_password' => $this->api,
                'upc_product_code' => $terms['upc_product_code'],
                'seller_email' => $request->get('seller_email')
            ];
            $curl = curl_init();
            $HOST = $this->aihost;
            curl_setopt_array($curl, array(
            CURLOPT_URL => $HOST."/business/analytic/products/offers",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => array('api_password' => 'f07862522e9585ffd7ca6a6138ec262480b0d91f','upc_product_code' => 'one_percent_equity','seller_email' => 'seller@robonegotiator.com'),
            ));

            $response = curl_exec($curl);
            curl_close($curl);
            $result = json_decode($response, true);
            return $result['data'][0];

        }

        return null ;

    }


    public function getMarketPriceOfProduct(Request $request){
        if($request->get('upc_product_code') !== null) {
            $market_prices = [];
            $data = [
                "upc_product_code" => $request->get('upc_product_code'),
                "zip_code" => "98520"
            ];

            $HOST = $this->aihost;
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => $HOST."/api/market/statistics",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $data,
            ));

            $response = curl_exec($curl);
            curl_close($curl);
            return $response;

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
        if($request->product_img == null){
            $images = ProductImage::where('product_id', $pid)->where('product_upc_code', $request->get('upc_product_code'))->first();
            if (!isset($images)){
                session()->put('error','At least 1 photo is required');
                return redirect()->back()->withInput($request->all());
            }
        }
        $product = Product::where('id', $pid)->first();
        if($product->upc_product_code != $request['upc_product_code']) {
            session()->put('error',"You cannot change UPC Product Code");
            return redirect()->back()->withInput($request->all());
        }
        $request['expiry_date'] = Carbon::parse($request->get('expiry_date'))->format('Y-m-d');
        $string = $request->get('price');
        preg_match_all('!\d+\.*\d*!', $string, $matches);
        $final_price = "";
        foreach($matches[0] as $key => $one){
            $final_price = $final_price.$one;
        }
        $request['price'] = floor($final_price);

        $string = $request->get('special_deal_price');
        preg_match_all('!\d+\.*\d*!', $string, $matches);
        $final_price = "";
        foreach($matches[0] as $key => $one){
            $final_price = $final_price.$one;
        }
        $request['special_deal_price'] = floor($final_price);

        $string = $request->get('lowest_price');
        preg_match_all('!\d+\.*\d*!', $string, $matches);
        $final_price = "";
        foreach($matches[0] as $key => $one){
            $final_price = $final_price.$one;
        }
        $request['lowest_price'] = floor($final_price);

        if($request->get('price') <  $request->get('special_deal_price') || $request->get('price') < $request->get('lowest_price') || $request->get('special_deal_price') < $request->get('lowest_price')){
            session()->put('error','List Price must be greater then Deal Price & Deal price must be greater then Lowest price.');
            return redirect()->back()->withInput($request->all());
        }
        // Validation
        $product_title = $request->get('product_title');
        $product_title_array = explode(" ", $product_title);
        foreach($product_title_array as $product_title){
            if (!preg_match("/^[a-zA-Z0-9- ]*$/",$product_title)) {
                session()->put('error','Only letters, white spaces and numbers are allowed in Product Title');
                return redirect()->back()->withInput($request->all());
            }
        }

        $url = $request->get('url');
        if($url != ""){
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) {
                session()->put('error','Invalid Url');
                return redirect()->back()->withInput($request->all());
            }
        }
        $string = $request->get('make');
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $string)) {
            session()->put('error',"One or more of the special characters found in Product Attribute Make");
            return redirect()->back()->withInput($request->all());
        }
        $string = $request->get('model');
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $string)) {
            session()->put('error',"One or more of the special characters found in Product Attribute Model");
            return redirect()->back()->withInput($request->all());
        }
        $string = $request->get('condition');
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $string)) {
            session()->put('error',"One or more of the special characters found in Product Attribute Condition");
            return redirect()->back()->withInput($request->all());
        }
        $string = $request->get('color');
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $string)) {
            session()->put('error',"One or more of the special characters found in Product Attribute Color");
            return redirect()->back()->withInput($request->all());
        }
        $string = $request->get('size');
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $string)) {
            session()->put('error',"One or more of the special characters found in Product Attribute Size");
            return redirect()->back()->withInput($request->all());
        }

        if ($request['expiry_date'] <= Carbon::now()){
            session()->put('error',"Expiration date must be greater than today's date");
            return redirect()->back()->withInput($request->all());
        }

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
            'seller_negotiation_mode' =>  $request->get('negotiation'),// From Form
            'seller_lowest_deal_price' =>  $request->get('lowest_price'),// From Form
            'upc_product_code' => $request['upc_product_code'],// From Form
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
               'product_description' => $request->get('product_description')."",
            ];

            $update = Product::where('id', $pid)->update($save_product);

            if($request->product_img !== null) {
//                $delete = ProductImage::where('product_id', $pid)->delete();
               foreach ($request->product_img as $item) {
                   $file = $item;
                   $path = Storage::disk('local')->put(time() . $file->getClientOriginalName(), $file);
                   ProductImage::create([
                       'product_id' => $pid, 'product_upc_code' => $request->get('upc_product_code'), 'file_path' => $path
                   ]);
               }
           }
//           session()->put('success','Deal Updated Successfully!');
//            return redirect()->route('editProduct', ['request_id' => $request->get('request_id')]);
            return redirect()->route('products.manage')->with('success', 'Deal Updated Successfully!');
        }else{
            if(array_key_exists('errors', $result)){
                $string = "";
                foreach ($result['message'] as $key => $value){
                    if($string == ""){
                        $string = $key;
                    }else{
                        $string = $string .','. $key;
                    }
                }
                session()->put('error','The '.$string.' field is required.');
                return redirect()->back()->withInput($request->all());
            }
//            session()->put('error','Something went wrong to Update the deal!');
//            return redirect()->route('editProduct', ['request_id' => $request->get('request_id')]);
            return redirect()->back()->with('error', 'Something went wrong, Please try again later.')->withInput($request->all());;
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
            'buyer_repeat_customer' => (!empty($request->get('buyer_repeat_customer'))?1:0), // Means adjustment towards pro-buyer if
            'buyer_more_quantity_percent' =>1,
            'buyer_repeat_customer_percent' =>  1 ,
            'buyer_repeat_customer_unit' => (!empty($request->get('buyer_repeat_customer'))?$request->get('buyer_repeat_customer'):0),
            'buyer_aggressive_selling' => (!empty($request->get('buyer_aggressive_selling'))?1:0), //Means adjustment towards
            // pro-buyer
            'buyer_aggressive_selling_percent' =>  1 ,
            'buyer_aggressive_selling_unit' =>(!empty($request->get('buyer_aggressive_selling'))?$request->get('buyer_aggressive_selling'):0),

            'buyer_more_quantity' => (!empty($request->get('buyer_more_quantity'))?1:0), //If buyer is buying more quantity (more than
            // 1),
            'buyer_more_quantity_unit' =>(!empty($request->get('buyer_more_quantity'))?$request->get('buyer_more_quantity'):0),
            'buyer_low_demand' => (!empty($request->get('buyer_low_demand'))?1:0),
            'buyer_low_demand_percent' => 1 ,
            'buyer_low_demand_unit' =>(!empty($request->get('buyer_low_demand'))?$request->get('buyer_low_demand'):0),
            'seller_hot_item' => (!empty($request->get('seller_hot_item'))?1:0),
            'seller_hot_item_percent' => 1 ,
            'seller_hot_item_unit' =>(!empty($request->get('seller_hot_item'))?$request->get('seller_hot_item'):0),
            'seller_motivated_buyer' => (!empty($request->get('seller_motivated_buyer'))?1:0),
            'seller_motivated_buyer_percent' => 1 ,
            'seller_motivated_buyer_unit' =>(!empty($request->get('seller_motivated_buyer'))?$request->get('seller_motivated_buyer'):0),
            'seller_shipping_cost' => (!empty($request->get('seller_shipping_cost'))?1:0),
            'seller_shipping_cost_percent' => 1 ,
            'seller_shipping_cost_unit' =>(!empty($request->get('seller_shipping_cost'))?$request->get('seller_shipping_cost'):0),
            'buyer_demographic' => (!empty($request->get('buyer_demographic'))?1:0),
            'buyer_demographic_percent' => 1 ,
            'buyer_demographic_unit' =>(!empty($request->get('buyer_demographic'))?$request->get('buyer_demographic'):0),
            'seller_historical_data' => (!empty($request->get('seller_historical_data'))?1:0),
            'seller_historical_data_percent' =>1 ,
            'seller_historical_data_unit' =>(!empty($request->get('seller_historical_data'))?$request->get('seller_historical_data'):0)
        ];

        //print_r($data);die('herrere');
        $HOST = $this->host;
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
            $HOST = $this->host;
            $curl = curl_init();
            curl_setopt_array($curl, array(
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
                'currency' => $request->get('currency')

            ];
            $HOST = $this->host;
            $curl = curl_init();
            curl_setopt_array($curl, array(
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

    public function importList(Request $request) {
        $sellerImportHistoryData = ImportHistory::where('seller_id', '=', Auth::user()->getAuthIdentifier())->get();
        return view('import-history')->with('sellerImportHistoryData' , $sellerImportHistoryData);
    }

    public function viewStatusOfImport(Request $request) {
        $id = $request->get('id');
        $historyData = ImportHistory::where('id', '=', $id)->first();
        return view('view-history')->with('historyData' , $historyData);
    }

    public function deleteHistory(Request $request) {
        $id = $request->get('id');
        $historyData = ImportHistory::find($id);
        if($historyData->delete()) {
            return redirect('/import-history')->with('success',"History has been deleted successfully.");
        } else {
            return redirect('/import-history')->with('error',"Some error occured. Please try again later.");
        }
    }

    public function sendMailSeller(Request $request) {
        $mailData = [
            'upc_product_code' => $request->get('upc_product_code'),
            'seller_email' => $request->get('seller_email'),
            'buyer_name' => $request->get('buyer_name'),
            'buyer_email' => $request->get('buyer_email'),
            'mssg' => $request->get('mssg')
        ];
        try{
            Mail::send('sellermail', ['mailData' => $mailData], function ($m) use ($mailData) {
                $m->from('software@robonegotiator.com', 'Robonegotiator');
                $m->to($mailData['seller_email'])->subject('Question/Comment & Feedback : '.$mailData['upc_product_code']);
                //$m->to('testemail665564@mailinator.com')->subject('Question/Comment & Feedback : '.$mailData['upc_product_code']);
            });
            $returnData = ['success' => true];
        } catch(Exception $e) {
            $returnData = ['error' => true];
        }
        return json_encode($returnData);
    }

}
