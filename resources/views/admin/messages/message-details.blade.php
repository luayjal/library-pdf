<x-navbar-layout title="">
<div class="card">
  <div style="text-decoration: none;" class="card-header">
      <p><span>الاسم: </span>{{$message->name}}</p>
      <p><span>البريد الإلكتروني: </span>{{$message->email}}</p>
      <span><span>تاريخ الارسال: </span>{{$message->created_at}}</span>
  </div>
  <div class="card-body">
    
    <p class="card-text">{{$message->message}}</p>
  </div>
</div>
</x-navbar-layout>