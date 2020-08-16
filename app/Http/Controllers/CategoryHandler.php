<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryHandler extends Controller
{
    public static function getCategories(Request $request , $paginate = true){

        $categories =  ResearchCategory::where('name','<>', null)->orderBy('id','desc') ;

        if($paginate === true) {
            return $categories->paginate();

        }

        return $categories->get() ;

    }

    public function addCategory(Request $request){

        if($request->get('categories') !== null){

            $cats = explode('|', $request->get('categories')) ;

            foreach ($cats as $cat) {

                $check = ResearchCategory::where('name','=' , $cat)->first() ;

                if($check === null) {

                    ResearchCategory::create([
                        'name' => $cat
                    ]);

                }

            }

            session()->put('success','Added successfully !');

        }

        return redirect()->back() ;

    }

    public function getCategoriesJson(Request $request){
        return self::getCategories($request , false) ;
    }

    public function getCatDetails($cat_id){
        return ResearchCategory::find($cat_id) ;
    }

    public function updateCategory(Request $request){

        $cat = $this->getCatDetails($request->get('cat_id')) ;

        if($cat !== null) {

            $cat->update([
                'name' => $request->get('name')
            ]);

            session()->put('success','The category has been updated successfully !');

        }

        return redirect() ->back() ;

    }


    public function deleteCategory(Request $request){

        $cat = $this->getCatDetails($request->get('cat_id')) ;

        if($cat !== null) {

            $cat->delete() ;

            session()->put('success','The category has been updated successfully !');

        }

        return redirect() ->back() ;

    }



}
