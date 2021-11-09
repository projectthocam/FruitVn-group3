<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCustomer;
use App\Http\Controllers\AdminPermissionController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminFeedbackController;
use App\Http\Controllers\AdminSettingController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminTypeProductController;
use App\Http\Controllers\FontCategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminRolesController;
use App\Http\Controllers\ProductDetail;
use App\Http\Controllers\SliderAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserSignUpController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminNewsController;
use GuzzleHttp\Middleware;

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

// Route::get('/', [HomeController::class,'index']);

// Route::get('/', function(){
//     return view('welcome');
// });


Route::get('/', [HomeController::class, 'index'])->name('Homeindex');

Route::get('/contact', function (){
    return view('contact');
})->name('contactindex');

Route::get('/aboutus', function (){
    return view('aboutus');
})->name('aboutusindex');


Route::get('/category/{slug}/{id}', [FontCategoryController::class,'index'])->name('category.product');

Route::get('/product/{slug}/{id}', [FontCategoryController::class,'showProduct'])->name('show.product');

Route::get('/product/{id}', [ProductDetail::class,'index'])->name('productDetail');


Route::get('/homes', function () {
    return view('homes');
})->name('login');


Route::prefix('giohang')->group(function(){

    Route::get('/add-to-cart',[HomeController::class,'addToCart'])->name('giohang.add');

    Route::get('/show-cart',[HomeController::class,'showCart'])->name('giohang.show');

    Route::get('/update-cart',[HomeController::class,'updateCart'])->name('giohang.update');

    Route::get('/delete-cart',[HomeController::class,'deleteCart'])->name('giohang.delete');

    Route::get('/thanhtoan-cart',[HomeController::class,'thanhtoan'])->name('giohang.thanhtoan');

    Route::post('/submit-cart',[HomeController::class,'submitThanhtoan'])->name('giohang.submit');

});
// customer
// Route::get('/login_user',[UserController::class,'showLogin'])->name('login_user.showLogin');
// Route::post('/',[UserController::class,'login'])->name('login_user.login');
// Route::get('/',[UserController::class,'logout'])->name('login_user.logout');

Route::get('/sign_up',[UserSignUpController::class,'showSignUp'])->name('sign_up.showSignUp');
Route::post('/',[UserSignUpController::class,'signUp'])->name('sign_up.signUp');

    // comment cus
Route::post('/comment',[CommentController::class,'userComment'])->name('comments.userComment');

//=========


Route::get('/admin', [AdminController::class, 'loginAdmin'])->name('admin.login');
Route::post('/admin', [AdminController::class, 'postLoginAdmin'])->name('admin.post-login');

Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::prefix('admin')->/*middleware('isAdmin')->*/group(function () {
    Route::get('/homes', function () {
        return view('homes');
    })->name('login');



    Route::prefix('categories')->group(function () {
        // Route::get('/create',['as' => 'categories.create', 'uses' => CategoryController::class,'create']);
        Route::get('/', [AdminTypeProductController::class, 'index'])->name('categories.index');

        Route::get('/create', [AdminTypeProductController::class, 'create'])->name('categories.create');

        Route::post('/store', [AdminTypeProductController::class, 'store'])->name('categories.store');

        Route::get('/edit/{id}', [AdminTypeProductController::class, 'edit'])->name('categories.edit');

        Route::get('/delete/{id}', [AdminTypeProductController::class, 'delete'])->name('categories.delete');

        Route::post('/update/{id}', [AdminTypeProductController::class, 'update'])->name('categories.update');
    });



    Route::prefix('product')->group(function () {

        Route::get('/', [AdminProductController::class, 'index'])->name('product.index');

        Route::get('/create', [AdminProductController::class, 'create'])->name('product.create');

        Route::post('/store', [AdminProductController::class, 'store'])->name('product.store');

        Route::get('/edit/{id}', [AdminProductController::class, 'edit'])->name('product.edit');

        Route::post('/update/{id}', [AdminProductController::class, 'update'])->name('product.update');

        Route::get('/delete/{id}', [AdminProductController::class, 'delete'])->name('product.delete');
    });

    //Slider

    Route::prefix('slider')->group(function () {

        Route::get('/', [SliderAdminController::class,'index'])->name('slider.index');

        Route::get('/create', [SliderAdminController::class, 'create'])->name('slider.create');

        Route::post('/store', [SliderAdminController::class, 'store'])->name('slider.store');

        Route::get('/edit/{id}', [SliderAdminController::class, 'edit'])->name('slider.edit');

        Route::post('/update/{id}', [SliderAdminController::class, 'update'])->name('slider.update');

        Route::get('/delete/{id}', [SliderAdminController::class, 'delete'])->name('slider.delete');

    });



    //users
    Route::prefix('users')->group(function () {

        Route::get('/', [AdminUserController::class,'index'])->name('users.index');

        Route::get('/create', [AdminUserController::class,'create'])->name('users.create');

        Route::post('/store', [AdminUserController::class,'store'])->name('users.store');

        Route::get('/edit/{id}', [AdminUserController::class,'edit'])->name('users.edit');

        Route::post('/update/{id}', [AdminUserController::class,'update'])->name('users.update');

        Route::get('/delete/{id}', [AdminUserController::class,'delete'])->name('users.delete');

    });

    Route::prefix('feedback')->group(function () {

        Route::get('/', [AdminFeedbackController::class,'index'])->name('feedback.index');

        Route::get('/create', [AdminFeedbackController::class,'create'])->name('feedback.create');

        Route::post('/store', [AdminFeedbackController::class,'store'])->name('feedback.store');

        Route::get('/edit/{id}', [AdminFeedbackController::class,'edit'])->name('feedback.edit'); //delete

        Route::post('/update/{id}', [AdminFeedbackController::class,'update'])->name('feedback.update');
    });

    //Role
    Route::prefix('/roles')->group(function (){
        Route::get('/', [AdminRolesController::class,'index'])->name('roles.index');

        Route::get('/create', [AdminRolesController::class,'create'])->name('roles.create');

        Route::post('/store', [AdminRolesController::class,'store'])->name('roles.store');

        Route::get('/edit/{id}', [AdminRolesController::class,'edit'])->name('roles.edit');

        Route::post('/update/{id}', [AdminRolesController::class,'update'])->name('roles.update');

        Route::post('/delete/{id}', [AdminRolesController::class,'delete'])->name('roles.delete');
    });

    Route::prefix('permissions')->group(function () {

        Route::get('/create', [AdminPermissionController::class,'CreatePermission'])->name('permission.create');

        Route::post('/store', [AdminPermissionController::class,'store'])->name('permission.store');

    });

    Route::prefix('donhang')->group(function () {

        Route::get('/', [AdminCustomer::class,'index'])->name('donhang.index');

        Route::get('/viewDetail/{id}', [AdminCustomer::class,'viewDetail'])->name('donhang.detail');

        Route::get('/edit/{id}', [AdminCustomer::class,'edit'])->name('donhang.edit');

        Route::post('/update/{id}', [AdminCustomer::class,'update'])->name('donhang.update');

    });
});

Route::post('/cart', [AdminController::class, 'cart'])->name('cart.create');
Route::get('/cartform', [AdminController::class, 'cartform'])->name('cart.form');

Route::get('/cartform', function () {
    return view('test_cart_form');
})->name('locart.formgin');
