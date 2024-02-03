@extends('backend.layout')

@section('content')
<div class="container">
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
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @php $i = 1 @endphp
      @forelse($products as $product)
      <tr>
        <td>{{$i}}</td>
        <td>{{$product->subcategory->category->title ??"Null"}}</td>
        <td>{{$product->subcategory->title}}</td>
        <td>{{$product->title}}</td>
        <td>{{$product->strike_price}}</td>
        <td>{{$product->discount_price}}</td>
        <td>
          <form action="{{route('products.destroy',[$product->id])}}" method="post" id="delete-form" >
            @csrf
            @method('DELETE')
          <a href="{{route('products.edit',[$product->id])}}"><i class="fas fa-edit" style="color: #644141;"></i></a>
          <span onclick="return confirmation();"><button type="submit"><i class="fa fa-trash" style="color:#644141;" ></i></button></span>
          <a href="{{route('images.index',['product_id'=>$product->id])}}"><i class="fas fa-image" style="color: #644141;"></i></a>
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