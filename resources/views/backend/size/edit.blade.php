@extends('backend.layout')

@section('content')

                    <div class="row container">
                        <div class="col-md-9">
                            <h4 class="page-title d-inline">@lang('Edit Size')</h4>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('sizes.index') }}"
                               class="btn btn-primary">@lang('View Sizes')</a>
                        </div>
                        
                    </div>
                    <div class="mt-5">
                        {!! Form::model($color, ['method' => 'PUT', 'route' => ['sizes.update', $color->id], 'files' => true,]) !!}

                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-6 form-group">
                                {!! Form::label('title', 'Title'.' *', ['class' => 'control-label']) !!}
                                {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'title', 'required' => true]) !!}

                            </div>

                        </div>
                        
                        <div class="row justify-content-center">    
                            
                            <div class="col-12 col-lg-6 form-group text-center mt-3">
                                {!! Form::checkbox('status', 1 ,old('published'), []) !!}
                                {!! Form::label('status',  trans('status'), ['class' => 'checkbox control-label font-weight-bold']) !!}
                                
                            </div>
                        </div>
                        <div class="row justify-content-center">    
                            
                            <div class="col-12 col-lg-6 form-group text-center mt-3">

                                {!! Form::submit(trans('update'), ['class' => 'btn mt-auto  btn-danger']) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>

                    


               
@endsection

