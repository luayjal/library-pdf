<x-navbar-layout title="المستخدمين">
    @if(session()->has('status'))
    <div class="alert alert-success">{{session()->get('status')}}</div>
    @endif
    <a href="{{route('admin.users.create')}}" class="btn btn-info mt-3 mb-3">اضافة</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">الاسم</th>
                <th>الايميل</th>
                <th>الصلاحيات</th>
                <th scope="col">العمليات</th>
             
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                @foreach($user->roles as $roles)
                <td>{{$roles->name}}</td>
                @endforeach
                <td>
                    <a class="btn btn-primary" href="{{route('admin.users.edit',$user->id)}}">تعديل</a>
                    <form class="d-inline" action="{{route('admin.users.destroy',$user->id)}}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" type="submit">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$users->links()}}
</x-navbar-layout>