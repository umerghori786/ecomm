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
  
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Sr no</th>
        <th>Name</th>
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
        <td>{{$ques->user->name}}</td>
        <td>{{$ques->question}}</td>
        <td>{{$ques->answer}}</td>
      
        <td>
          <a href="{{route('question.edit',[$ques->id])}}"><i class="fas fa-edit" style="color: #644141;"></i></a>
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