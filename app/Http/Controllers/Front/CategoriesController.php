<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(){
       // $categories = Category::with('books')->whereHas('books')->get();
      
      $parents = Category::with(['children'])->whereDoesntHave('parent')->paginate(10);
     
       return view('front.categories',[
           // 'categories' => $categories,
            'parents' => $parents,
    ]);
    }

    public function show($slug){

        $categories = Category::where('slug',$slug)->with(['books'=>function($q){
            $q->where('status','active');
        }])->whereHas('books')->paginate(20);

        return view('front.categories-details',[
            'categories' => $categories,
    ]);

    }
}
