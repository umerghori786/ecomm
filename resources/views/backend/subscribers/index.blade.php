@extends('backend.layout')

@section('content')
<div class="container">
  @if(Session::has('success'))
  <p class="alert alert-info">{{ Session::get('success') }}</p>
  @endif
  <div class="row">
    <div class="col-md-8">
      <h2>Subscribers</h2>
    </div>
    <div class="col-md-4">
      {{-- <a href="{{route('subcategories.create')}}" class="btn btn-primary">create</a> --}}
    </div>
  </div>
  
  <table class="table table-striped" id="myTable">
    <thead>
      <tr>
        <th>No</th>
        <th>Email</th>
        <th>Created at</th>
      </tr>
    </thead>
    <tbody>
      @php $i = 1 @endphp
      @forelse($subscribers as $subscriber)
      <tr>
        <td>{{$i}}</td>
        <td>{{$subscriber->email}}</td>
        <td>{{$subscriber->created_at->toDateString()}}</td>
       
      </tr>
      @php $i++ @endphp
      @empty
      @endforelse
      
      
    </tbody>
  </table>
</div>

@endsection