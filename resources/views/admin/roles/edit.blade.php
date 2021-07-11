<x-navbar-layout title="تعديل">
    <form class= "mb-3" action="{{route('admin.roles.update',$role->id)}}" method="post" enctype="multipart/form-data">
        @method('put')
        @include('admin.roles.form',[$btn_name = 'تعديل'])
    </form >
    <script>
        $('.yearpicker').yearpicker();
    </script>
</x-navbar-layout>