@extends('backend.layout')

@section('content')
<div class="container">
  @if(Session::has('success'))
  <p class="alert alert-info">{{ Session::get('success') }}</p>
  @endif
  <div class="row">
    <div class="col-md-8">
      <h2>Contact Us</h2>
    </div>
    <div class="col-md-4">
      <a href="{{route('contact.create')}}" class="btn btn-primary">create</a>
    </div>
  </div>
  
  <table class="table table-striped" id="myTable">
    <thead>
      <tr>
        <th>Sr no</th>
        <th>Name</th>
        <th>Countact Us</th>
        <th>Email</th>
        <th>Office Location</th>
        <th>Soical Media Occount</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @php $i = 1 @endphp
      @foreach($contact as $contact)
      @if(isset($contact))
      <tr>
        <td>{{$i}}</td>
        <td>{{$contact->user->name}}</td>
        <td>{{$contact->contact}}</td>
        <td>{{$contact->email}}</td>
        <td>{{$contact->location}}</td>
       <td> {{$contact->facebook}}
        {{$contact->x}}
        {{$contact->skype}}
        {{$contact->youtube}}</td>
        <td>
            <a href="{{route('contact.edit',[$contact->id])}}"><i class="fas fa-edit" style="color: #644141;"></i></a>
        </td>
      </tr>
      @php $i++ @endphp
      @endif
      @endforeach
    </tbody>
  </table>
</div>

@endsection