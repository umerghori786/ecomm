@extends('backend.layout')

@section('content')

                    <div class="row container">
                        @if($errors->any())
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                        @endif
                        <div class="col-md-9">
                            <h4 class="page-title d-inline">@lang('Create Sub Category')</h4>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('subcategories.index') }}"
                               class="btn btn-primary">@lang('View Sub Categories')</a>
                        </div>
                        
                    </div>
                    <div class="mt-5">
                        {!! Form::open(['method' => 'POST', 'route' => ['subcategories.store'], 'files' => true,]) !!}
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-6 form-group">
                            {!! Form::label('category_id',trans('Category'), ['class' => 'control-label']) !!}
                            {!! Form::select('category_id', $categories, old('category_id'), ['class' => 'form-control ', 'required' => true]) !!}
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-6 form-group">
                                {!! Form::label('title', 'Title'.' *', ['class' => 'control-label']) !!}
                                {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'title', 'required' => true]) !!}

                            </div>
                            <div class="row justify-content-center">
                            <div class="col-12 col-lg-6 form-group">
                            <label for="myfile">Select a file:</label>
                            <input type="file" id="image" name="image" required/>
                            </div>

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

