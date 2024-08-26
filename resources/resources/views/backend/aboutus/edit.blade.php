@extends('backend.layout')

@section('content')

                    <div class="row container">
                        <div class="col-md-9">
                            <h4 class="page-title d-inline">@lang('Edit About Us')</h4>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('aboutus.index') }}"
                               class="btn btn-primary">@lang('View About Us')</a>
                        </div>
                        
                    </div>
                    <div class="mt-5">
                   
                        {!! Form::model($data ,['method' => 'PUT', 'route' => ['aboutus.update',$data->id], 'files' => true,]) !!}

                        <div class="row justify-content-center">
                        <div class="col-12 col-lg-6 form-group">
                        <label for="myfile">About Us</label><br>
                            <textarea class="editor"rows="4" cols="50" name="content" id="summernote">{!! $data->content !!}</textarea>
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

