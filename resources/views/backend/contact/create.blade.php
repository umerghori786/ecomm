@extends('backend.layout')

@section('content')

                    <div class="row container">
                        <div class="col-md-9">
                            <h4 class="page-title d-inline">@lang('Create Contact Us')</h4>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('contact.index') }}"
                               class="btn btn-primary">@lang('View Contact')</a>
                        </div>
                        
                    </div>
                    <div class="mt-5">
                        {!! Form::open(['method' => 'POST', 'route' => ['contact.store'], 'files' => true,]) !!}
                       
                        <div class="row justify-content-center container">
                            <div class="col-12 col-lg-12 form-group">
                                {!! Form::label('contact', 'Contact Us'.' *', ['class' => 'control-label']) !!}
                                {!! Form::text('contact', old('number'), ['class' => 'form-control', 'placeholder' => 'Contact Us', 'required' => true]) !!}
                                @error('contact')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            

                        </div>
                        <div class="row justify-content-center container">
                            <div class="col-12 col-lg-12 form-group">
                                {!! Form::label('email',  trans('Email'), ['class' => 'control-label']) !!}
                                {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Email Address', 'required' => true]) !!}
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row justify-content-center container">
                            <div class="col-12 col-lg-12 form-group">
                                {!! Form::label('Location',  trans('Location'), ['class' => 'control-label']) !!}
                                {!! Form::text('location', old('location'), ['class' => 'form-control', 'placeholder' => 'Office location', 'required' => true]) !!}
                                @error('location')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row justify-content-center container">    
                            <div class="col-12 col-lg-6 form-group">
                                {!! Form::label('facebook',  trans('Facebook'), ['class' => 'control-label']) !!}
                                {!! Form::text('facebook', old('facebook'), ['class' => 'form-control', 'placeholder' => 'Facebook', 'required' => true]) !!}
                                @error('facebook')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-6 form-group">
                                {!! Form::label('X',  trans('x'), ['class' => 'control-label']) !!}
                                {!! Form::text('x', old('x'), ['class' => 'form-control', 'placeholder' => 'X', 'required' => true]) !!}
                                @error('x')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-6 form-group">
                                {!! Form::label('skype',  trans('skype'), ['class' => 'control-label']) !!}
                                {!! Form::text('skype', old('skype'), ['class' => 'form-control', 'placeholder' => 'skype', 'required' => true]) !!}
                                @error('skype')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-6 form-group">
                                {!! Form::label('Youtube',  trans('Youtube'), ['class' => 'control-label']) !!}
                                {!! Form::text('youtube', old('youtube'), ['class' => 'form-control', 'placeholder' => 'youtube', 'required' => true]) !!}
                                @error('youtube')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row justify-content-center mb-5">    
                            
                            <div class="col-12 col-lg-6 form-group text-center mt-3">

                                {!! Form::submit(trans('create'), ['class' => 'btn mt-auto  btn-danger']) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>

                    


               
@endsection

