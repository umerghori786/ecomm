@extends('backend.layout')

@section('content')
<div class="container">
  @if(Session::has('success'))
  <p class="alert alert-info">{{ Session::get('success') }}</p>
  @endif
  <div class="row">
    <div class="col-md-8">
      <h2>Slider</h2>
    </div>
    <div class="col-md-4">
      <a href="{{route('slider.create')}}" class="btn btn-primary">create</a>
    </div>
  </div>
  
  <table class="table table-striped" id="myTable">
    <thead>
      <tr>
        <th>Sr no</th>
        
        <th>Slider Title One</th>
        <th>Slider Title Two</th>
        <th>Button Title</th>
        <th>Button URL</th>
        <th>Slider Image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @php $i = 1 @endphp
      @foreach($slider as $slider)
      <tr>
        <td>{{$i}}</td>
        
        <td>{{$slider->des}}</td>
        <td>{{$slider->title_two}}</td>
        <td>{{$slider->title}}</td>
        <td>{{$slider->url}}</td>
        <td>
            @if(isset($slider))
        <img src="{{url('slider/'.($slider->image))}}" width="100px" height="100px" alt=""/>
        @endif
            </td>
        <td>
        <form action="{{ route('slider.destroy', $slider->id) }}" method="POST">
                        @csrf
        <a href="{{route('slider.edit',[$slider->id])}}"><svg style="color:#000;margin-right:15px" xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 21h16M5.666 13.187A2.278 2.278 0 0 0 5 14.797V18h3.223c.604 0 1.183-.24 1.61-.668l9.5-9.505a2.278 2.278 0 0 0 0-3.22l-.938-.94a2.277 2.277 0 0 0-3.222.001z"/></svg></a>
        
        @method('DELETE')
        <button type="submit"> <i class="fa fa-trash" style="color:#644141;"></i></button>
          </form>
        </td>
        
      </tr>
      @php $i++ @endphp
      @endforeach
      
      
      
    </tbody>
  </table>
</div>

@endsection