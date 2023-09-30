<!DOCTYPE html>
<html>

@include('frontend.includes.head')

<body>

@include('frontend.includes.header')

@yield('content')


@include('frontend.includes.footer')


@include('frontend.includes.script')

@stack('script')
<script type="text/javascript">
	const deleteFromCart = (obj,id)=>{

	    obj.parents('.remove-item-in-cart').fadeOut(1000)
	    $(".remove-item-in-cart-"+id).fadeOut(1000)
	    var product_id = id;
	    $.ajax({

	        type : "get",
	        url : "{{url('/delete-from-cart')}}",
	        data : {product_id : product_id},

	        success:function(data)
	        {
	            
	            $('.update-cart-new-total').html('$'+data.cart_total)
	        }

	    })
	}
</script>
</body>
</html>