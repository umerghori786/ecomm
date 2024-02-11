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
        
        <th>Slider Title</th>
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
        <a href="{{route('slider.edit',[$slider->id])}}"><i class="fas fa-edit" style="color: #644141;"></i></a>
        
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