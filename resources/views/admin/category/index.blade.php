<x-navbar-layout title="الأقسام">
  @if(session()->has('status'))
  <div class="alert alert-success">{{session()->get('status')}}</div>
  @endif
  <div class="search mt-5">
    <h4>البحث</h4>
    <form class="d-flex" action="{{route('admin.categories.index')}}" method="get">
      <div class="me-2">
        <label  class="form-label">اسم القسم</label>
        <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="اسم القسم">
      </div>

      <div class="me-2">
        <label  class="form-label">القسم الرئيسي</label>
        <select class="form-control search-input" id="select-beast" name="parent_id">
          <option value="">كل الأقسام</option>
          @foreach($parents as $parent)
          <option class="form-control" value="{{$parent->id}}">{{$parent->name}}</option>
          @endforeach
        </select>
      </div>
      <button class="btn mt-4" type="submit"><i class="fas fa-search  fa-2x"></i></button>
    </form>
  </div>
  <a href="{{route('admin.categories.create')}}" class="btn btn-info mt-3 mb-3"><i class="fas fa-plus"></i></a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">القسم</th>
        <th scope="col">القسم الرئيسي</th>
        <th scope="col">تاريخ الانشاء</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($categories as $category)
      <tr>
        <th scope="row">{{$category->id}}</th>
        <td>{{$category->name}}</td>
        <td>{{$category->parent->name}}</td>
        <td>{{$category->created_at}}</td>
        <td>
          <a class="btn btn-primary" href="{{route('admin.categories.edit',$category->id)}}"><i class="fas fa-edit"></i></a>
          <form class="d-inline" action="{{route('admin.categories.destroy',$category->id)}}" method="post">
            @method('delete')
            @csrf
            <button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $categories->links() }}
  @push('script')
  <script>
    $(function() {
      $('select').selectize({});
    });
  </script>
  @endpush
</x-navbar-layout>