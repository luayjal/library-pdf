@extends('front.layouts.navbar')
@section('content')
<div class="container mt-4">
    @if(session()->has('success'))
    <div class="alert alert-success">{{session()->get('success')}}</div>
    @endif
    <form action="{{route('contact-us.save')}}" method="post">
        @csrf
        <h3>تواصل معنا</h3>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">الاسم</label>
            <input name="name" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">الايميل</label>
            <input name="email" type="email" class="form-control" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label class="form-label">الرسالة</label>
            <textarea name="message" class="form-control" rows="3"></textarea>
        </div>
        <div class="mb-3 text-center">

            <button class="btn btn-success" type="submit">إرسال <i class="fas fa-paper-plane"></i></button>
        </div>
    </form>
</div>
@endsection