<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesHandler extends Controller
{

    public static function notification(){

        if(session()->get('success') != null) {

            ?>
            <div class="alert alert-success font-weight-bold">
                <?php
                echo session()->pull('success') ;
                ?>
            </div>

            <?php
        }

        if(session()->get('error') != null) {

            ?>
            <div class="alert alert-danger font-weight-bold">
                <?php
                echo session()->pull('error') ;
                ?>
            </div>

            <?php
        }

    }

    public static function importAngular(){

        ?>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.4/angular.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.4/angular-route.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.4/angular-cookies.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.4/angular-animate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.4/angular-aria.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.4/angular-messages.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-material/1.1.5/angular-material.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-sanitize.js"></script>


        <script type="text/javascript">
            var app = angular.module('app',['ngMaterial','ngSanitize']).config(function($mdProgressCircularProvider) {

                // Example of changing the default progress options.
                $mdProgressCircularProvider.configure({
                    progressSize: 50,
                    strokeWidth: 10,
                    duration: 800
                });
            });


        </script>


        <?php


    }

    public function index(Request $request){

        return view('welcome') ;

    }

    public function register(Request $request){

        return view('register') ;

    }

    public function customerProfile(Request $request){
        return view('customer-profile');
    }

    public function login(Request $request){
       // echo "1"; die;
        return view('login') ;

    }

    public function addProduct(Request $request){


         return view('upload-product');

    }

    public function viewProducts(Request $request){

        $categories = Product::select('category')->where('category','<>' , null)->distinct('category')->get() ;

        $makes = Product::select('make')->where('make','<>' , null)->distinct('make')->get() ;

        $models = Product::select('model')->where('model','<>' , null)->distinct('model')->get() ;


        $sizes = Product::select('size')->where('size','<>' , null)->distinct('size')->get() ;

        $colors = Product::select('color')->where('color','<>' , null)->distinct('color')->get() ;

        $conditions = Product::select('condition')->where('condition','<>' , null)->distinct('condition')->get() ;





        return view('products')->with([
                'categories' => $categories ,
                'makes' => $makes ,
                'models' => $models ,
                'sizes' => $sizes ,
               'colors' => $colors ,
              'conditions' => $conditions

        ]);
    }


    public function getProductDetails(Request $request){

        $product = Product::where('upc_product_code' , $request->get('upc_product_code')) ->where('seller_original_quantity','>',0)->with(['seller','images'])
        ->first();

        $related_products = Product::where('category' , $product->category)->with(['seller','images'])->get();
        //print_r($product);die('jhjhj');
        foreach ($product->images as $image) {
            if (strpos($image->file_path, 'http') !== false) {
                $image->main_file_path = $image->file_path ;
            } else {
                $image->main_file_path = 'storage/app/'.$image->file_path ;
            }
        }
       // print_r($product);die('jhjhj');
        //return $related_products;
        return view('product-details')->with([
            'product' => $product,
            'related_products' => $related_products
        ]);

    }
    public function getProductDetailsNew(Request $request){

        $product = Product::where('upc_product_code' , $request->get('upc_product_code'))->with(['seller','images'])
        ->first();

        $related_products = Product::where('category' , $product->category)->with(['seller','images'])->get();
        //print_r($product);die('jhjhj');
        foreach ($product->images as $image) {
            if (strpos($image->file_path, 'http') !== false) {
                $image->main_file_path = $image->file_path ;
            } else {
                $image->main_file_path = 'storage/app/'.$image->file_path ;
            }
        }
       // print_r($product);die('jhjhj');
        //return $related_products;
        return view('product-details-new')->with([
            'product' => $product,
            'related_products' => $related_products
        ]);

    }

    public function getProductDetailsN(Request $request){

        $product = Product::where('upc_product_code' , $request->get('upc_product_code'))->with(['seller','images'])
            ->first() ;

        if($product->images != null) {
            foreach ($product->images as $image) {
                if (strpos($image->file_path, 'http') !== false) {
                    $image->main_file_path = $image->file_path;
                } else {
                    $image->main_file_path = 'storage/app/' . $image->file_path;
                }
            }
        }


        return view('product-details-new')->with([
            'product' => $product
        ]);

    }


    public function setRules(Request $request){

        $products = Product::where('seller_id' , Auth::user()->getAuthIdentifier())->get() ;
        return view('set-rules')->with([
                'products' => $products
        ]) ;

    }


    public function dashboard(Request $request){

        //$products = Product::where('seller_id' , Auth::user()->getAuthIdentifier())->get();
        $products = Product::where('seller_id' , Auth::user()->getAuthIdentifier())->with(['seller','images'])->get();
        /*return view('dash')->with([
                'products' => $products
        ]);*/
        return view('dash_new')->with([
                'products' => $products,
                'sellerData' => Auth::user()
        ]);
    }

    public function dashboard_new(Request $request){

        $products = Product::where('seller_id' , Auth::user()->getAuthIdentifier())->with(['seller','images'])->get();

        return view('dash_new')->with([
                'products' => $products
        ]);
    }

    public function viewProgress(Request $request){

        $products = Product::where('seller_id' , Auth::user()->getAuthIdentifier())
            ->get() ;


        $product_handler = new ProductHandler()
 ;
        return view('progress')->with([
            'products' => $products,
            'data' => $product_handler->getDealProgress($request)
        ]) ;

    }
    public function homeNew(Request $request){
        return view('home') ;
    }

    public function loginNew(Request $request){
        if (Auth::user()) {
           return redirect()->action('PagesHandler@dashboard');
        }
        else{
            return view('login-new');
        }

    }

    public function newRegister(Request $request){
        //return view('register') ;
        return view('signup') ;
    }

    public function carHome(Request $request){
        return view('car') ;
    }

    public function cars(Request $request){
        $categories = Product::select('category')->where('category','<>' , null)->where('visible', 1)->distinct('category')->get() ;

        $makes = Product::select('make')->where('make','<>' , null)->where('visible', 1)->distinct('make')->get() ;

        $models = Product::select('model')->where('model','<>' , null)->where('visible', 1)->distinct('model')->get() ;


        $sizes = Product::select('size')->where('size','<>' , null)->where('visible', 1)->distinct('size')->get() ;

        $colors = Product::select('color')->where('color','<>' , null)->where('visible', 1)->distinct('color')->get() ;

        $conditions = Product::select('condition')->where('condition','<>' , null)->where('visible', 1)->distinct('condition')->get() ;


        return view('gallery')->with([
            'categories' => $categories ,
            'makes' => $makes ,
            'models' => $models ,
            'sizes' => $sizes ,
            'colors' => $colors ,
            'conditions' => $conditions

        ]);
    }


    public function negotiate(Request $request){

        return view('negotiate') ;

    }

    public function manageDeals(Request $request) {
        $sellerId = Auth::user()->id;
        $products = Product::where('upc_product_code','<>' , null)
            ->where('seller_id','=',$sellerId)
            ->orderBy('id','desc')->get();
        return view('manage-deal', ['products'=>$products]) ;
    }




}
