<x-navbar-layout title="إضافة قسم">

    <form class= "mb-3" action="{{route('admin.books.update',$books->id)}}" method="post" enctype="multipart/form-data">
        @method('put')
        @include('admin.books.form',[$btn_name = 'تعديل'])
    </form >
    <script>
        $('.yearpicker').yearpicker();
    </script>
</x-navbar-layout>