@extends('backend.layout')

@section('content')

                    <div class="row container">
                        @if($errors->any())
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                        @endif
                        
                        @if(Session::has('success'))
	                    <p class="alert alert-info fs-5">{{ Session::get('success') }}</p>
	                    @endif
                        
                    </div>

                    <form method="POST" id="dynamic-form" action="{{ url('user/settings/general') }}" enctype="multipart/form-data">
                    @csrf
                    	
                    	<div class="row justify-content-center container mt-2">
                    	    <div class="col-3 col-lg-3 form-group">
                    	        {!! Form::label('Store Name', 'Store Name', ['class' => 'control-label fs-5 text-center center']) !!}
                    	     </div>
                    	     <div class="col-9 col-lg-9 form-group">
                    	        <input type="text" name="app_name" value="{{config('app.name')}}" class="form-control">
                    	    </div>

                    	</div>
                        <div class="row justify-content-center container mt-5">
                            <div class="col-3 col-lg-3 form-group">
                                {!! Form::label('Select Currency', 'Select Currency', ['class' => 'control-label fs-5 text-center center']) !!}
                             </div>

                             <div class="col-9 col-lg-9 form-group">
                                <select class="form-control" id="app_currency" name="app_currency">
                                    @foreach(config('currencies') as $currency)
                                        <option @if(config('app.currency') == $currency['symbol']) selected
                                                @endif value="{{$currency['symbol']}}">
                                            {{$currency['symbol'].' - '.$currency['name']}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="justify-content-center container mt-5 row">
                            
                            <div class="col-3 col-lg-3 form-group">
                                {!! Form::label('Stripe payment method (credit/debit card)', 'Stripe payment method (credit/debit card)', ['class' => 'control-label fs-5 text-center center']) !!}
                             </div>
                             <div class="col-9 col-lg-9 form-group">
                             	<div class="row">
                             		<div class="col-6 col-lg-6 form-group">
                             		    {!! Form::label('API Key', 'API Key', ['class' => 'control-label']) !!}
                             		    {!! Form::text('services.stripe.key', old('services.stripe.key'), ['class' => 'form-control', 'placeholder' => 'Stripe API Key']) !!}
                             		</div>
                             		<div class="col-12 col-lg-6 form-group">
                             		    {!! Form::label('API Secret', 'API Secret', ['class' => 'control-label']) !!}
                             		    {!! Form::text('services.stripe.secret', old('services.stripe.secret'), ['class' => 'form-control', 'placeholder' => 'Stripe API Secret']) !!}
                             		</div>
                             	</div>
                             </div>
                        </div><!--form-group-->


                        <div class="justify-content-center container mt-5 row">
                            
                            <div class="col-3 col-lg-3 form-group">
                                {!! Form::label('Paypal Payment Method', 'Paypal Payment Method', ['class' => 'control-label fs-5 text-center center']) !!}
                             </div>
                             <div class="col-9 col-lg-9 form-group">
                             	<div class="row">
                             		<div class="col-6 col-lg-6 form-group">
                             		    {!! Form::label('Client ID', 'Client ID', ['class' => 'control-label']) !!}
                             		    {!! Form::text('paypal.client_id', old('paypal.client_id'), ['class' => 'form-control', 'placeholder' => 'paypal client ID']) !!}
                             		</div>
                             		<div class="col-12 col-lg-6 form-group">
                             		    {!! Form::label('Secret', 'Secret', ['class' => 'control-label']) !!}
                             		    {!! Form::text('paypal.secret', old('paypal.secret'), ['class' => 'form-control', 'placeholder' => 'paypal secret']) !!}
                             		</div>
                             	</div>
                             </div>
                        </div><!--form-group-->
                        
                        
                        
                        
                        
                        <div class="row justify-content-center container">    
                            
                            
                        </div>
                        <div class="row justify-content-center mb-5">    
                            
                            <div class="col-12 col-lg-6 form-group text-center mt-3">

                                {!! Form::submit(trans('update'), ['class' => 'btn mt-auto  btn-danger']) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>

                    


               
@endsection

