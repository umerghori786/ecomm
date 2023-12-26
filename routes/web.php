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
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PayPalController;
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



/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');*/

/*frontend routes*/
Route::get('/new',[HomeController::class,'index'])->name('home');
Route::get('/policy ',[SettingController::class,'termPolicy'])->name('policy.index');
Route::get('/questions',[SettingController::class,'questions'])->name('questions.index');
Route::get('/contacts',[SettingController::class,'contacts'])->name('contacts.index');
// Route::get('/news',[HomeController::class,'slide'])->name('slide');


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
    Route::get('/show-cart'       ,'showCart');
    Route::get('/delete-from-cart' ,'destroy');
    Route::get('/update-cart'      ,'update');
});

//wishlist routes
Route::controller(WishlistController::class)->group(function(){

    Route::get('/add-to-wishlist'    , 'addToWishlist');
    Route::get('/show-wishlist'      , 'showWishlist');
    Route::get('/delete-from-wishlist' ,'destroy');
});
/*checkout routes*/
Route::controller(CheckoutController::class)->group(function(){
    Route::get('/checkout'     ,  'index');
    Route::post('/apply-coupon',   'applyCoupon')->name('applyCoupon');
    Route::post('/stripe-checkout-charge',   'stripeCheckoutCharge')->name('stripeCheckoutCharge');
    Route::get('/stripe-checkout-confirm',   'stripeCheckoutConfirm')->name('stripeCheckoutConfirm');
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
        'order'   => OrderController::class
    ]);
    Route::get('/showsub_category',[ProductController::class,'showSubCategory']);

    //genereal setting routes
    Route::controller(GeneralSettingController::class)->group(function(){
        Route::get('/settings/general'       , 'getGeneralSettings')->name('admin.getGeneralSettings');
        Route::post('/settings/general'       , 'saveGeneralSettings');
    });
});

require __DIR__.'/auth.php';



//below route is for vue route
Route::get('/{any?}', function () {
    return view('vuecheck');
})->where('any', '^(?!api\/)[\/\w\.\,-]*');

