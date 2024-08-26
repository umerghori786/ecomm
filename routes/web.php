<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\ProductReviewController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ProductController as UserProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\Admin\LogoController;
use App\Http\Controllers\Admin\PrivacyController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\SizeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/clear-cache', function() {
    \Artisan::call('cache:clear');
   \Artisan::call('config:clear');
   \Artisan::call('config:cache');
   \Artisan::call('view:clear');
   \Artisan::call('route:clear');
    // return what you want
    return redirect()->route('home');
});

/*frontend routes*/
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/logout',[HomeController::class,'destroy'])->name('logout');

Route::get('/policy ',[SettingController::class,'termPolicy'])->name('policy.index');
Route::get('/about ',[SettingController::class,'about'])->name('about');
Route::get('/questions',[SettingController::class,'questions'])->name('questions.index');
Route::get('/contacts',[SettingController::class,'contacts'])->name('contacts.index');
Route::post('/subcribe_email',[SettingController::class,'subscribe']);



Route::resources([
    'contactus' => ContactUsController::class,
    'review' => ReviewController::class
]);
Route::post('review-replay',[ReviewController::class,'reviewReply'])->name('review.replay');
// Route::resource('/contactus',ContactUsController::class)->only([
//     'store'
// ]);

Route::resource('/allproducts',UserProductController::class)->only([
    'index','show'
]);
Route::resource('/shopingcart',CartController::class)->only([
    'index'
]);

Route::controller(CartController::class)->group(function(){

    Route::get('/add-to-cart'     ,'addToCart');
    Route::get('/show-cart'       ,'showCart')->name('showCart');
    Route::get('/delete-from-cart' ,'destroy');
    Route::get('/update-cart'      ,'update');
});

//user dashboard routes
Route::controller(UserDashboardController::class)->middleware('auth')->group(function(){

    Route::get('user_dashboard'    , 'index');
});

//wishlist routes
Route::controller(WishlistController::class)->group(function(){

    Route::get('/add-to-wishlist'    , 'addToWishlist');
    Route::get('/show-wishlist'      , 'showWishlist')->name('wishlist');
    Route::get('/delete-from-wishlist' ,'destroy');
});
/*checkout routes*/
Route::controller(CheckoutController::class)->group(function(){
    Route::get('/checkout'     ,  'index')->name('checkout');
    Route::post('/apply-coupon',   'applyCoupon')->name('applyCoupon');
    Route::post('/stripe-checkout-charge',   'stripeCheckoutCharge')->name('stripeCheckoutCharge');
    Route::get('/stripe-checkout-confirm',   'stripeCheckoutConfirm')->name('stripeCheckoutConfirm');
    Route::get('/order-complete/{id}',   'orderComplete')->name('orderComplete');
});
/*paypal checkout controller*/

Route::controller(PayPalController::class)->group(function(){
    Route::get('paypal'           ,'index')->name('paypal');
    Route::get('paypal/payment'   , 'payment')->name('paypal.payment');
    Route::get('paypal/payment/success'   , 'paymentSuccess')->name('paypal.payment.success');
    Route::get('paypal/payment/cancel'   , 'paymentCancel')->name('paypal.payment/cancel');
});
/*end*/

Route::middleware('admin')->prefix('user')->group(function(){

    Route::get('dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
    Route::get('subscribers',[DashboardController::class,'subscribers'])->name('admin.subscribers');

    Route::resources([
        'categories' => CategoryController::class,
        'subcategories' => SubCategoryController::class,
        'products' => ProductController::class,
        'images' => ImageController::class,
        'logos' => LogoController::class,
        'privacy' => PrivacyController::class,
        'question' => QuestionController::class,
        'coupon' => CouponController::class,
        'contact' => ContactController::class,
        'message' => MessageController::class,
        'slider' => SliderController::class,
        'reviews' => ProductReviewController::class,
        'order'   => OrderController::class,
        'aboutus' => AboutUsController::class,
        'colors'  => ColorController::class,
        'sizes'    => SizeController::class
    ]);
    Route::get('/showsub_category',[ProductController::class,'showSubCategory']);

    //genereal setting routes
    Route::controller(GeneralSettingController::class)->group(function(){
        Route::get('/settings/general'       , 'getGeneralSettings')->name('admin.getGeneralSettings');
        Route::post('/settings/general'       , 'saveGeneralSettings');
    });
});

require __DIR__.'/auth.php';

