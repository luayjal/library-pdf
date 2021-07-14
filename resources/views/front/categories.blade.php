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
    <div class="container mt-4 container-category">
        <div class="row text-md-start text-center">
                <h2 class="pt-4 text-center">الأقسام</h3>

                @foreach($parents as $parent)
                <a href="{{route('show.categories',$parent->slug)}}">

                    <h5 class="mt-5">
                        <i class="fas fa-swatchbook"></i>
                        {{$parent->name}}
                    </h5>
                </a>
                @foreach($parent->children as $child)
                <div class="col-md-6 col-lg-2 mt-2 ">
                    <a href="{{route('show.categories',$child->slug)}}">
                        <p>
                            <i class="fas fa-book"></i>
                            {{$child->name}}
                        </p>
                    </a>
                </div>
                @endforeach
                @endforeach
            </div>
            <div class="mt-4">
            {{$parents->links()}}
            </div>
            
    </div>
</div>

@endsection