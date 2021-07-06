<x-navbar-layout title="إضافة قسم">

    <form action="{{route('admin.authors.update',$authors->id)}}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">اسم المؤلف</label>
            <input type="text" class="form-control" name="name" value="{{old('name',$authors->name)}}" placeholder="اسم القسم">
            @error('name')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">نبذة عن الكاتب</label>
            <textarea name="description" class="form-control">{{old('description',$authors->description)}}</textarea>
            @error('description')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">الصورة</label>
            <div class="mb-2"><img height="150" src="{{asset($authors->image_url)}}" alt=""></div>
            <input type="file" class="form-control" name="image">
            @error('image')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button class="btn btn-primary">تعديل</button>
    </form>
</x-navbar-layout>