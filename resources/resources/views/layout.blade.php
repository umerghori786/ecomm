<!DOCTYPE html>
<html>

@include('frontend.includes.head')

<body>
    
    
<!-- preloader -->
<div class="preloader-wraper">
    <div class="spinner"></div>
</div>


@include('frontend.includes.header')

@yield('content')


@include('frontend.includes.footer')







@include('frontend.includes.script')

@stack('script')
<script type="text/javascript">




const preloader = document.querySelector('.preloader-wraper');
setTimeout(function () {
    preloader.style.display = 'none'
}, 1000);

















	
	const addToCart = (id)=>{

	    var product_id = id;
	    var quantity = $(`input[name~='product-quantity']`).val() ?? ''
	    var product_color = $(`input[name~='product_color']`).val() ?? ''
	    var cloth_size = $(`input[name~='cloth_size']`).val() ?? ''
	    var shoe_size = $(`input[name~='shoe_size']`).val() ?? ''
	    if(!product_color)
	    {
	    	successmsg('choose color');
	    }
	    else
	    {
	    	$.ajax({

	    	    type : "get",
	    	    url : "{{url('/add-to-cart')}}",
	    	    data : {product_id : product_id, quantity : quantity, product_color : product_color,cloth_size:cloth_size, shoe_size : shoe_size},

	    	    success:function(data)
	    	    {   
	    	        $('.mini-cart-append').empty()
	    	        $('.mini-cart-append').html(data.renderHTML)
	    	        $('.offCanvas__minicart').addClass('active')
	    	        $('.cart-items__count').html(data.total_products_count)

	    	        /*const myTimeout = setTimeout(showminicart, 10000);
	    	        function showminicart() {
	    	          $('.offCanvas__minicart').removeClass('active')
	    	        }*/
	    	        
	    	    }

	    	})
	    }
	    
	}

	const deleteFromCart = (obj,id)=>{

		successmsg('Remove From Cart')
	    obj.parents('.remove-item-in-cart').fadeOut(1000)
	    $(".remove-item-in-cart-"+id).fadeOut(1000)
	    var product_id = id;
	    $.ajax({

	        type : "get",
	        url : "{{url('/delete-from-cart')}}",
	        data : {product_id : product_id},

	        success:function(data)
	        {
	            
	            $('.update-cart-new-total').html(`{{config('app.currency')}}`+data.cart_total)
	            $('.cart-items__count').html(data.cart_quantity)
	        }

	    })
	}

	const addToWishlist = (id)=>{

		successmsg('Added To Wishlist')
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

	$(".newsletter_subscribe").submit(function(e){
		e.preventDefault();
		successmsg('Thanks for Subscribe')

		var $this = $(this);
		$.ajax({
			type : 'post',
			url : $this.attr('action'),
			data: $this.serializeArray(),
            dataType: $this.data('type'),
            sucess:function(data)
            {
            	$('.newsletter_subscribe')[0].reset();
            	$('.newsletter__subscribe--input').val('')
            }
		})
		$('.newsletter__subscribe--input').val('')
	})

	const deleteFromWishlist = (obj , id)=>{

		successmsg('Removed From Wishlist')
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
	function successmsg(msg)
	{
	    var msg = msg;
	    const Toast = Swal.mixin({
	      toast: true,
	      width: 400,
	      position: 'center',
	      showConfirmButton: false,
	      timer: 1500,
	      timerProgressBar: true,
	      customClass: {
	        popup: 'colored-toast',
	      },
	      
	    })

	    ;(async () => {
	      await Toast.fire({
	        icon: 'success',
	        title: msg,
	      })
	      
	    })()
	}
	$(document).ready(function(){
        $(document).on('change','#category-by',function(){

        	if($(this).val() == 'all')
        	{
        		location.href = '{{url('allproducts')}}';
        	}else{
        		location.href = '{{url('allproducts')}}?category_id=' + $(this).val()
        	}
            
        })
        @if(request('category_id') != "")
        $('#category-by').find('option[value="' + "{{request('category_id')}}" + '"]').attr('selected', true);
        @endif
    })

    $('#searchProductFormHome').submit(function(e){
        e.preventDefault()
        var search = $('input[name~="searchProduct"]').val()
        location.href = '{{url('allproducts')}}?search=' + search;
    })
    $('#searchProductFormHome1').submit(function(e){
        e.preventDefault()
        var search = $('input[name~="searchProductnew"]').val()
        location.href = '{{url('allproducts')}}?search=' + search;
    })
    $(document).on('click','.decreaseq',function(){
    	var quantity = $(`input[name~='product-quantity']`).val()
    	if(quantity > 1)
    	{
    		$(`input[name~='product-quantity']`).val(parseInt(quantity) - 1);
    	}
    })
    $(document).on('click','.increaseq',function(){
    	var quantity = $(`input[name~='product-quantity']`).val()
    	
    	$(`input[name~='product-quantity']`).val(parseInt(quantity) + 1);
    	
    })
    $(document).on('click','.product-color',function(){
    	$('.product-color').removeClass('active')
    	$(this).addClass('active')
    	$(`input[name~='product_color']`).val($(this).attr('id'));
    })
    $(document).on('click','.cloth_size',function(){
    	$('.cloth_size').removeClass('active')
    	$(this).addClass('active')
    	$(`input[name~='cloth_size']`).val($(this).attr('id'));
    })
    $(document).on('click','.shoe_size',function(){
    	$('.shoe_size').removeClass('active')
    	$(this).addClass('active')
    	$(`input[name~='shoe_size']`).val($(this).attr('id'));
    })
    var product_color = $(`input[name~='product_color']`).val() ?? ''
    var cloth_size = $(`input[name~='cloth_size']`).val() ?? ''
    var shoe_size = $(`input[name~='shoe_size']`).val() ?? ''
</script>
</body>
</html>