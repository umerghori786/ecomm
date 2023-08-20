@extends('backend.layout')

@section('content')
<div class="container">
  @if(Session::has('success'))
  <p class="alert alert-info">{{ Session::get('success') }}</p>
  @endif
  <div class="row">
    <div class="col-md-8">
      <h2>Sub Categroy</h2>
    </div>
    <div class="col-md-4">
      <a href="{{route('subcategories.create')}}" class="btn btn-primary">create</a>
    </div>
  </div>
  
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Sr No</th>
        <th>Category</th>
        <th>Title</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @php $i = 1 @endphp
      @forelse($sub_categories as $sub_category)
      <tr>
        <td>{{$i}}</td>
        <td>{{$sub_category->category->title}}</td>
        <td>{{$sub_category->title}}</td>
        <td>@if($sub_category->status == 1) Active @else InActive @endif</td>
        <td>
          <a href="{{route('subcategories.edit',[$sub_category->id])}}"><i class="fas fa-edit" style="color: #644141;"></i></a>
        </td>
      </tr>
      @php $i++ @endphp
      @empty
      @endforelse
      
    </tbody>
  </table>
</div>

@endsection