<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::latest()->where('user_id',Auth::user()->id)->paginate(5);
        return view('admin.books.index',[
            'books' => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
       $this->authorize('create',Book::class);
       
        $categories = Category::all();
        $authors = Author::all();
        return view('admin.books.create',[
            'books'=>new Book(),
            'categories' =>  $categories,
            'authors' => $authors
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request,$id = '')
    {
        
        $this->authorize('create',Book::class);
        $data = $request->all();
       // dd($data);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $data['image'] = $file->store('/books/images',['disk' => 'uploads']);
        }
        if($request->hasFile('file')){
            $file = $request->file('file');
            $data['file'] = $file->storeAs('/books/file',$request->name.'.pdf',['disk' => 'uploads']);
        }

        if($request->hasFile('image-author')){
            $file = $request->file('image-author');
            $data['image'] = $file->store('/images',['disk' => 'uploads']);
        }
       $data['user_id'] = Auth::user()->id;
       
        $data['slug'] = Str::slug_ar($data['name']);
      // dd($data);
   
        Book::create($data);
        
        return redirect()->route('admin.books.index')->with('status','تم الاضافة بنجاح');

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
        $books = Book::findOrFail($id);
        $this->authorize('edit',$books);
        $categories = Category::all();
        $authors = Author::all();
        return view('admin.books.edit',[
            'books' => $books,
            'categories'=>$categories,
            'authors' =>$authors
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, $id)
    {
       // $clean = $this->booklValidation($request,$id);

       $book = Book::findOrFail($id);
       $this->authorize('edit',$book);
        $data = $request->all();
        $prevImage = false;
        $prevFile = false;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $data['image'] = $file->store('/books/images',['disk' => 'uploads']);
            $prevImage = $book->image;
        }
        if($request->hasFile('file')){
            $file = $request->file('file');
            $data['file'] = $file->storeAs('/books/file',$request->name.'.pdf',['disk' => 'uploads']);
            $prevFile = $book->file;
        }
        $data['slug'] = Str::slug_ar($data['name']);;
        $data['user_id'] = Auth::user()->id;
        $book->update($data);
       if ($prevImage || $prevFile) {
          Storage::disk('uploads')->delete($prevImage);
          Storage::disk('uploads')->delete($prevFile);
       }
        return redirect()->route('admin.books.index')->with('status','تم التعديل بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        

        $book = Book::findOrFail($id);
        $this->authorize('delete',$book);
        $book->delete();
        if ($book->image || $book->file) {
            Storage::disk('uploads')->delete($book->image);
          Storage::disk('uploads')->delete($book->file);
        }

        return redirect()->route('admin.books.index')->with('status','تم الحذف بنجاح');

    }

    
}
