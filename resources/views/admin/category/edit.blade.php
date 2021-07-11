<x-navbar-layout title="إضافة قسم">
@error('name')
  <div class="alert alert-danger">
  {{ $message }}
  </div>
  @enderror
<form method="post"  action="{{route('admin.categories.update',$category->id)}}" >
  @method('put')    
  @csrf
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">اسم القسم</label>
  <input type="text" class="form-control" name="name" value="{{$category->name}}" placeholder="اسم القسم">
</div>
<button class="btn btn-primary">تعديل</button>
</form>
</x-navbar-layout>