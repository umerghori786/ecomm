@extends('backend.layout')

@section('content')

                    <div class="row container">
                        <div class="col-md-9">
                            <h4 class="page-title d-inline">@lang('Create Asked Question')</h4>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('question.index') }}"
                               class="btn btn-primary">@lang('View Question')</a>
                        </div>
                        
                    </div>
                    <div class="mt-5">
                    {!! Form::model($ques, ['method' => 'PUT', 'route' => ['question.update',$ques->id], 'files' => true,]) !!}

                        <div class="row justify-content-center">
                        <div class="col-12 col-md-6 form-group">
                               <label for="exampleTextarea">Question</label>
                               <input type="text" name="question" class="form-control" placeholder="Enter text">

                            </div>
                        </div>

                        <div class="row justify-content-center container">
                            <div class="col-6 col-md-6 form-group">
                                <label for="exampleTextarea">Answer</label>
                                <textarea class="form-control" name="answer" id="exampleTextarea" rows="4" placeholder="Enter your text here"></textarea>
                            </div>
                        </div>
                        <div class="row justify-content-center">    

                            <div class="col-12 col-lg-6 form-group text-center mt-3">

                                {!! Form::submit(trans('Update'), ['class' => 'btn mt-auto  btn-danger']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    @endsection


