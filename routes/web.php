<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController as UserProductController;

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
Route::resource('/allproducts',UserProductController::class)->only([
    'index','show'
]);
/*end*/

Route::middleware('admin')->prefix('user')->group(function(){

    Route::get('dashboard',[DashboardController::class,'index'])->name('admin.dashboard');

    Route::resources([
        'categories' => CategoryController::class,
        'subcategories' => SubCategoryController::class,
        'products' => ProductController::class,
        'images'=>ImageController::class
    ]);
    Route::get('/showsub_category',[ProductController::class,'showSubCategory']);
});

require __DIR__.'/auth.php';



//below route is for vue route
Route::get('/{any?}', function () {
    return view('vuecheck');
})->where('any', '^(?!api\/)[\/\w\.\,-]*');

