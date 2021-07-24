<x-navbar-layout title="الرسائل">
  @if(session()->has('status'))
  <div class="alert alert-success">{{session()->get('status')}}</div>
  @endif
  <div class="search mt-5">
    <h4>البحث</h4>
    <form class="d-flex" action="{{--route('admin.categories.index')--}}" method="get">
      <div class="me-2">
        <label class="form-label">اسم القسم</label>
        <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="اسم القسم">
      </div>


      <button class="btn mt-4" type="submit"><i class="fas fa-search  fa-2x"></i></button>
    </form>
  </div>
  <table class="table table-striped table-bordered align-middle mt-4">
    <thead>
      <!-- <tr>
        <th scope="col">#</th>
        <th scope="col">الاسم</th>
        <th scope="col">القسم الرئيسي</th>
        <th scope="col">تاريخ الانشاء</th>
        <th scope="col"></th>
      </tr> -->
    </thead>
    <tbody>
      @foreach($messages as $message)
      <tr>
        <th scope="row"><i class="fas fa-envelope "></i></th>
          <td>{{$message->name}}</td>
          <td>{{$message->email}}</td>
       
            <td><a href="{{route('admin.message.details',$message->slug)}}" class="link-dark active">{{Str::limit("$message->message",90)}}</a></td>
          
        <td>{{$message->created_at}}</td>
        <td>
          <form class="d-inline" action="{{--route('admin.categories.destroy',$message->id)--}}" method="post">
            @method('delete')
            @csrf
            <button class="btn btn-outline-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $messages->links() }}
  @push('script')
  <script>
    $(function() {
      $('select').selectize({});
    });
  </script>
  @endpush
</x-navbar-layout>