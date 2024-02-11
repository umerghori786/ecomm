@extends('backend.layout')

@section('content')

                    <div class="row container">
                        <div class="col-md-9">
                            <h4 class="page-title d-inline">@lang('Update Slider')</h4>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('slider.index') }}"
                               class="btn btn-primary">@lang('View Slider')</a>
                        </div>
                        
                    </div>
                    <div class="mt-5">
                    {!! Form::model($slider, ['method' => 'PUT', 'route' => ['slider.update', $slider->id], 'files' => true,]) !!}

                        <div class="row justify-content-center">
                            <div class="col-6 col-lg-6 form-group">
                                <label for="exampleTextarea">Slider Tilte One (not required)</label>
                                {!! Form::text('des', old('des'), ['class' => 'form-control', 'placeholder' => 'title']) !!}
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-6 col-lg-6 form-group">
                                <label for="exampleTextarea">Slider Tilte Two (not required)</label>
                                {!! Form::text('title_two', old('title_two'), ['class' => 'form-control', 'placeholder' => 'title two']) !!}
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-6 col-lg-6 form-group">
                                {!! Form::label('Slider Button Title', 'Slider Button Title'.' *', ['class' => 'control-label']) !!}
                                {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'Button Title', 'required' => true]) !!}
                            </div>
                            
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-6 col-lg-6 form-group">
                                {!! Form::label('Slider Button URL',  trans('Slider Button URL'), ['class' => 'control-label']) !!}
                                {!! Form::text('url', old('url'), ['class' => 'form-control', 'placeholder' => 'Button URL', 'required' => true]) !!}
                        </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-6 form-group">
                            <label for="myfile">Slider Image:</label>
                            <input type="file" id="image" name="image" />
                            <img src="{{url('slider/'.$slider->image)}}" width="100px" height="100px" alt="">

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

