<x-navbar-layout title="إضافة قسم">
  @error('name')
  <div class="alert alert-danger">
    {{ $message }}
  </div>
  @enderror
  <form action="{{route('admin.categories.store')}}" method="post">
    @csrf
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">اسم القسم</label>
      <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="اسم القسم">
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
    <button class="btn btn-primary">اضافة</button>
  </form>
  @push('script')
  <script>
    $(function() {
      $('select').selectize({});
    });
  </script>
  @endpush
</x-navbar-layout>