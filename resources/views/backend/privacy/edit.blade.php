@extends('backend.layout')

@section('content')

                    <div class="row container">
                        <div class="col-md-9">
                            <h4 class="page-title d-inline">@lang('Edit Privacy')</h4>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('privacy.index') }}"
                               class="btn btn-primary">@lang('View privacy')</a>
                        </div>
                        
                    </div>
                    <div class="mt-5">
                   
                        {!! Form::model($privacy ,['method' => 'PUT', 'route' => ['privacy.update',$privacy->id], 'files' => true,]) !!}

                        <div class="row justify-content-center">
                        <div class="col-12 col-lg-6 form-group">
                        <label for="myfile">Privacy Policy</label><br>
                            {!! Form::textarea('privacy', old('privacy'), ['class' => 'form-control editor','placeholder'=>"write here" ,'id'=>"summernote"]) !!}
                            </div>

                        </div>
                        
                        <div class="row justify-content-center">    
                            
                            <div class="col-12 col-lg-6 form-group text-center mt-3">

                                {!! Form::submit(trans('update'), ['class' => 'btn mt-auto  btn-danger']) !!}
                            </div>
                        </div>
                        <!-- </form> -->
                        {!! Form::close() !!}
                    </div>

                    


               
@endsection

