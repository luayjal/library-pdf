<x-navbar-layout title="الكتب">
    @if(session()->has('status'))
    <div class="alert alert-success">{{session()->get('status')}}</div>
    @endif
    <a href="{{route('admin.books.create')}}" class="btn btn-outline-success mt-3 mb-3"><i class="fas fa-plus"></i></a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">الاسم</th>
                <th>تاريخ الاصدار</th>
                <th scope="col">القسم</th>
                <th scope="col">المؤلف</th>
                <th scope="col">الحالة</th>
                <th scope="col">تاريخ الانشاء</th>
                <th scope="col">الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <th scope="row">{{$book->id}}</th>
                <td>{{$book->name}}</td>
                <td>{{$book->releas_date}}</td>
                <td>{{$book->category->name}}</td>
                @if($book->author)
                <td>{{$book->author->name}}</td>
                @endif
                <td>{{$book->status}}</td>
                <td>{{$book->created_at}}</td>
                <td>
                    <a class="btn btn-outline-primary" href="{{route('admin.books.edit',$book->id)}}"><i class="fas fa-edit"></i></a>
                    <form class="d-inline" action="{{route('admin.books.destroy',$book->id)}}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-outline-danger" type="submit"><i class="fas fa-trash-alt "></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$books->links()}}
</x-navbar-layout>