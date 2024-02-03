@extends('backend.layout')

@section('content')
<div class="container">
  @if(Session::has('success'))
  <p class="alert alert-info">{{ Session::get('success') }}</p>
  @endif
  <div class="row">
    <div class="col-md-8">
      <h2>Orders</h2>
    </div>
    <div class="col-md-4">
      {{-- <a href="{{route('subcategories.create')}}" class="btn btn-primary">create</a> --}}
    </div>
  </div>
  
  <table class="table table-striped" id="myTable">
    <thead>
      <tr>
        <th>Order No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Order Total</th>
        <th>Status</th>
        <th>Created at</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @php $i = 1 @endphp
      @forelse($orders as $order)
      <tr>
        <td>Order CZ-{{$i}}</td>
        <td>{{$order->first_name.' '.$order->last_name}}</td>
        <td>{{$order->email}}</td>
        <td>
          {{$order->grand_total}}
        </td>
        <td>
          @if($order->status == 0) 
          <p class="alert alert-danger">Pending</p> 
          @else 
          <p class="alert alert-info">Complete</p> 
          @endif
         </td>
        
        <td>
          {{$order->created_at->toDateString()}}
        </td>
        <td>

          <a href="{{route('order.show',[$order->id])}}"  class="btn btn-success" target="_blank">show order</a>
          
          @if($order->status == 0)
          <a href="{{route('order.edit',[$order->id])}}" onclick="return confirmation();" class="btn btn-primary">complete order</a>
          @endif
        </td>
      </tr>
      @php $i++ @endphp
      @empty
      @endforelse
      
      
    </tbody>
  </table>
</div>

@endsection