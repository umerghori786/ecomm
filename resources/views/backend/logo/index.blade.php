@extends('backend.layout')

@section('content')
<div class="container">
  @if(Session::has('success'))
  <p class="alert alert-info">{{ Session::get('success') }}</p>
  @endif
  <div class="row">
    <div class="col-md-8">
      <h2>Logo</h2>
    </div>
    @if(is_null($logo))
    <div class="col-md-4">
      <a href="{{route('logos.create')}}" class="btn btn-primary">create</a>
    </div>
    @endif
  </div>
  
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Sr no</th>
        <th>Name</th>
        <th>Logo</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @php $i = 1 @endphp
      @if(isset($logo))
      <tr>
        <td>{{$i}}</td>
        <td>{{$logo->user->name}}</td>
        <td>
        <img src="{{url('logo/'.$logo->image)}}" width="100px" height="100px" alt="">
        </td>
        <td>
          <a href="{{route('logos.edit',[$logo->id])}}"><i class="fas fa-edit" style="color: #644141;"></i></a>
        </td>
        
      </tr>
      @endif
    </tbody>
  </table>
</div>

@endsection