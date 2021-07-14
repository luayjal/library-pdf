<x-navbar-layout title="إضافة مستخدم">
  
    <form action="{{route('admin.users.store')}}" method="post" enctype="multipart/form-data">
     @include('admin.users.form')

     
    </form>
    <script>
        $('.yearpicker').yearpicker();
    </script>
</x-navbar-layout>