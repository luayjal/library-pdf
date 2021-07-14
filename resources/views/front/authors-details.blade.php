@extends('front.layouts.navbar')
@section('content')
<!-- Start show book -->
<div class="books">
    <div class="container">
        <div class="book">
            <div class="row">

                <div class="col-md-4">
                    <div class="book-cover">
                        <img width="250px" src="{{asset('uploads/'.$authors->image)}}" alt=" Book cover">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="book-content">
                        <h4>{{$authors->name}}</h4>
                        <h5>
                            <a href=""></a>
                        </h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-8">
                                <p>{{$authors->description}}</p>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End show book -->

<!-- Start Related Books -->
<div class="related-books">
    <div class="container">
        <h4>مؤلفاته</h4>
        <hr>
        <div class="row">
            @foreach($authors->books as $book)
            <div class="col-md-6 col-lg-2 mt-2">

                <a href="{{route('show.book',$book->slug)}}">
                    <div class="card text-center">
                        <div class="img-cover">
                            <img height="250px" src="{{$book->image_book}}" alt="Book Cover" class="card-img-top">
                        </div>
                        <div class="card-body">
                            <p class="card-title" >{{$book->name}}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach

        </div>
    </div>
</div>
<!-- End Related Books -->
@endsection