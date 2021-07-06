<x-navbar-layout title="إضافة مؤلف">
    <form action="{{route('admin.authors.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">اسم المؤلف</label>
            <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="اسم القسم">
            @error('name')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror

        </div>
        <div class="mb-3">
            <label for="" class="form-label">نبذة عن الكاتب</label>
            <textarea name="description" class="form-control">{{old('description')}}</textarea>
            @error('description')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">الصورة</label>
            <input type="file" class="form-control" name="image">
            @error('image')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button class="btn btn-primary">اضافة</button>
    </form>
</x-navbar-layout>