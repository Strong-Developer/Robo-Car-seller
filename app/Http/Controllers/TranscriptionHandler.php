<?php
namespace App\Http\Controllers;

use App\Product;
use App\Transcription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use vendor\project\StatusTest;

class TranscriptionHandler extends Controller
{
    public function addTranscription(Request $request)
    {
        $transcription = new Transcription();
        $transcription->seller_email = $request->seller_email;
        $transcription->upc_product_code = $request->upc_product_code;
        $transcription->chat_details = $request->transcription;
        $transcription->save();
        return response('status', 200);
    }

    public function getTranscription(Request $request)
    {
        if (!isset($request->upc_product_code)){
            $upc_product_code = null;
        }else{
            $upc_product_code = $request->upc_product_code;
        }
        $all_seller_products = Product::where('seller_id', Auth::user()->getAuthIdentifier())->get();
        if ($upc_product_code == null){
            $seller_all_transcriptions = [];
            $product_title = '';
            return view('transcription.view_transcription',['seller_all_transcriptions'=> $seller_all_transcriptions, 'all_seller_products' => $all_seller_products, 'product_title' => $product_title]);
        }else {
            $seller_all_transcriptions = Transcription::where('seller_email', Auth::user()->email_address)->get();
            $product_title = Product::where('upc_product_code', $upc_product_code)->first()->product_title;
            return view('transcription.view_transcription',['seller_all_transcriptions'=> $seller_all_transcriptions, 'all_seller_products' => $all_seller_products, 'product_title' => $product_title]);
        }
    }
}
