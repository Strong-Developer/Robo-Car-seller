<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\ImportHistory;
use App\Product;
use App\ProductImage;
use App\Seller;

class ImportProductDeal extends Command
{
   /**
    * The name and signature of the console command.
    *
    * @var string
    */

   protected $signature = 'import:productdeal';
   /**
    * The console command description.
    *
    * @var string
    */
   protected $description = 'import product deal from stored csv file';
   /**
    * Create a new command instance.
    *
    * @return void
    */
   public function __construct()
   {
       parent::__construct();
   }
   /**
    * Execute the console command.
    *
    * @return mixed
    */
   public function handle()
   {
    $path = base_path("resources/pendingimport/*.csv");
    //run 2 loops at a time
    foreach (array_slice(glob($path),0,2) as $file) {
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
            $isValidData = [];
            $today = date('Y-m-d',time());
            if(empty($rowData[2])) {
                $isValidData['errors'] = "UPC Product Code field is empty.";
            }
            if(date('Y-m-d',strtotime($rowData[13])) < $today) {
                $isValidData['errors'] = "Expiry Date is Invalid.";
            }
            if(empty($rowData[13])) {
                $isValidData['errors'] = "Image field is empty.";
            }
            if(empty($rowData[9])) {
                $isValidData['errors'] = "Listing price is empty.";
            }
            if(empty($rowData[10])) {
                $isValidData['errors'] = "Special deal price is empty.";
            }
            if(empty($returnData)) {
                $isValidData = ['success'=>1];
            }
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
                if ($result['success'] === true) {
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
                            'request_id' => $dealResult['request_id']
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
                        'deal_expiry_date' => date('Y-m-d',strtotime($row[13]))
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
    $this->info('product/deal cron ran successfully');
    //die('cron ran successfully');

   }

}
