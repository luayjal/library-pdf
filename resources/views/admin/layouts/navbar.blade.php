<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('css/yearpicker.css')}}">
 <link rel="stylesheet" href="{{asset('css/selectize.bootstrap4.css')}}">

   <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{asset('js/yearpicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/selectize.min.js')}}"></script>
    <title>{{ config('app.name', 'library') }}</title>
    <link rel="icon" type="image/png" href="/book-icon.png">
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
                    <li class="nav-item mx-2">
                        <a class="nav-link btn btn-outline-secondary" aria-current="page" href="{{route('admin.message')}}">الرسائل</a>
                    </li>

                    <li class="nav-item mx-2">
                        <a class="nav-link btn btn-outline-primary" target="_blank" href="/">عرض الموقع</a>
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
                    <a class="nav-link @if(request()->routeIs('admin.categories.index')) active @endif" aria-current="page" href="{{route('admin.categories.index')}}">الأقسام</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('admin.books.index')) active @endif" href="{{route('admin.books.index')}}">الكتب</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('admin.authors.index')) active @endif" href="{{route('admin.authors.index')}}">المؤلفون</a>
                </li>
                @can('view-any', App\Models\User::class)
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('admin.users.index')) active @endif" href="{{route('admin.users.index')}}">المستخدمين</a>
                </li>
                @endcan
                @can('view-any', App\Models\Role::class)
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('admin.roles.index')) active @endif" href="{{route('admin.roles.index')}}">الصلاحيات</a>
                </li>
                @endcan
                <!-- The current user can update the post... -->
            </ul>
            <div class="col-lg-9 content">
                <h1 class="mt-3">{{$title}}</h1>
                {{$slot}}
            </div>
        </div>
    </div>

    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/all.min.js')}}"></script>
  

    @stack('script')
</body>


</html>