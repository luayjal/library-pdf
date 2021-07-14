<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>كتب pdf</title>
    <!-- favicon -->
    <link rel="icon" type="image/png" href="layout/images/book.png">
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/all.min.css')}}">
    <!-- Font -->
    <link rel="stylesheet" href="layout/font/droid-kufi.css">
</head>

<body>

    <!--    Start navbar    -->
    
    <nav class="navbar navbar-expand-sm navbar-light">
        <div class="container">
            <a href="/" class="navbar-brand"><img src="/images/book-logo.png" alt="" srcset=""> <span>مكتبة إقرأ</span></a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav  me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="/" class="nav-link">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('categories')}}" class="nav-link">الأقسام</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('authors')}}" class="nav-link">المؤلفون</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">تواصل معنا</a>
                    </li>
                   <!--  <form class="d-flex" action="{{route('search')}}" method="get">
                        <input class="form-control me-2" type="search" placeholder="ابحث عن كتاب أو مؤلف" name="search" aria-label="Search">
                        <button class="btn btn-success" type="submit">Search</button>
                    </form> -->
                    <!--  <li  class="nav-item">
                   <a href="#" target="_blank" class="nav-link dashboard-btn">لوحة التحكم</a>
                   </li> -->

                </ul>
            </div>

        </div>
    </nav>
    <!--    End navbar    -->
    <main>
        @yield('content')
    </main>
    <footer class="text-center mt-5">
        <p class="copyright">جميع الحقوق محفوظة &copy; 2020</p>
    </footer>
    <!-- End Footer -->
    <script src="{{asset('front/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('front/js/all.min.js')}}"></script>
</body>

</html>