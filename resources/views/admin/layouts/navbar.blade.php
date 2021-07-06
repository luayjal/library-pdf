<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('css/yearpicker.css')}}">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js')}}"></script>
    <script src="{{asset('js/yearpicker.js')}}"></script>


    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">مكتبة إقرأ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">الأقسام</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">الكتب</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="/">عرض الموقع</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <form method="POST" id="logoutForm" action="{{ route('logout') }}">
                                    @csrf

                                </form>
                                <a href="#" class="nav-link" onclick="document.getElementById('logoutForm').submit()"> تسجيل الخروج </a>
                            </li>

                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">

            <ul class="nav flex-column col-md-3 col-lg-2 bg-light">
                <li class="nav-item">
                    <a class="nav-link @if(URL::current() == route('admin.categories.index')) active @endif" aria-current="page" href="{{route('admin.categories.index')}}">الأقسام</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(URL::current() == route('admin.books.index')) active @endif" href="{{route('admin.books.index')}}">الكتب</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(URL::current() == route('admin.authors.index')) active @endif" href="{{route('admin.authors.index')}}">المؤلفون</a>
                </li>

            </ul>
            <div class="col-lg-9 content">
                <h1 class="mt-3">{{$title}}</h1>
                {{$slot}}
            </div>
        </div>
    </div>

    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <!--     <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script> -->


</body>

@stack('scripts')

</html>