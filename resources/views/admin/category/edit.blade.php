<x-navbar-layout title="إضافة قسم">
  @error('name')
  <div class="alert alert-danger">
    {{ $message }}
  </div>
  @enderror
  <form method="post" action="{{route('admin.categories.update',$category->id)}}">
    @method('put')
    @csrf
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">اسم القسم</label>
      <input type="text" class="form-control" name="name" value="{{$category->name}}" placeholder="اسم القسم">

    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">القسم الرئيسي</label>
      <select class="form-control" name="parent_id">
        <option value=""></option>
        @foreach($parents as $parent)
        <option class="form-control" value="{{$parent->id}}">{{$parent->name}}</option>
        @endforeach
      </select>
    </div>
    <button class="btn btn-primary">تعديل</button>
  </form>
  @push('script')
  <script>
    $(function() {
      $('select').selectize({});
    });
  </script>
  @endpush
</x-navbar-layout>