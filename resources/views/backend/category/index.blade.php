@extends('backend.layout')

@section('content')
<div class="container">
  @if(Session::has('success'))
  <p class="alert alert-info">{{ Session::get('success') }}</p>
  @endif
  <div class="row">
    <div class="col-md-8">
      <h2>Categroy</h2>
    </div>
    <div class="col-md-4">
      <a href="{{route('categories.create')}}" class="btn btn-primary">create</a>
    </div>
  </div>
  
  <table class="table table-striped" id="myTable">
    <thead>
      <tr>
        <th>Sr no</th>
        <th>Title</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @php $i = 1 @endphp
      @forelse($categories as $category)
      <tr>
        <td>{{$i}}</td>
        <td>{{$category->title}}</td>
        
        <td>@if($category->status == 1) Active @else InActive @endif</td>
        <td>
          <a href="{{route('categories.edit',[$category->id])}}"><i class="fas fa-edit" style="color: #644141;"></i></a>
        </td>
      </tr>
      @php $i++ @endphp
      @empty
      @endforelse
      
    </tbody>
  </table>
</div>

@endsection