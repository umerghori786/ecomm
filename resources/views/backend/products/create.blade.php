@extends('backend.layout')

@section('content')

                    <div class="row container">
                        @if($errors->any())
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                        @endif
                        <div class="col-md-9">
                            <h4 class="page-title d-inline">@lang('Create Product')</h4>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('products.index') }}"
                               class="btn btn-primary">@lang('View Products')</a>
                        </div>
                        
                    </div>
                    <div class="mt-5">
                        {!! Form::open(['method' => 'POST', 'route' => ['products.store'], 'files' => true,]) !!}
                        <div class="row justify-content-center container">
                            <div class="col-6 col-lg-6 form-group">
                            {!! Form::label('category_id',trans('Category'), ['class' => 'control-label']) !!}
                            {!! Form::select('category_id', $categories, old('category_id'), ['class' => 'form-control ', 'required' => true]) !!}
                            </div>
                            <div class="col-6 col-lg-6 form-group">
                            {!! Form::label('sub_category_id',trans('Sub Category'), ['class' => 'control-label']) !!}
                            {!! Form::select('sub_category_id', $subcategories, old('sub_category_id'), ['class' => 'form-control ', 'required' => true]) !!}
                            </div>
                            
                        </div>
                        <div class="row justify-content-center container">
                            <div class="col-12 col-lg-12 form-group">
                                {!! Form::label('title', 'Title'.' *', ['class' => 'control-label']) !!}
                                {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'title', 'required' => true]) !!}

                            </div>
                            

                        </div>
                        <div class="row justify-content-center container">
                            <div class="col-12 col-lg-12 form-group">
                                {!! Form::label('short description',  trans('short description'), ['class' => 'control-label']) !!}
                                {!! Form::textarea('short_description', old('short_description'), ['class' => 'form-control editor', 'placeholder' => trans('short description')]) !!}

                            </div>
                        </div>
                        <div class="row justify-content-center container">
                            <div class="col-12 col-lg-12 form-group">
                                {!! Form::label('Long description',  trans('Long description'), ['class' => 'control-label']) !!}
                                {!! Form::textarea('long_description', old('long_description'), ['class' => 'form-control editor','placeholder'=>"write here" ,'id'=>"summernote"]) !!}

                            </div>
                        </div>
                        
                        <div class="row justify-content-center container">    
                            <div class="col-12 col-lg-6 form-group">
                                {!! Form::label('strike price',  trans('strike price'), ['class' => 'control-label']) !!}
                                {!! Form::number('strike_price', old('strike_price'), ['class' => 'form-control', 'placeholder' => trans(''),'step' => 'any', 'pattern' => "[0-9]"]) !!}
                            </div>
                            <div class="col-12 col-lg-6 form-group">
                                {!! Form::label('discounted price',  trans('discounted price'), ['class' => 'control-label']) !!}
                                {!! Form::number('discount_price', old('discount_price'), ['class' => 'form-control', 'placeholder' => trans(''),'step' => 'any', 'pattern' => "[0-9]"]) !!}
                            </div>
                        </div>
                        <div class="row justify-content-center container">    
                            
                            <div class="col-4 col-lg-4 form-group text-center mt-3">
                                {!! Form::checkbox('trending', 1, 'checked', []) !!}
                                {!! Form::label('trending',  trans('trending'), ['class' => 'checkbox control-label font-weight-bold']) !!}
                                
                            </div>
                            <div class="col-4 col-lg-4 form-group text-center mt-3">
                                {!! Form::checkbox('popular', 1,'checked', []) !!}
                                {!! Form::label('popular',  trans('popular'), ['class' => 'checkbox control-label font-weight-bold']) !!}
                                
                            </div>
                            
                        </div>
                        <div class="row justify-content-center container">    
                            
                            
                        </div>
                        <div class="row justify-content-center mb-5">    
                            
                            <div class="col-12 col-lg-6 form-group text-center mt-3">

                                {!! Form::submit(trans('create'), ['class' => 'btn mt-auto  btn-danger']) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>

                    


               
@endsection

