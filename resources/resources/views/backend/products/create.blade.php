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
                        <div class="row justify-content-center container mt-3">
                            <div class="col-12 col-lg-12 form-group">
                                {!! Form::label('Select Product colors', 'Select Product Colors (you can choose more than one color by again click on color in dropdown)', ['class' => 'control-label']) !!}
                                {!! Form::select('color_id[]', $colors,old('color_id') , ['class' => 'form-control leaderMultiSelctdropdown select2' , 'multiple'=>"multiple",'id'=>'leaderMultiSelctdropdown']) !!}

                            </div>
                            

                        </div>
                        
                        <div class="row justify-content-center container mt-3">
                            <div class="col-12 col-lg-12 form-group">
                                {!! Form::label('title', 'Title'.' *', ['class' => 'control-label']) !!}
                                {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'title', 'required' => true]) !!}

                            </div>
                            

                        </div>
                        <div class="row justify-content-center container mt-3">
                            <div class="col-12 col-lg-12 form-group">
                                {!! Form::label('short description',  trans('short description'), ['class' => 'control-label']) !!}
                                {!! Form::textarea('short_description', old('short_description'), ['class' => 'form-control editor', 'placeholder' => trans('short description')]) !!}

                            </div>
                        </div>
                        <div class="row justify-content-center container mt-3">
                            <div class="col-12 col-lg-12 form-group">
                                {!! Form::label('Long description',  trans('Long description (wirte description in textbox)'), ['class' => 'control-label']) !!}
                                {!! Form::textarea('long_description', old('long_description'), ['class' => 'form-control editor','placeholder'=>"write here" ,'id'=>"summernote"]) !!}

                            </div>
                        </div>
                        
                        <div class="row justify-content-center container">    
                            <div class="col-12 col-lg-4 form-group">
                                {!! Form::label('strike price',  trans('strike price'), ['class' => 'control-label']) !!}
                                {!! Form::number('strike_price', old('strike_price'), ['class' => 'form-control', 'placeholder' => trans(''),'step' => 'any', 'pattern' => "[0-9]"]) !!}
                            </div>
                            <div class="col-12 col-lg-4 form-group">
                                {!! Form::label('discounted price',  trans('discounted price'), ['class' => 'control-label']) !!}
                                {!! Form::number('discount_price', old('discount_price'), ['class' => 'form-control', 'placeholder' => trans(''),'step' => 'any', 'pattern' => "[0-9]"]) !!}
                            </div>
                            <div class="col-12 col-lg-4 form-group">
                                {!! Form::label('discounted price',  trans('quantity'), ['class' => 'control-label']) !!}
                                {!! Form::number('quantity', old('quantity'), ['class' => 'form-control', 'placeholder' => trans(''),'step' => 'any', 'pattern' => "[0-9]",'required' => true]) !!}
                            </div>
                        </div>
                        <div class="row justify-content-center container mt-3">    
                            
                            <div class="col-4 col-lg-4 form-group text-center mt-3">
                                {!! Form::checkbox('trending', 1, old('trending'), []) !!}
                                {!! Form::label('trending',  trans('trending'), ['class' => 'checkbox control-label font-weight-bold']) !!}
                                
                            </div>
                            <div class="col-4 col-lg-4 form-group text-center mt-3">
                                {!! Form::checkbox('popular', 1, old('popular'), []) !!}
                                {!! Form::label('popular',  trans('popular'), ['class' => 'checkbox control-label font-weight-bold']) !!}
                                
                            </div>
                        </div>
                        <div class="alert alert-danger text-center mt-5">Select Size of your product else you leave it empty</div>
                        <div class="row justify-content-center container mt-3">
                            <div class="col-12 col-lg-12 form-group">
                                {!! Form::label('Select Product Size', 'Select Product Size (you can choose more than one size by again click on size in dropdown)', ['class' => 'control-label']) !!}
                                {!! Form::select('clothsize_id[]', $cloths, old('clothsize_id[]'), ['class' => 'form-control leaderMultiSelctdropdown select2' , 'multiple'=>"multiple",'id'=>'leaderMultiSelctdropdown1']) !!}

                            </div>
                            

                        </div>
                        

                        <div class="alert alert-danger text-center mt-5">Select Product Images (Minimum two images are required.image size should be minimum 900 x 900. You can select more than two images by click on + icon)</div>
                        <div class="row append">
                          <div class="col-md-4 mt-2">
                            
                            <input type="file" name="image_url[]" accept="image/*" required>
                            <a class="btn btn-primary btn1" onclick="add()">+</a>
                          </div>
                          <div class="col-md-4 mt-2">
                            
                            <input type="file" name="image_url[]" accept="image/*" required>
                            <a class="btn btn-primary btn1" onclick="add()">+</a>
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

                    

<script type="text/javascript">
  const add = ()=>{

    var htmlData = '<div class="col-md-4 mt-2"><input type="file" name="image_url[]" required accept="image/*"><a class="btn btn-danger btn2">-</a></div>';

    $('.append').append(htmlData);
  }
  $(document).on('click','.btn2',function(){

    $(this).parent().remove()
  })
  $(".leaderMultiSelctdropdown").select2();
  $(".leaderMultiSelctdropdown1").select2();
  $(".leaderMultiSelctdropdown2").select2();
</script>
               
@endsection

