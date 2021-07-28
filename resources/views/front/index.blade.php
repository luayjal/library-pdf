@extends('front.layouts.navbar')
@section('content')
<!-- Start banar  -->
<div class="banar">

    <div class="lib-info">
        <h3 class="mb-4" style="text-shadow: -4px 4px 6px #191919;">إن الكتاب هو الجليس الذي لا ينافق، ولا يمل، ولا يعاتب إذا جفوته، ولا يفشي سرك.</h3>
       

        <form class="d-flex form-group" action="{{route('search')}}" method="get">
            <input class="form-control search me-2" type="search" placeholder="ابحث عن كتاب أو مؤلف" name="search" aria-label="Search">
            <button class="btn btn-outline-light btn-search" type="submit"><i class="fas fa-search fa-lg "></i></button>
        </form>


    </div>
</div>
<!-- End banar -->

<!-- Start Books -->
<div class="books">
    <div class="container">
        <div class="row">


            <h3 class="mt-3 title">الأكثر تحميلاً</h3>

            @foreach($highBooks as $highBook)

            <div class="col col-lg-2 mt-2">
                <a href="{{route('show.book',$highBook->slug)}}">
                    <div class="card text-center">
                        <div class="img-cover">
                            <img height="245px" src="{{asset('uploads/'.$highBook->image)}}" alt="Book Cover" title="{{$highBook->name}}" class="card-img-top">
                        </div>
                        <div class="card-body">
                            <p class="card-title">{{$highBook->name}}</p>
                        </div>
                    </div>
                </a>
            </div>

            @endforeach
            
            <h3 class="mt-3 title">أحدث الكتب</h3>

            @foreach($books as $book)

            <div class="col col-lg-2 mt-2">
                <a href="{{route('show.book',$book->slug)}}">
                    <div class="card text-center">
                        <div class="img-cover">
                            <img height="245px" src="{{asset('uploads/'.$book->image)}}" alt="Book Cover" title="{{$book->name}}" class="card-img-top">
                        </div>
                        <div class="card-body">
                            <p class="card-title">{{$book->name}}</p>
                        </div>
                    </div>
                </a>
            </div>

            @endforeach

        </div>

    </div>
</div>

@endsection