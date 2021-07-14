@extends('front.layouts.navbar')
@section('content')
<!-- Start banar  -->
<div class="banar">
    <div class="overlay"></div>
    <div class="lib-info text-center">
        <h3>تحميل كتب وروايات PDF</h3>
        <p>من أجل نشر المعرفة والثقافة، وغرس حب القراءة بين المتحدثين باللغة العربية</p>
    </div>
</div>
<!-- End banar -->

<!-- Start Books -->
<div class="books">
    <div class="container">
    @foreach($categories as $category)
    <h3 class="mt-3 text-center">{{$category->name}}</h3>
        <div class="row">
            
            @foreach($category->books as $book)

            <div class="col-md-6 col-lg-2 mt-2">
                <a href="{{route('show.book',$book->slug)}}">
                    <div class="card text-center">
                        <div class="img-cover">
                            <img height="250px" src="{{asset('uploads/'.$book->image)}}" alt="Book Cover" title="{{$book->name}}" class="card-img-top">
                        </div>
                        <div class="card-body">
                            <a class="card-title" href="">{{$book->name}}</a>
                        </div>
                    </div>
                </a>
            </div>
           
        @endforeach
        </div>
        @endforeach
    </div>
</div>

@endsection