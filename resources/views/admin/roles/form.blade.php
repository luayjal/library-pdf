@csrf
<div class="mb-3">
    
    <label for="" class="form-label">    </label>

    <input type="text" class="form-control" name="name" value="{{old('name', $role->name )}}" >
    
    @error('name[]')
    <div class="mt-2 alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>
@foreach(config('permissions') as $key => $value)
<div class="mb-3">
    
    <label for="" class="form-label">
    <input type="checkbox" class="form-check-input" name="permissions[]" @if(in_array($key,$role->permissions ?? [])) checked @endif value="{{$key}}" >
    {{$value}}
    </label>
    @error('permissions[]')
    <div class="mt-2 alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>
@endforeach

<button class="btn btn-primary">{{$btn_name ?? 'حفظ'}}</button>