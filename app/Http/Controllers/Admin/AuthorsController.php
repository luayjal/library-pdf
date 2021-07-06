<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::latest()->paginate(5);
        return view('admin.authors.index',[
            'authors' => $authors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id = '')
    {
       
         $request->validate(Author::validateRuels($id),Author::CoustomMessage());
         dd($request->all());
        $data = $request->all();
        $data['slug'] = Str::slug_ar($data['name']);;

        if($request->hasFile('image')) {
            $file = $request->file('image');
           // $file->move(public_path('uploads/images'), uniqid() . '.' .  $file->getClientOriginalExtension());
            $data['image']= $file->store('/images',['disk' => 'uploads']);
            
        }

        else{
             $data['image'] = 'images/default-image.png' ;
        }
    
        Author::create($data);
        return redirect()->route('admin.authors.index')->with('status','تم الإضافة بنجاح');

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
        $authors = Author::findOrFail($id);
        return view('admin.authors.edit',[
            'authors' => $authors
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
       
       // $clean = $this->authorValidation($request,$id);
        $author = Author::findOrFail($id);
        $request->validate(Author::validateRuels($id));
        $data = $request->all();
        $data['slug'] = Str::slug_ar($data['name']);;
        $prevImg = false;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $data['image'] = $file->store('/images',['disk' => 'uploads']);
            $prevImg = $author->image;
        }
        $author->update($data);
       if($prevImg){
        Storage::disk('uploads')->delete($prevImg);
       }
        return redirect()->route('admin.authors.index')->with('status','تم التعديل بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();
        if($author->image){
            Storage::disk('uploads')->delete($author->image);
           }
           return redirect()->route('admin.authors.index')->with('status','تم الحذف بنجاح');

    }

    protected function authorValidation(Request $request,  $id){
        return $request->validate ([
            'name'=>'required|unique:books,name,' .$id,
            'description' => 'required|min:20',
            'image'=> 'image',
            

        ],
    
          [
        'name.required' => 'هذا الحقل إجباري',
        'name.unique' => 'هذا الاسم موجود مسبقاً',
        'description.required' => 'هذا الحقل اجباري',
        'description.min' => 'يجب أن يكون نص الوصف أكبر من 20 حرف',
        'image.image'=> 'الرجاء ارفاق صيغة صحيحة للصورة'
            ]);
    }
}
