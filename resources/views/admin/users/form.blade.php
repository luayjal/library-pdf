@csrf
<div class="mb-3">
    <label for="" class="form-label">الاسم</label>
    <input type="text" class="form-control" name="name" value="{{old('name',$user->name)}}" placeholder=" الاسم">
    @error('name')
    <div class="mt-2 alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="mb-3">
    <label for="" class="form-label">الايميل</label>
    <input type="email" class="form-control" name="email" value="{{old('email', $user->email)}}" placeholder=" الاسم">
    @error('emial')
    <div class="alert alert-danger mt-2">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="mb-3">
    <label for="" class="form-label">كلمة المرور</label>
    <input type="password" class="form-control" name="password" value="{{old('password')}}">
    @error('password')
    <div class="alert alert-danger mt-2">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="mb-3">
    <label for="" class="form-label">تأكيد كلمة المرور</label>
    <input type="password" class="form-control" name="password_confirmation" value="{{old('password_confirmation')}}">
    @error('password_confirmation')
    <div class="alert alert-danger mt-2">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="mb-3">
    <label for="" class="form-label"> الرتبة</label>
    
    <select class="form-control"  name="type">
        <option value=""></option>
        <option class="form-control" value="user" >user</option>
        <option class="form-control" value="admin" >admin</option>
        <option class="form-control" value="super-admin">super admin</option>
    </select>
    @error('type')
    <div class="alert alert-danger mb-2">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="mb-3">
    <label for="" class="form-label"> اضافة صلاحية</label>
    
    <select class="form-control"  name="role_id">
        <option value=""></option>
        @foreach($roles as $role)
        <option class="form-control" value="{{$role->id}}" > {{$role->name}} </option>
        @endforeach
    </select>
    @error('role_id')
    <div class="alert alert-danger mb-2">
        {{ $message }}
    </div>
    @enderror
</div>



<button class="btn btn-primary">{{$btn_name ?? 'حفظ'}}</button>
