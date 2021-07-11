<x-navbar-layout title="الأذونات">
    @if(session()->has('status'))
    <div class="alert alert-success">{{session()->get('status')}}</div>
    @endif
    <a href="{{route('admin.roles.create')}}" class="btn btn-info mt-3 mb-3">اضافة</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">الاسم</th>
                <th>#</th>
                
                
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
            <tr>
                <th scope="row">{{$role->id}}</th>
                <td>{{$role->name}}</td>
                
                <td>{{$role->created_at}}</td>
                <td>
                    <a class="btn btn-primary" href="{{route('admin.roles.edit',$role->id)}}">تعديل</a>
                    <form class="d-inline" action="{{route('admin.roles.destroy',$role->id)}}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" type="submit">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$rolesb->links()}}
</x-navbar-layout>