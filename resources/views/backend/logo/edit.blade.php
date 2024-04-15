@extends('backend.layout')

@section('content')

                    <div class="row container">
                        <div class="col-md-9">
                            <h4 class="page-title d-inline">@lang('Edit Logo')</h4>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('logos.index') }}"
                               class="btn btn-primary">@lang('View logo')</a>
                        </div>
                        
                    </div>
                    <div class="mt-5">
                   
                        {!! Form::model($logo, ['method' => 'PUT', 'route' => ['logos.update',$logo->id], 'files' => true,]) !!}

                        <div class="row justify-content-center">
                             <div class="col-12 col-lg-6 form-group">
                            <label for="myfile">Select a file:</label>
                            <input type="file" value=""id="image" name="image" required/>
                            <img src="{{url('logo/'.$logo->image)}}" width="100px" alt="">
                            </div>


                        </div>
                        <!-- <div class="row justify-content-center">    
                            
                            <div class="col-12 col-lg-6 form-group text-center mt-3">
                                {!! Form::checkbox('status', 1 ,old('published'), []) !!}
                                {!! Form::label('status',  trans('status'), ['class' => 'checkbox control-label font-weight-bold']) !!}
                                
                            </div>
                        </div> -->
                        <div class="row justify-content-center">    
                            
                            <div class="col-12 col-lg-6 form-group text-center mt-3">

                                {!! Form::submit(trans('update'), ['class' => 'btn mt-auto  btn-danger']) !!}
                            </div>
                        </div>
                        <!-- </form> -->
                        {!! Form::close() !!}
                    </div>

                    


               
@endsection

