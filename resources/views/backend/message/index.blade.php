@extends('backend.layout')

@section('content')
<div class="container">
  @if(Session::has('success'))
  <p class="alert alert-info">{{ Session::get('success') }}</p>
  @endif
  <div class="row">
    <div class="col-md-8">
      <h2>Contact Us Messages</h2>
    </div>
  </div>
  
  <table class="table table-striped" id="myTable">
    <thead>
      <tr>
        <th>Sr no</th>
        <th>Name</th>
        <th>phone</th>
        <th>Email</th>
        <th>message</th>
        <th>Created At</th>
      </tr>
    </thead>
    <tbody>
      @php $i = 1 @endphp
     @foreach($contactus as $message)
      <tr>
        <td>{{$i}}</td>
        <td>{{$message->firstname}} {{$message->lastname ?? ''}}</td>
        <td>{{$message->phone}}</td>
        <td>{{$message->email}}</td>
        <td>{{$message->message}}</td>
        <td>{{$message->created_at->diffForHumans()}}</td>
      </tr>
      @php $i++ @endphp
     @endforeach
    </tbody>
  </table>
</div>

@endsection