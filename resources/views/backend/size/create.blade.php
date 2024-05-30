@extends('backend.layout')

@section('content')

                    <div class="row container">
                        <div class="col-md-9">
                            <h4 class="page-title d-inline">@lang('Create Size')</h4>
                            <p>here you can add sizes of your products(shoes , cloths etc)</p>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('sizes.index') }}"
                               class="btn btn-primary">@lang('View Sizes')</a>
                        </div>
                        
                    </div>
                    <div class="mt-5">
                        {!! Form::open(['method' => 'POST', 'route' => ['sizes.store'], 'files' => true,]) !!}

                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-6 form-group">
                                {!! Form::label('title', 'Title'.' *', ['class' => 'control-label']) !!}
                                {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'eg 10 or XL', 'required' => true]) !!}
                            </div>
                        </div>
                        
                        <div class="row justify-content-center">    
                            
                            <div class="col-12 col-lg-6 form-group text-center mt-3">
                                {!! Form::checkbox('status', 1, 'checked', []) !!}
                                {!! Form::label('status',  trans('status'), ['class' => 'checkbox control-label font-weight-bold']) !!}
                                
                            </div>
                        </div>
                        <div class="row justify-content-center">    
                            
                            <div class="col-12 col-lg-6 form-group text-center mt-3">

                                {!! Form::submit(trans('create'), ['class' => 'btn mt-auto  btn-danger']) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>

                    


               
@endsection

