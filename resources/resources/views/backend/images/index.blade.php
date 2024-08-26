@extends('backend.layout')

@section('content')
<div class="container">
  
  @if($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
  @endif
  <div class="row">
    <div class="col-md-8">
      <h2>{{$product->title}} Images</h2>
    </div>
    <div class="col-md-4">
      <a href="{{route('products.index')}}" class="btn btn-primary">products</a>
    </div>
  </div>
  
  <div class="row">

    @if(count($product->images) > 0)
    @foreach($product->images as $image)
    
      <div  style="margin-top: 3%" class="form-check col-md-3">
        <form action="{{route('images.destroy',[$image->id])}}" method="post" id="delete-form">
            @csrf
            @method('DELETE')
            <input  type="hidden" name="product_id" value="{{$product->id}}">
            <button type="submit"  class="close">
                  <span style="margin-right: 150px;"><i class="fa fa-trash" style="color:black;" onclick="return confirmation();"></i></span>
            </button>
        </form>
            <img src="{{ $image->url }}" width="100">

      </div>
    
    
    @endforeach
    @endif
  </div>
  <form id="form" method="POST" action="{{route('images.store')}}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="product_id" value="{{$product->id}}">
    <div class="row append">
      <div class="col-md-4 mt-2">
        
        <input type="file" name="image_url[]" accept="image/*" required>
        <a class="btn btn-primary btn1" onclick="add()">+</a>
      </div>
      
    </div>
  <button type="submit" class="btn btn-danger">submit</button>
  </form>
</div>

<script type="text/javascript">
  const add = ()=>{

    var htmlData = '<div class="col-md-4 mt-2"><input type="file" name="image_url[]" required accept="image/*"><a class="btn btn-danger btn2">-</a></div>';

    $('.append').append(htmlData);
  }
  $(document).on('click','.btn2',function(){

    $(this).parent().remove()
  })
</script>

@endsection