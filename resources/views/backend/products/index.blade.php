@extends('backend.layout')

@section('content')
<div class="container" style="overflow-x:auto">
  @if(Session::has('success'))
  <p class="alert alert-info">{{ Session::get('success') }}</p>
  @endif
  <div class="row">
    <div class="col-md-8">
      <h2>Products</h2>
    </div>
    <div class="col-md-4">
      <a href="{{route('products.create')}}" class="btn btn-primary">create</a>
    </div>
  </div>
  
  <table class="table table-striped" id="myTable">
    <thead>
      <tr>
        <th>Sr No</th>
        <th>Categoy</th>
        <th>Sub Category</th>
        <th>Title</th>
        <th>Orig Price</th>
        <th>Disc Price</th>
        {{-- <th>size</th> --}}
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @php $i = 1 @endphp
      @forelse($products as $product)
      <tr>
        <td>{{$i}}</td>
        <td>{{$product->subcategory->category->title ??"Null"}}</td>
        <td>{{$product->subcategory->title ??"Null"}}</td>
        <td>{{$product->title}}</td>
        <td>{{$product->strike_price}}</td>
        <td>{{$product->discount_price}}</td>
        {{-- <td>@foreach($product->clothSize(explode(',',$product->clothsize_id)) as $size)<p> {{$size}}</p> @endforeach</td> --}}
        <td>
          <form action="{{route('products.destroy',[$product->id])}}" method="post" id="delete-form" >
            @csrf
            @method('DELETE')
          <a href="{{route('allproducts.show',[$product->slug])}}" target="_blank"><i class="btn btn-light fas fa-eye" style="color: #644141;"></i></a>
          <a href="{{route('products.edit',[$product->id])}}"><i class="btn btn-light fas fa-edit" style="color: #644141;"></i></a>
          <span onclick="return confirmation();"><button class="btn btn-light" type="submit"><svg style="color:#000" xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" viewBox="0 0 256 256"><path fill="currentColor" d="M216 48h-40v-8a24 24 0 0 0-24-24h-48a24 24 0 0 0-24 24v8H40a8 8 0 0 0 0 16h8v144a16 16 0 0 0 16 16h128a16 16 0 0 0 16-16V64h8a8 8 0 0 0 0-16M96 40a8 8 0 0 1 8-8h48a8 8 0 0 1 8 8v8H96Zm96 168H64V64h128Zm-80-104v64a8 8 0 0 1-16 0v-64a8 8 0 0 1 16 0m48 0v64a8 8 0 0 1-16 0v-64a8 8 0 0 1 16 0"/></svg></button></span>
          
          </form>
        </td>
      </tr>
      @php $i++ @endphp
      @empty
      @endforelse
      
    </tbody>
  </table>
</div>



@endsection