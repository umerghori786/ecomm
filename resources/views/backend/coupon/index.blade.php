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
  
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Sr no</th>
        <th>Name</th>
        <th>Title</th>
        <th>Percentage</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @php $i = 1 @endphp
      @foreach($coupon as $coupon)
      <tr>
        <td>{{$i}}</td>
        <td>{{$coupon->user->name}}</td>
        <td>{{$coupon->title}}</td>
        <td>{{$coupon->percentage}}</td>
        <td>
            <a href="{{route('coupon.edit',[$coupon->id])}}"><i class="fas fa-edit" style="color: #644141;"></i></a>
        </td>
      </tr>
      @php $i++ @endphp
      @endforeach
    </tbody>
  </table>
</div>

@endsection