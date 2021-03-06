@extends('front.layouts.navbar')
@section('content')
<!-- Start show book -->
<div class="books">
    <div class="container">
        <div class="book">
            <div class="row">

                <div class="col-md-12 col-lg-4">
                    <div class="book-cover text-center">
                        <img width="250px" src="{{$book->image_book}}" alt=" Book cover">
                    </div>
                </div>
                <div class="col col-lg-8 mt-3">
                    <div class="book-content ">
                        <h4>{{$book->name}}</h4>
                        <h5>
                            <a href=""></a>
                        </h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-7">
                                <p>{{$book->description}}</p>
                            </div>
                            <div class="col-md-5">
                                <table class="table">
                                <tr>
                                <th>المؤلف: </th>
                                <th><a href="{{route('show.authors',$book->author->slug)}}">{{$book->author->name}}</a></th>
                                </tr>

                                <tr>
                                <th>القسم: </th>
                                <th><a href="{{route('show.categories',$book->category->slug)}}">{{$book->category->name}}</a></th>
                                </tr>
                                
                                <tr>
                                <th>اللغة: </th>
                                <th>{{$book->language}}</th>
                                </tr>

                                <tr>
                                <th>تاريخ الاصدار: </th>
                                <th>{{$book->releas_date}}</th>
                                </tr>

                                <tr>
                                <th>حجم الملف : </th>
                                <th>{{$sizeFile}}</th>
                                </tr>
                                <tr>
                                <th>عدد التحميلات:</th>
                                <th>{{$book->download_number}}</th>
                                </tr>
                                </table>
                            </div>
                        </div>
                        <div class="text-center">
                        <a class="btn btn-download" href="{{route('download.book',$book->slug)}}"><i class="fas fa-download"></i> تحميل</a>
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
        <h4>كتب ذات صلة</h4>
        <hr>
        <div class="row">
                @foreach($categories as $category)
                @foreach($category->books as $book)
                <div class="col col-lg-2 mt-2">

                <a href="{{route('show.book',$book->slug)}}">
                    <div class="card text-center">
                        <div class="img-cover">
                        <img  height="245px" src="{{$book->image_book}}" alt="Book Cover" class="card-img-top">
                        </div>
                        <div class="card-body">
                            <a class="card-title" href="">{{$book->name}}</a>
                        </div>
                    </div>
                </a>
                </div>
                @endforeach
                @endforeach

        </div>
    </div>
</div>
<!-- End Related Books -->
@endsection