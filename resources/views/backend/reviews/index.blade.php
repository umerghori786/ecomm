@extends('backend.layout')

@section('content')
<div class="container">
  @if(Session::has('success'))
  <p class="alert alert-info">{{ Session::get('success') }}</p>
  @endif
  <div class="row">
    <div class="col-md-8">
      <h2>Products Reviews</h2>
    </div>
    <div class="col-md-4">
      {{-- <a href="{{route('subcategories.create')}}" class="btn btn-primary">create</a> --}}
    </div>
  </div>
  
  <table class="table table-striped" id="myTable">
    <thead>
      <tr>
        <th>Sr No</th>
        <th>Product</th>
        <th>Name</th>
        <th>Email</th>
        <th>Review</th>
        <th>Admin Reply</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @php $i = 1 @endphp
      @forelse($reviews as $review)
      <tr>
        <td>{{$i}}</td>
        <td>{{$review->reviewable->title}}</td>
        <td>{{$review->name}}</td>
        <td>
          {{$review->email}}
        </td>
        <td>{{$review->content}}</td>
        <td>@if(count($review->replys) == 0) <p class="alert">No</p> @else <div class="spinner-grow spinner-grow-sm" style="margin-left: 6px; margin-bottom: 2px; color: #2e6da5 !important"></div> @endif</td>
        <td>
          <form action="{{route('reviews.destroy',[$review->id])}}" method="post" id="delete-form" >
            @csrf
            @method('DELETE')
          <a href="{{route('allproducts.show',[$review->reviewable->slug])}}" target="_blank"><i class="fas fa-eye" style="color: #644141;"></i></a>
          <span onclick="return confirmation();"><button type="submit"><i class="fa fa-trash" style="color:#644141;" ></i></button></span>
          
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