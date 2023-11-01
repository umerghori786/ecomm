@extends('backend.layout')

@section('content')
<div class="container">
  @if(Session::has('success'))
  <p class="alert alert-info">{{ Session::get('success') }}</p>
  @endif
  <div class="row">
    <div class="col-md-8">
      <h2>Privacy Policy</h2>
    </div>
    @if(is_null($privacy))
    <div class="col-md-4">
      <a href="{{route('privacy.create')}}" class="btn btn-primary">create</a>
    </div>
    @endif
  </div>
  
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Sr no</th>
        <th>Name</th>
        <th>Privacy Policy</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @php $i = 1 @endphp
      @if(isset($privacy))
      <tr>
        <td>{{$i}}</td>
        <td>{{$privacy->user->name}}</td>
        <td>{{$privacy->privacy}}</td>
        <td>
        <a href="{{route('privacy.edit',[$privacy->id])}}"><i class="fas fa-edit" style="color: #644141;"></i></a>
        </td>
      </tr>
      @endif
    </tbody>
  </table>
</div>

@endsection