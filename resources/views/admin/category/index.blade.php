<x-navbar-layout title="الأقسام">
    @if(session()->has('status'))
    <div class="alert alert-success">{{session()->get('status')}}</div>
    @endif
    <a href="{{route('admin.categories.create')}}" class="btn btn-info mt-3 mb-3">اضافة</a>
<table class="table table-striped">
<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">القسم</th>
      <th scope="col">تاريخ الانشاء</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
      @foreach($categories as $category)
    <tr>
      <th scope="row">{{$category->id}}</th>
      <td>{{$category->name}}</td>
      <td>{{$category->created_at}}</td>
      <td>
          <a class="btn btn-primary" href="{{route('admin.categories.edit',$category->id)}}">تعديل</a>
          <form class="d-inline" action="{{route('admin.categories.destroy',$category->id)}}" method="post">
            @method('delete')    
            @csrf
              <button class="btn btn-danger" type="submit">حذف</button>
          </form>
    </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $categories->links() }}
</x-navbar-layout>