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
<div class="books authors">
    <div class="container">
        
        <div class="row">
            <h3 class="mt-3">المؤلفون</h3>
            @foreach($authors as $author)
            <div class="col col-lg-2  mt-2">
                <a href="{{route('show.authors',$author->slug)}}">
                    <div class="card text-center">
                        <div class="img-cover">
                            <img height="200px" src="{{asset('uploads/'.$author->image)}}" alt="Book Cover" title="رواية" class="card-img-top">
                        </div>
                        <div class="card-body">
                            <a class="card-title" href="">{{$author->name}}</a>
                        </div>
                    </div>
                </a>
            </div>
           
        @endforeach
        </div>
        <div class="mt-2">
        {{$authors->links()}}
        </div>
        
    </div>
</div>

@endsection