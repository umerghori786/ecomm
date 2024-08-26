@extends('backend.layout')

@section('content')
<div class="container">
  @if(Session::has('success'))
  <p class="alert alert-info">{{ Session::get('success') }}</p>
  @endif
  <div class="row">
    <div class="col-md-8">
      <h2>Frequently Asked Questions</h2>
    </div>
    <div class="col-md-4">
      <a href="{{route('question.create')}}" class="btn btn-primary">create</a>
    </div>
    
  </div>
  
  <table class="table table-striped" id="myTable">
    <thead>
      <tr>
        <th>Sr no</th>
        <th>Quetion</th>
        <th>Answer</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @php $i = 1 @endphp
      @foreach($ques as $ques)
      <tr>
        <td>{{$i}}</td>
        <td>{{$ques->question}}</td>
        <td>{{$ques->answer}}</td>
      
        <td>
          <a href="{{route('question.edit',[$ques->id])}}"><svg style="color:#000;margin-right:15px" xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 21h16M5.666 13.187A2.278 2.278 0 0 0 5 14.797V18h3.223c.604 0 1.183-.24 1.61-.668l9.5-9.505a2.278 2.278 0 0 0 0-3.22l-.938-.94a2.277 2.277 0 0 0-3.222.001z"/></svg></a>
          <form action="{{ route('question.destroy', $ques->id) }}" method="POST">
                        @csrf
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