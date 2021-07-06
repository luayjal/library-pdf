@csrf
<div class="mb-3">
    <label for="" class="form-label">اسم الكتاب</label>
    <input type="text" class="form-control" name="name" value="{{old('name',$books->name)}}" placeholder="اسم الكتاب">
    @error('name')
    <div class="mt-2 alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="mb-3">
    <label for="" class="form-label">وصف الكتاب</label>
    <textarea name="description" class="form-control">{{old('description',$books->description)}}</textarea>
    @error('description')
    <div class="alert alert-danger mt-2">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="mb-3">
    <label for="" class="form-label">صورة غلاف الكتاب</label>
    <div><img height="150" src="{{$books->image_book}}" alt="" srcset=""></div>
    <input type="file" class="form-control" name="image">
    @error('image')
    <div class="alert alert-danger mt-2">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="mb-3">
    <label for="" class="form-label">ملف الكتاب</label>
    <input type="file" class="form-control" name="file">
    @error('file')
    <div class="alert alert-danger mt-2">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="mb-3">
    <label for="" class="form-label">لغة الكتاب</label>
    <input type="text" class="form-control" name="language" value="{{old('language',$books->language)}}">
    @error('language')
    <div class="alert alert-danger mt-2">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="mb-3">
    <label for="" class="form-label">تاريخ اصدار الكتاب</label>
    <input type="text" class="form-control yearpicker" value="{{old('releas_date',$books->releas_date)}}" name="releas_date">
    @error('releas_date')
    <div class="alert alert-danger mb-2">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="mb-3">
    <label for="" class="form-label"> القسم</label>
    <select class="form-control select2" multiple name="category_id">
        <option></option>
        @foreach($categories as $category)
        <option class="form-control" value="{{$category->id}}" @if(isset($books->category->id)) @if($category->id == $books->category->id) selected @endif @endif >{{$category->name}}</option>
        @endforeach
    </select>
    @error('category')
    <div class="alert alert-danger mb-2">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="mb-3">
    <label for="" class="form-label">المؤلف</label>
    <select class="form-control select2 " multiple name="author_id" id="select2-dropdown">
        @foreach($authors as $author)
        <option class="form-control" value="{{$author->id}}" @if(isset($books->author->id)) @if($author->id == $books->author->id) selected @endif @endif>{{$author->name}}</option>
        @endforeach
    </select>
    @error('staus')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="mb-3">
    <label for="" class="form-label"> الحالة</label>
    <label for=""><input type="radio" name="status" value="active" @if (old('status', $books->status) == 'active') checked @endif>مفعل</label>
    <label for="" class="form-label"><input type="radio" name="status" value="inactive" @if (old('status', $books->status) == 'inactive') checked @endif>غير مفعل</label>
    @error('staus')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>

<button class="btn btn-primary">{{$btn_name ?? 'حفظ'}}</button>

@push('scripts')
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@endpush