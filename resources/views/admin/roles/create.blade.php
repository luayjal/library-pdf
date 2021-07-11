<x-navbar-layout title="الأذونات">
  
    <form action="{{route('admin.roles.store')}}" method="post" enctype="multipart/form-data">
     @include('admin.roles.form')

     
    </form>
    <script>
        $('.yearpicker').yearpicker();
    </script>
</x-navbar-layout>