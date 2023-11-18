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
	
	const addToCart = (id)=>{

	    var product_id = id;
	    var quantity = 1;
	    $.ajax({

	        type : "get",
	        url : "{{url('/add-to-cart')}}",
	        data : {product_id : product_id, quantity : quantity},

	        success:function(data)
	        {   
	            $('.mini-cart-append').empty()
	            $('.mini-cart-append').html(data.renderHTML)
	            $('.offCanvas__minicart').addClass('active')
	            $('.cart-items__count').html(data.total_products_count)

	            const myTimeout = setTimeout(showminicart, 2000);
	            function showminicart() {
	              $('.offCanvas__minicart').removeClass('active')
	            }
	            
	        }

	    })
	}

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
	            $('.cart-items__count').html(data.cart_quantity)
	        }

	    })
	}

	const addToWishlist = (id)=>{

		var product_id = id;
		$.ajax({

			type : 'get',
			url : "{{url('/add-to-wishlist')}}",
			data : {product_id : product_id},

			success:function(data)
			{
				$('.wishlist-item_count').html(data.wishlist_quantity)
			}
		})
	}

	const deleteFromWishlist = (obj , id)=>{

		obj.parents('.remove-item-in-wishlist').fadeOut(1000);
		var product_id = id;
		$.ajax({

			type : 'get',
			url : "{{url('/delete-from-wishlist')}}",
			data : {product_id : product_id},

			success:function(data)
			{
				$('.wishlist-item_count').html(data.wishlist_quantity)
			}
		})
	}
</script>
</body>
</html>