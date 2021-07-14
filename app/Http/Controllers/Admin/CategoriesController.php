<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $categories = Category::when($request->name , function($query , $value){
           $query->where('name','LIKE',"%{$value}%");
       })
      ->when($request->parent_id, function($query , $value){
          $query->where('parent_id',$value);
      })
       ->latest()->orderBy('parent_id')->paginate(10);
      
       $parents = Category::orderBy('name','asc')->get();

        return view('admin.category.index',[
            'categories'=> $categories,
            'parents' => $parents
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $parents = Category::get();
        return view('admin.category.create',[
            'parents' => $parents
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:categories,name'
        ],
    [
        'name.required' => 'هذا الحقل إجباري',
        'name.unique' => 'هذا الاسم موجود مسبقاً'
    ]);

    $request->merge([
        'slug' => Str::slug_ar($request->name),
    ]);
    
        Category::create($request->all());
        return redirect()->route('admin.categories.index')->with('status','تم الإضافة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $parents = Category::where('id','!=' ,$id)->get();

        return view('admin.category.edit',[
            'category' => $category,
            'parents' => $parents,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      

        $request->validate([
            'name'=>'required|unique:categories,name,' . $id,
        ],
    [
        'name.required' => 'هذا الحقل إجباري',
        'name.unique' => 'هذا الاسم موجود مسبقاً'
    ]);
    $category = Category::findOrFail($id);
    
   
       $request->merge([
        'slug' => Str::slug_ar($request->name),
         ]);
        $category->update($request->all());
        return redirect()->route('admin.categories.index')->with('status','تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('admin.categories.index')->with('status','تم الحذف بنجاح');
    }

    /* function make_slug($string, $separator = '-')
    {
        $string = trim($string);
        $string = mb_strtolower($string, 'UTF-8');
        $string = preg_replace("/[^a-z0-9_\-\sءاآؤئبپتثجچحخدذرزژسشصضطظعغفقكکگلمنوهیية]/u", '', $string);
        $string = preg_replace("/[\s\-_]+/", ' ', $string);
        $string = preg_replace("/[\s_]/", $separator, $string);

        return $string;
    } */
}
