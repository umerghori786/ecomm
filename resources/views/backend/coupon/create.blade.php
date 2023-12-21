@extends('backend.layout')

@section('content')

                    <div class="row container">
                        <div class="col-md-9">
                            <h4 class="page-title d-inline">@lang('Create Coupon')</h4>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('coupon.index') }}"
                               class="btn btn-primary">@lang('View Coupon')</a>
                        </div>
                        
                    </div>
                    <div class="mt-5">
                    <form method="POST" id="dynamic-form" action="{{ route('coupon.store') }}" enctype="multipart/form-data">
                    @csrf
                        <!-- {!! Form::open(['method' => 'POST', 'route' => ['question.store'], 'files' => true,]) !!} -->
                        <div id="input-fields">

                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-6 form-group">
                                {!! Form::label('Code', 'Code'.' *', ['class' => 'control-label']) !!}
                                {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'coupon code', 'required' => true]) !!}
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-6 form-group">
                                {!! Form::label('percentage', 'Percentage'.' *', ['class' => 'control-label']) !!}
                                {!! Form::text('percentage', old('percentage'), ['class' => 'form-control', 'placeholder' => 'Percentage', 'required' => true]) !!}
                            </div>
                        </div>
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
                    


               

