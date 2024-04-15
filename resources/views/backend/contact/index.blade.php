@extends('backend.layout')

@section('content')
<div class="container">
  @if(Session::has('success'))
  <p class="alert alert-info">{{ Session::get('success') }}</p>
  @endif
  <div class="row">
    <div class="col-md-8">
      <h2>Address</h2>
    </div>
    @if(count($contact) == 0)
    <div class="col-md-4">
      <a href="{{route('contact.create')}}" class="btn btn-primary">create</a>
    </div>
    @endif
  </div>
  
  <table class="table table-striped" id="myTable">
    <thead>
      <tr>
        <th>Sr no</th>
        <th>Phone No</th>
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
        <td>{{$contact->contact}}</td>
        <td>{{$contact->email}}</td>
        <td>{{$contact->location}}</td>
       <td> {{$contact->facebook}}
        {{$contact->x}}
        {{$contact->skype}}
        {{$contact->youtube}}</td>
        <td>
            <a href="{{route('contact.edit',[$contact->id])}}"><svg style="color:#000;margin-right:15px" xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 21h16M5.666 13.187A2.278 2.278 0 0 0 5 14.797V18h3.223c.604 0 1.183-.24 1.61-.668l9.5-9.505a2.278 2.278 0 0 0 0-3.22l-.938-.94a2.277 2.277 0 0 0-3.222.001z"/></svg></a>
        </td>
      </tr>
      @php $i++ @endphp
      @endif
      @endforeach
    </tbody>
  </table>
</div>

@endsection