@extends('backend.layout')

@section('content')
<div class="container">
  @if(Session::has('success'))
  <p class="alert alert-info">{{ Session::get('success') }}</p>
  @endif
  <div class="row">
    <div class="col-md-8">
      <h2>Coupon</h2>
    </div>
    <div class="col-md-4">
      <a href="{{route('coupon.create')}}" class="btn btn-primary">create</a>
    </div>
    
  </div>
  
  <table class="table table-striped" id="myTable">
    <thead>
      <tr>
        <th>Sr no</th>
        
        <th>Code</th>
        <th>Percentage</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @php $i = 1 @endphp
      @foreach($coupon as $coupon)
      <tr>
        <td>{{$i}}</td>
        
        <td>{{$coupon->title}}</td>
        <td>{{number_format($coupon->percentage)}} %</td>
        <td>
          <form action="{{route('coupon.destroy',[$coupon->id])}}" method="post" id="delete-form" >
            @csrf
            @method('DELETE')
          <a href="{{route('coupon.edit',[$coupon->id])}}"><svg style="color:#000;margin-right:15px" xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 21h16M5.666 13.187A2.278 2.278 0 0 0 5 14.797V18h3.223c.604 0 1.183-.24 1.61-.668l9.5-9.505a2.278 2.278 0 0 0 0-3.22l-.938-.94a2.277 2.277 0 0 0-3.222.001z"/></svg></a>
          <span onclick="return confirmation();"><button type="submit"><svg style="color:#000" xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" viewBox="0 0 256 256"><path fill="currentColor" d="M216 48h-40v-8a24 24 0 0 0-24-24h-48a24 24 0 0 0-24 24v8H40a8 8 0 0 0 0 16h8v144a16 16 0 0 0 16 16h128a16 16 0 0 0 16-16V64h8a8 8 0 0 0 0-16M96 40a8 8 0 0 1 8-8h48a8 8 0 0 1 8 8v8H96Zm96 168H64V64h128Zm-80-104v64a8 8 0 0 1-16 0v-64a8 8 0 0 1 16 0m48 0v64a8 8 0 0 1-16 0v-64a8 8 0 0 1 16 0"/></svg></button></span>
          
          </form>
            
        </td>
      </tr>
      @php $i++ @endphp
      @endforeach
    </tbody>
  </table>
</div>

@endsection