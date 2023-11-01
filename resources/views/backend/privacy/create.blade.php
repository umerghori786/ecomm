@extends('backend.layout')

@section('content')

                    <div class="row container">
                        <div class="col-md-9">
                            <h4 class="page-title d-inline">@lang('Create Privacy Policy')</h4>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('privacy.index') }}"
                               class="btn btn-primary">@lang('View Privacy')</a>
                        </div>
                        
                    </div>
                    <div class="mt-5">
                   
                        {!! Form::open(['method' => 'POST', 'route' => ['privacy.store'], 'files' => true,]) !!}

                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-6 form-group">
                            <label for="myfile">Privacy Policy</label><br>
                            <textarea class="editor" rows="4" cols="50" name="privacy"></textarea>

                            </div>

                        </div>
                        <div class="row justify-content-center">    
                            
                            <!-- <div class="col-12 col-lg-6 form-group text-center mt-3">
                                {!! Form::checkbox('status', 1, 'checked', []) !!}
                                 {!! Form::label('status',  trans('status'), ['class' => 'checkbox control-label font-weight-bold']) !!} -->
                                <!-- {!! Form::select('category_id', $categories, old('category_id'), ['class' => 'form-control ', 'required' => true]) !!} -->

                    
                            <!-- </div> -->
                        </div>
                        <div class="row justify-content-center">    
                            
                            <div class="col-12 col-lg-6 form-group text-center mt-3">

                                {!! Form::submit(trans('create'), ['class' => 'btn mt-auto  btn-danger']) !!}
                            </div>
                        </div>
                        <!-- </form> -->
                        {!! Form::close() !!}
                    </div>

                    


               
@endsection

