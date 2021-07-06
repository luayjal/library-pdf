<x-navbar-layout title="إضافة كتاب">
  
    <form action="{{route('admin.books.store')}}" method="post" enctype="multipart/form-data">
     @include('admin.books.form')

     
    </form>
    <script>
        $('.yearpicker').yearpicker();
    </script>
</x-navbar-layout>