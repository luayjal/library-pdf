<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'library') }}</title>
    <link rel="icon" type="image/png" href="/book-icon.png">
    <!-- favicon -->
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
            <div class="collapse navbar-collapse " id="menu">
                <ul class="navbar-nav  me-auto mb-2 mb-lg-0 ">
                    <li class="nav-item">
                        <a href="/" class="nav-link btn-outline-light">الرئيسية</a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('categories')}}" class="nav-link btn-outline-light">الأقسام</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('authors')}}" class="nav-link btn-outline-light">المؤلفون</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('contact-us')}}" class="nav-link btn-outline-light">تواصل معنا</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-light mx-auto" href="{{route('login')}}" class="nav-link">دخول</a>
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

    <!-- Footer -->
    <footer class=" text-center text-white mt-5">
        <!-- Grid container -->
        <div class="container p-4">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

                <!-- Twitter -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>

                <!-- Instagram -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"></i></a>

                <!-- Linkedin -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>

            </section>
            <!-- Section: Social media -->

            <!-- Section: Form -->
            <section class="">
                <form action="">
                    <!--Grid row-->
                    <div class="row d-flex justify-content-center">
                        <!--Grid column-->
                        <div class="col-auto">
                            <p class="pt-2">
                                <strong>اشترك بالقائمة البريدية لموقعنا وتوصل بجديد الكتب التي يتم طرحها مباشرة على بريدك الإلكتروني</strong>
                            </p>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-5 col-12">
                            <!-- Email input -->
                            <div class="form-outline form-white mb-4">
                                <input type="email" id="form5Example2" class="form-control" placeholder="ادخل البريد الالكتروني"/>
                                
                            </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-auto">
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-outline-light mb-4">
                                اشترك
                            </button>
                        </div>
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->
                </form>
            </section>
            <!-- Section: Form -->


            <!-- Section: Links -->
          
            <!-- Section: Links -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3 " style="background-color: rgba(0, 0, 0, 0.2);">
            © 2021 جميع الحقوق محفوظة:
            <a class="text-white" href="/">مكتبة إقرأ</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <script src="{{asset('front/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('front/js/all.min.js')}}"></script>
</body>

</html>