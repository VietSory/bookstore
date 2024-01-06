<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;

use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/users/login', [LoginController::class, 'index'])->name('login');
Route::post('/users/login/handle_login', [LoginController::class, 'handle_login']);

Route::get('/users/sign-up', [LoginController::class, 'signup'])->name('signup');
Route::post('/users/sign-up/handle_signup', [LoginController::class, 'handle_signup']);

Route::post('logout', [LoginController::class, 'logout'])->name('logout');


// ======================================== ADMIN ========================================
Route::middleware(['auth', 'admin.access'])->group(function() {

    Route::prefix('admin')->group(function() {
        # income
        Route::get('/', [MainController::class, 'income'])->name('admin');

        # users
        Route::prefix('users')->group(function() {
            Route::get('add-user', [LoginController::class, 'addUserByAdmin']);
            Route::post('add-user', [LoginController::class, 'handle_signup']);
            Route::get('list-user', [UserController::class, 'listUser']);
            Route::get('edit/{user}', [UserController::class, 'editUser']);
            Route::post('edit/{user}', [UserController::class, 'updateUser']);
            Route::DELETE('delUser', [UserController::class, 'delUser']);
        });

        # menu
        Route::prefix('menus')->group(function() {
            Route::get('add-category', [MenuController::class, 'addCategory']);
            Route::post('add-category', [MenuController::class, 'handle']);
            Route::get('list-category', [MenuController::class, 'listCategory']);
            Route::get('edit/{menu}', [MenuController::class, 'editCategory']);
            Route::post('edit/{menu}', [MenuController::class, 'updateCategory']);
            Route::DELETE('delCategory', [MenuController::class, 'delCategory']);
            Route::get('/{menu}/{url}', [MenuController::class, 'getPrdfromCgr']);
        });

        # products
        Route::prefix('products')->group(function() {
            Route::get('add-product', [ProductController::class, 'addProduct']);
            Route::post('add-product', [ProductController::class, 'store']);
            Route::get('list-product', [ProductController::class, 'listProduct']);
            Route::get('edit-product/{product}', [ProductController::class, 'editProduct']);
            Route::post('edit-product/{product}', [ProductController::class, 'updateProduct']);
            Route::DELETE('delProduct', [ProductController::class, 'delProduct']);
            Route::get('/id-{id}/{url}', [ProductController::class, 'detail'])->name('detail');
        });

        #Dashboard
        Route::prefix('dashboard')->group(function () {
            Route::get('/', [MainController::class, 'income'])->name('doanhthu');
            Route::post('/handle-income', [MainController::class, 'handleIncome']);
            Route::get('/number-product', [MainController::class, 'numPrd']);
        });

        # Order
        Route::prefix('order')->group(function(){
            Route::get('/list-order',[OrderController::class,'index']);
            Route::get('/view-detail/{id}/{date}', [OrderController::class, 'detailOrder']);
        });

        # upload img
        Route::post('upload/services', [UploadController::class, 'store']);
    });
    
});


// ======================================== USER ========================================
// Home
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/home', [HomeController::class, 'home']);

// Profile
Route::middleware(['auth'])->group(function () {
    Route::get('/my-profile/{user}', [UserController::class, 'profile']);
    Route::post('/my-profile/{user}', [UserController::class, 'update']);
    Route::post('/change-pass/{user}', [UserController::class, 'changePass']);
});

// Category
Route::prefix('/danh-muc')->group(function () {
    Route::get('/{id}/{url}', [CategoryController::class, 'index']);
});

// Product
Route::prefix('/san-pham')->group(function(){
    Route::get('/tat-ca-sach', [\App\Http\Controllers\ProductController::class, 'allBook'])->name('allBook');
    Route::get('/id-{id}/{url}', [\App\Http\Controllers\ProductController::class, 'detail'])->name('detail');
    
    # Handle Comment
    Route::post('load-comment',[\App\Http\Controllers\ProductController::class,'load_comment']);
    Route::post('add-comment', [\App\Http\Controllers\ProductController::class, 'add_comment']);
});

// Cart & Order
Route::middleware('auth')->group(function(){
    # Cart
    Route::post('/them-gio-hang', [BookingController::class, 'addCart']);
    Route::get('/gio-hang', [BookingController::class, 'index']);
    Route::post('/cap-nhat-gio-hang', [BookingController::class, 'updateCart']);
    Route::get('/xoa-sp/{id}', [BookingController::class, 'removePrd']);
    Route::post('/gio-hang', [BookingController::class, 'booking']);

    #Order
    Route::get('/{id}/don-hang',[\App\Http\Controllers\OrderController::class ,'myOrder']);
    Route::get('/chi-tiet/{id}/{date}', [\App\Http\Controllers\OrderController::class ,'detailOrder']);
});

