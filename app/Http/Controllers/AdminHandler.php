<?php

namespace App\Http\Controllers;

use App\Admins;
use App\CMS\Footer;
use App\CMS\Page;
use App\Product;
use App\ProductImage;
use App\Seller;
use DOMDocument;
use Illuminate\Support\Facades\Session;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminHandler extends Controller
{

    public $cms_folder = './resources/views/cms/';

    public function admin_login(){
        return view('admin.admin_login');
    }

    public function admin_login_request(Request $request){
        $admin = Admins::where('email', $request->email)->where('password', md5($request->password))->first();
        if ($admin) {
            if($admin->status == 0){
                return redirect()->back()->with('error', 'Your Account is not Activate.');
            }
            $request->session()->put('admin_id', $admin->id);
            $request->session()->put('admin_email', $admin->email);

            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->with('error', 'Incorrect Credentials.');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/dashboard');
    }
    public function dashboard(Request $request){
        return redirect(route('admin.sellers.manage'));
    }

    public function manageCategories(Request $request){
        return view('admin.add-category')->with([
            'categories' => []
        ]) ;
    }

    public function managePages(Request $request){

        $pages = Page::select('id','name','deletable','page_url','created_at','updated_at')->where('name','<>', null)
            ->orderBy
        ('id','desc')->get
        () ;

        return view('admin.manage-pages')->with('pages' , $pages) ;
    }

    public  function editPost(Request $request){

        if($request->get('action') === 'delete'){
            $page = Page::find($request->get('page_id')) ;

            if($page->deletable !== null){
                $page->delete() ;
                session()->put('success','Page deleted successfully!');
            } else {
                session()->put('error','Functional pages can not be deleted !');

            }
            return redirect()->back() ;
        }

        if($request->get('post_type') === 'page') {

            $post = Page::find($request->get('post_id'));

            $post->content =  file_get_contents($this->cms_folder . 'pages/'.$post->content_url) ;

        }
        elseif($request->get('post_type') === 'header') {

            if($request->get('header_id') === null || $request->get('header_id') === '1') {

                $post = \App\CMS\Header::find(1);

                $post->content =  file_get_contents($this->cms_folder . 'layout/header.blade.php') ;

            } else {
                $post = \App\CMS\Header::find($request->get('header_id'));

                $post->content =  file_get_contents($this->cms_folder . 'layout/app/header.blade.php') ;

            }

        }

        elseif($request->get('post_type') === 'footer') {

           $post = Footer::find(1);

        }

        return view('admin.edit-post')->with('post', $post);


    }

    public function createPage(Request $request){
$post = null ;
 if($request->get('clone_id') !== null) {
     $post = \App\CMS\Page::find($request->get('clone_id')) ;

     $post->content = file_get_contents($this->cms_folder.'pages/'.$post->content_url) ;
 }

        return view('admin.create-page')->with('post' , $post);
    }

    public  function updatePage(Request $request){


        if($request->get('action') === 'create_page') {


            $request['name'] = str_replace(' ','-',$request['name']);

            $check = Page::where('name' , $request['name'])->latest()->first() ;

            if($check !== null){
                $request['name'] = $request->name .'-'.time() ;

            }



            $request['deletable'] = 1 ;

            $content = $request['content'] ;

            $request['content_url'] = $request['name'].'.blade.php' ;

            $myfile = fopen( $this->cms_folder.'pages/'.$request['content_url'], "w+") ;

            $dom = new DomDocument();
            $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

            $images = $dom->getElementsByTagName('img');



            // foreach <img> in the submited message
            foreach($images as $img){
                $src = $img->getAttribute('src');

                // if the img source is 'data-url'
                if(preg_match('/data:image/', $src)){

                    // get the mimetype
                    preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                    $mimetype = $groups['mime'];

                    // Generating a random filename
                    $filename = time();
                    $filepath = "app/images/$filename.$mimetype";

                    // @see http://image.intervention.io/api/

                    $image = Image::make($src)
                        // resize if required
                        /* ->resize(300, 200) */
                        ->encode($mimetype, 100)    // encode file to the specified mimetype
                        ->save(storage_path($filepath));
                    $new_src = asset($filepath);
                    $img->removeAttribute('src');
                    $img->setAttribute('src', asset('storage/'.$filepath));
                } // <!--endif
            } // <!--endforeach

            $content = $dom->saveHTML();

            fwrite($myfile, $content);

            $request['content'] = null ;

            $page = Page::create($request->all()) ;

            session()->put('success','Page created successfully !');

            return redirect(route('admin.cms.edit_page',['post_type' => 'page' , 'post_id' => $page->id ])) ;


        }

        if($request->get('post_type') === 'page') {
            $post = Page::find($request->get('post_id'));


            $fp = fopen($this->cms_folder . 'pages/'.$post->content_url, 'w+');

            @$dom = new DomDocument();
            $inputHTML = $request['content'];
            @$dom->loadHtml($inputHTML, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

            $images = @$dom->getElementsByTagName('img');



            // foreach <img> in the submited message
            foreach($images as $img){
                $src = $img->getAttribute('src');

                // if the img source is 'data-url'
                if(preg_match('/data:image/', $src)){

                    // get the mimetype
                    preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                    $mimetype = $groups['mime'];

                    // Generating a random filename
                    $filename = time();
                    $filepath = "app/images/$filename.$mimetype";

                    // @see http://image.intervention.io/api/

                    $image = Image::make($src)
                        // resize if required
                        /* ->resize(300, 200) */
                        ->encode($mimetype, 100)    // encode file to the specified mimetype
                        ->save(storage_path($filepath));
                    $new_src = storage_path($filepath);
                    $img->removeAttribute('src');
                    $img->setAttribute('src', asset('storage/'.$filepath));
                } // <!--endif
            } // <!--endforeach

            $content = @$dom->saveHTML();

            fwrite($fp, $content);

            $request['content'] = null ;


            $post->update($request->all()) ;


        } elseif($request->get('post_type') === 'header') {
            $post = \App\CMS\Header::find($request->get('post_id'));
            //$post->update($request->all()) ;

            if($request->get('post_id') === '1') {

                $fp = fopen($this->cms_folder . 'layout/header.blade.php', 'w+');
            } else {
                $fp = fopen($this->cms_folder . 'layout/app/header.blade.php', 'w+');
            }



            @$dom = new DomDocument();
            $inputHTML = $request['content'];
            @$dom->loadHtml($inputHTML, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

            $images = @$dom->getElementsByTagName('img');



            // foreach <img> in the submited message
            foreach($images as $img){
                $src = $img->getAttribute('src');

                // if the img source is 'data-url'
                if(preg_match('/data:image/', $src)){

                    // get the mimetype
                    preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                    $mimetype = $groups['mime'];

                    // Generating a random filename
                    $filename = time();
                    $filepath = "app/images/$filename.$mimetype";

                    // @see http://image.intervention.io/api/

                    $image = Image::make($src)
                        // resize if required
                        /* ->resize(300, 200) */
                        ->encode($mimetype, 100)    // encode file to the specified mimetype
                        ->save(storage_path($filepath));
                    $new_src = storage_path($filepath);
                    $img->removeAttribute('src');
                    $img->setAttribute('src', asset('storage/'.$filepath));
                } // <!--endif
            } // <!--endforeach

            $content = @$dom->saveHTML();

            fwrite($fp, $content);




            $post->update($request->all()) ;

           // fclose($fp);

        }elseif($request->get('post_type') === 'footer') {
            $post = Footer::find($request->get('post_id'));
            $post->update($request->all()) ;

            $fp = fopen($this->cms_folder.'layout/footer.blade.php', 'w+');
            fwrite($fp, $request['content']);
           // fclose($fp);


        }



        session()->put('success','Updated successfully !');

        return redirect()->back();
    }

    public function manageSellers(Request $request){

        $sellers = Seller::where('email_address','<>' , null)->orderBy('id','desc')->paginate(50) ;

        return view('admin.manage-sellers')->with([
            'sellers' => $sellers
        ]);

    }

    public function deleteAllSellers(){
        $products = Product::get() ;
        foreach ($products as $product){
            $images = ProductImage::where('product_id' , $product->id)->get() ;
            foreach ($images as $image){
                $image->delete() ;
            }
        }
        foreach ($products as $product){
            $product->delete() ;
        }
        Seller::truncate();
        session()->put('success', 'All sellers and products of the sellers has been deleted successfully !');
        return redirect()->back() ;
    }

    public function deleteSeller(Request $request){

        $products = Product::where('seller_id' , $request->get('seller_id'))->get() ;

        foreach ($products as $product){

            $images = ProductImage::where('product_id' , $product->id)->get() ;

            foreach ($images as $image){

                $image->delete() ;

            }
        }

        foreach ($products as $product){

            $product->delete() ;
        }

        $seller = Seller::find($request->get('seller_id')) ;

        if($seller != null) {

            $seller->delete() ;

            session()->put('success', 'The seller and products of this seller has been deleted successfully !');

        }

        return redirect()->back() ;

    }

    public function manageProducts(Request $request){

        $products = Product::where('upc_product_code','<>' , null)->orderBy('id','desc')->paginate(50) ;

        return view('admin.manage-products')->with([
            'products' => $products
        ]);

    }
    public function deleteProduct(Request $request){

        $products = Product::where('id' , $request->get('id'))->get() ;

        foreach ($products as $product){

            $images = ProductImage::where('product_id' , $product->id)->get() ;

            foreach ($images as $image){

                $image->delete() ;

            }
        }

        foreach ($products as $product){

            $product->delete() ;

            session()->put('success', 'The product has  been deleted successfully !');



        }




        return redirect()->back() ;

    }
    public function deleteAllProducts(){
        Product::truncate();;
        ProductImage::truncate();;
        session()->put('success', 'All products has been deleted successfully !');
        return redirect()->back() ;
    }

    public static function getPageContentByName($name){
        return Page::where('name', $name)->first() ;
    }
    public static function getPageContentByUrl($name){
        return Page::where('page_url', $name)->first() ;
    }

    public function viewCustomPage($page_url){
        $page = Page::where('page_url', $page_url)->first() ;

          if($page === null){
              return 'Page not found !' ;
          }

          $file_path = 'cms.pages.'.str_replace('.blade.php' ,'',$page->content_url) ;
          return view('custom-page')->with('location', $file_path) ;
    }

    public function getHtml($directory,$html_name){

        return file_get_contents('./assets/summernote-bricks-master/dist/bricks_assets/'.$directory.'/'.$html_name) ;
    }


}
