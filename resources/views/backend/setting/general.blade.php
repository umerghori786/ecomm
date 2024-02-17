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
                    	        <input type="text" name="app__name" value="{{config('app.name')}}" class="form-control">
                    	    </div>

                    	</div>
                        <div class="row justify-content-center container mt-5">
                            <div class="col-3 col-lg-3 form-group">
                                {!! Form::label('Shipping Cost', 'Shipping Cost', ['class' => 'control-label fs-5 text-center center']) !!}
                             </div>

                             <div class="col-9 col-lg-9 form-group">
                                <input type="number" name="setting__shipping" value="{{config('setting.shipping')}}" class="form-control" placeholder="enter shipping cost by default it is 0">
                            </div>

                        </div>
                        <div class="row justify-content-center container mt-5">
                            <div class="col-3 col-lg-3 form-group">
                                {!! Form::label('Select Currency', 'Select Currency', ['class' => 'control-label fs-5 text-center center']) !!}
                             </div>

                             <div class="col-9 col-lg-9 form-group">
                                <select class="form-control" id="app_currency" name="app__currency">
                                    @foreach(config('currencies') as $currency)
                                        <option 
                                        @if(config('app.currency') == $currency['symbol'])
                                        selected
                                        @endif 
                                        value="{{$currency['symbol'].'__'.$currency['short_code']}}">
                                            {{$currency['symbol'].' - '.$currency['name']}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="alert alert-danger text-center mt-5">Stripe details</div>
                        <div class="justify-content-center container mt-5 row">
                            
                            <div class="col-3 col-lg-3 form-group">
                                {!! Form::label('Stripe payment method (credit/debit card)', 'Stripe payment method (credit/debit card)', ['class' => 'control-label fs-5 text-center center']) !!}
                             </div>
                             <div class="col-9 col-lg-9 form-group">
                             	<div class="row">
                             		<div class="col-6 col-lg-6 form-group">
                             		    {!! Form::label('API Key', 'API Key', ['class' => 'control-label']) !!}
                             		    
                                        <input type="text" name="setting__stripeKey" value="{{config('setting.stripeKey')}}" class="form-control" placeholder="Stripe Api Key">
                             		</div>
                             		<div class="col-12 col-lg-6 form-group">
                             		    {!! Form::label('API Secret', 'API Secret', ['class' => 'control-label']) !!}
                             		    
                                        <input type="text" name="setting__stripeSecret" value="{{config('setting.stripeSecret')}}" class="form-control" placeholder="Stripe Api Secret">
                             		</div>
                             	</div>
                             </div>
                        </div><!--form-group-->

                        <div class="alert alert-danger text-center mt-5">Paypal details</div>
                        <div class="justify-content-center container mt-5 row">
                            
                            <div class="col-3 col-lg-3 form-group">
                                {!! Form::label('Paypal Payment Method', 'Paypal Payment Method', ['class' => 'control-label fs-5 text-center center']) !!}
                             </div>
                             <div class="col-9 col-lg-9 form-group">
                                
                                    <input type="radio" id="sandbox"  name="paypal__mode" value="sandbox" @if(config('paypal.mode') == 'sandbox')   checked  @endif>
                                    <label for="html">Sandbox</label>
                                    <input type="radio" id="live" @if(config('paypal.mode') == 'live')   checked  @endif  name="paypal__mode" value="live">
                                    <label for="css">Live</label><br>
                                    

                                
                             	<div class="row mt-3 sandbox" @if(config('paypal.mode') == 'live') style="display: none;"  @endif>
                             		<div class="col-6 col-lg-6 form-group">
                             		    {!! Form::label('Sandbox Client ID', 'Sandbox Client ID', ['class' => 'control-label']) !!}
                             		    
                                        <input type="text" name="paypal__sandbox__client_id" value="{{config('paypal.sandbox.client_id')}}" class="form-control" placeholder="paypal client ID">
                             		</div>
                             		<div class="col-12 col-lg-6 form-group">
                             		    {!! Form::label('Sandbox Secret', 'Sandbox Secret', ['class' => 'control-label']) !!}
                             		    
                                        <input type="text" name="paypal__sandbox__client_secret" value="{{config('paypal.sandbox.client_secret')}}" class="form-control" placeholder="paypal client Secret">
                             		</div>
                             	</div>
                                <div class="row mt-3 live" @if(config('paypal.mode') == 'sandbox') style="display: none;"  @endif>
                                    <div class="col-6 col-lg-6 form-group">
                                        {!! Form::label('Client ID', 'Client ID', ['class' => 'control-label']) !!}
                                        
                                        <input type="text" name="paypal__live__client_id" value="{{config('paypal.live.client_id')}}" class="form-control" placeholder="paypal client ID">

                                    </div>
                                    <div class="col-12 col-lg-6 form-group">
                                        {!! Form::label('Secret', 'Secret', ['class' => 'control-label']) !!}
                                        
                                        <input type="text" name="paypal__live__client_secret" value="{{config('paypal.live.client_secret')}}" class="form-control" placeholder="paypal secret">
                                    </div>
                                </div>
                             </div>
                        </div><!--form-group-->

                        <div class="alert alert-danger text-center mt-5">Home Page Slider</div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-8">
                                
                                <input type="checkbox"   name="setting__showslider" value="1" @if(config('setting.showslider') == 1)   checked  @endif>
                                            <label for="html">Show Slider on Home Page</label>
                            </div>
                        </div>
                        <div class="alert alert-danger text-center mt-5">Select Home Page</div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">
                                
                                <input type="radio"   name="setting__homepage" value="1" @if(config('setting.homepage') == 1)   checked  @endif>
                                            <label for="html">Home Page 1</label>
                            </div>
                            <div class="col-4">
                                
                                <input type="radio"   name="setting__homepage" value="2" @if(config('setting.homepage') == 2)   checked  @endif>
                                            <label for="html">Home Page 2</label>
                            </div>
                        </div>
                        
                        
                        
                        
                        
                        <div class="row justify-content-center container">    
                            
                            
                        </div>
                        <div class="row justify-content-center mb-5">    
                            
                            <div class="col-12 col-lg-6 form-group text-center mt-3">

                                {!! Form::submit(trans('update'), ['class' => 'btn mt-auto  btn-danger']) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>

                    
<script type="text/javascript">
    $("input[name~='paypal__sandbox__client_id']").click(function(){
        $("input[name~='paypal__mode']").attr('required',true)
    })
    $("#live").click(function(){

        $('.live').show()
        $('.sandbox').hide()
    })
    $("#sandbox").click(function(){

        $('.live').hide()
        $('.sandbox').show()
    })
</script>

               
@endsection

