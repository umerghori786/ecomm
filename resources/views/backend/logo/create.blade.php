@extends('backend.layout')

@section('content')

                    <div class="row container">
                        <div class="col-md-9">
                            <h4 class="page-title d-inline">@lang('Create Logo')</h4>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('logos.index') }}"
                               class="btn btn-primary">@lang('View logo')</a>
                        </div>
                        
                    </div>
                    <div class="mt-5">
                    <form method="POST" action="{{ route('logos.store') }}" enctype="multipart/form-data">
                    @csrf
                        <!-- {!! Form::open(['method' => 'POST', 'route' => ['logos.store'], 'files' => true,]) !!} -->

                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-6 form-group">
                            <label for="myfile">Select a file:</label>
                            <input type="file" id="image" name="image" required/>
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
                        </form>
                        <!-- {!! Form::close() !!} -->
                    </div>

                    


               
@endsection

