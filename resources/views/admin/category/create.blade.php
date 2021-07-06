<x-navbar-layout title="إضافة قسم">
  @error('name')
  <div class="alert alert-danger">
  {{ $message }}
  </div>
  @enderror
<form  action="{{route('admin.categories.store')}}" method="post">
    @csrf
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">اسم القسم</label>
  <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="اسم القسم">
</div>
<button class="btn btn-primary">اضافة</button>
</form>
</x-navbar-layout>