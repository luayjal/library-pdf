<x-navbar-layout title="المؤلفون">
    @if(session()->has('status'))
    <div class="alert alert-success">{{session()->get('status')}}</div>
    @endif
    <a href="{{route('admin.authors.create')}}" class="btn btn-info mt-3 mb-3">اضافة</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">الاسم</th>
                <th scope="col">تاريخ الانشاء</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($authors as $author)
            <tr>
                <th scope="row">{{$author->id}}</th>
                <td>{{$author->name}}</td>
                <td>{{$author->created_at}}</td>
                <td>
                    <a class="btn btn-primary" href="{{route('admin.authors.edit',$author->id)}}">تعديل</a>
                    <form class="d-inline" action="{{route('admin.authors.destroy',$author->id)}}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" type="submit">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$authors->links()}}
</x-navbar-layout>