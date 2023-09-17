<div class="minicart__product">

    @forelse($cart_products as $cart)

    <div class="minicart__product--items d-flex">
        <div class="minicart__thumbnail">

            <a href="product-details.html"><img src="{{$cart['image']}}" alt="prduct-img"></a>
        </div>
        <div class="minicart__text">
            <h4 class="minicart__subtitle"><a href="product-details.html">{{$cart['title']}}</a></h4>
            
            <div class="minicart__price">
                <span class="current__price">${{$cart['discount_price']}}</span>
                <span class="old__price">${{$cart['strike_price']}}</span>
            </div>
            <div class="minicart__text--footer d-flex align-items-center">
                <div class="quantity__box minicart__quantity">
                    {{-- <button type="button" class="quantity__value decrease" aria-label="quantity value" value="Decrease Value">-</button> --}}
                    <label>
                        <input type="number"  readonly class="quantity__number" value="{{$cart['quantity']}}" />
                    </label>
                    {{-- <button type="button" class="quantity__value increase" aria-label="quantity value" value="Increase Value">+</button> --}}
                </div>
                <button class="minicart__product--remove" aria-label="minicart remove btn">Remove</button>
            </div>
        </div>
    </div>
    @empty
    @endforelse
</div>
<div class="minicart__amount">
    <div class="minicart__amount_list d-flex justify-content-between">
        <span>Sub Total:</span>
        <span><b>${{number_format($cart_total, 2)}}</b></span>
    </div>
    <div class="minicart__amount_list d-flex justify-content-between">
        <span>Total:</span>
        <span><b>${{number_format($cart_total, 2)}}</b></span>
    </div>
</div>
<div class="minicart__conditions text-center">
    <input class="minicart__conditions--input" id="accept" type="checkbox">
    <label class="minicart__conditions--label" for="accept">I agree with the <a class="minicart__conditions--link" href="privacy-policy.html">Privacy And Policy</a></label>
</div>
<div class="minicart__button d-flex justify-content-center">
    <a class="primary__btn minicart__button--link" href="cart.html">View cart</a>
    <a class="primary__btn minicart__button--link" href="checkout.html">Checkout</a>
</div>