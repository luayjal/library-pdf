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
    <h3 class="mt-4 text-center">الأقسام</h3>
        <div class="row">
            
        @foreach($categories as $category)
            <div class="col-md-6 col-lg-2 mt-2">
                <a href="{{route('show.categories',$category->slug)}}">
                    <div class="card ctegories-card text-center">
                    <h3 class="mt-3">{{$category->name}}</h3>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
      
    </div>
</div>

@endsection