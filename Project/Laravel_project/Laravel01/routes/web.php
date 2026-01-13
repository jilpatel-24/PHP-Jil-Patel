<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ManageCategoryController;
use App\Http\Controllers\ManageProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WebsiteProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('website.index');
});

Route::get('/home', function () {
    return view('website.index');
});

Route::get('/about', function () {
    return view('website.about');
});

Route::get('/course', function () {
    return view('website.course');
});

Route::get('/fact', function () {
    return view('website.fact');
});

Route::get('/price', function () {
    return view('website.price');
});


//-----Profile-----
Route::get('/my_profile', [CustomerController::class, 'profile'])->middleware('afterlogin_u');
Route::get('/edit_profile/{id}', [CustomerController::class, 'edit'])->middleware('afterlogin_u');
Route::post('/update_profile/{id}', [CustomerController::class, 'update'])->middleware('afterlogin_u');

//-----Product-----
Route::get('/products', [WebsiteProductController::class, 'index'])->name('products.index');
Route::get('/product/{id}', [WebsiteProductController::class, 'show'])->name('products.show');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

//-----Cart-----
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::patch('/cart/update/{id}', [CartController::class, 'update']) ->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');


//-----CheckOut-----
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [OrderController::class, 'store'])->name('checkout.store');
//Route::post('/checkout', [\App\Http\Controllers\OrderController::class, 'store'])->name('checkout.store');


//-----Category-----
Route::get('/category', [CategoryController::class, 'showCategory']);
//Route::get('/products', [CategoryController::class, 'allCategoryPage']);
Route::get('/category/{id}/products', [CategoryController::class, 'showCategoryProducts'])->name('category.products');


//-----LogIn-----
Route::get('/login', [CustomerController::class, 'login'])->middleware('beforelogin_u');
Route::post('/auth_login', [CustomerController::class, 'auth_login'])->middleware('beforelogin_u');
Route::get('/cust_logout', [CustomerController::class, 'cust_logout']);


//-----SignUp-----
Route::get('/signup', [CustomerController::class, 'create'])->middleware('beforelogin_u');
Route::post('/add_signup', [CustomerController::class, 'store'])->middleware('beforelogin_u');

//-----Forgot Password Setup-----
Route::get('/forgot', [CustomerController::class, 'forgot']);
Route::post('/auth_forgot', [CustomerController::class, 'auth_forgot']);

Route::get('/enter_otp', [CustomerController::class, 'enter_otp']);
Route::post('/auth_enter_otp', [CustomerController::class, 'auth_enter_otp']);

Route::get('/reset_password', [CustomerController::class, 'reset_password']);
Route::post('/auth_reset_password', [CustomerController::class, 'auth_reset_password']);

//-----Contact-----
Route::get('/contectus', [ContactController::class, 'create']);
Route::post('/add_contect', [ContactController::class, 'store']);

//-----Feedback-----
Route::get('/feedback', [FeedbackController::class, 'create'])->middleware('afterlogin_u');
Route::post('/add_feedback', [FeedbackController::class, 'store'])->middleware('afterlogin_u');


//----------------------------Admin Routes--------------------------------------------------

Route::group(['middleware' => ['beforelogin_a']], function () {
    //-----Admin-----
    Route::get('/admin_login', [AdminController::class, 'create']);
    Route::post('/admin_auth_login', [AdminController::class, 'admin_auth_login']);
    
});

Route::group(['middleware' => ['afterlogin_a']], function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('/admin_logout', [AdminController::class, 'admin_logout']);
    
    //-----Catagory-----
    Route::get('/add_category', [ManageCategoryController::class, 'create']);
    Route::post('/category', [ManageCategoryController::class, 'store']);
    Route::get('/manage_category', [ManageCategoryController::class, 'show']);
    Route::get('/edit_category/{id}', [ManageCategoryController::class, 'edit']);
    Route::post('/update_category/{id}', [ManageCategoryController::class, 'update']);

    /*
    Route::get('/category/edit/{id}', [ManageCategoryController::class, 'edit']);
    Route::post('/category/update/{id}', [ManageCategoryController::class, 'update']);
    */

    //-----Product-----
    Route::get('/add_product', [ManageProductController::class, 'create']);
    Route::post('/product', [ManageProductController::class, 'store']);
    Route::get('/manage_product', [ManageProductController::class, 'show']);
    Route::get('/manage_product/{id}', [ManageProductController::class, 'destroy']);
    Route::get('/edit_product/{id}', [ManageProductController::class, 'edit']);
    Route::post('/update_product/{id}', [ManageProductController::class, 'update']);

    //-----Feedback-----
    Route::get('/manage_feedback', [FeedbackController::class, 'show']);
    Route::get('/manage_feedback/{id}', [FeedbackController::class, 'destroy']);

    //-----Customer-----
    Route::get('/manage_customer', [CustomerController::class, 'show']);
    Route::get('/manage_customer/{id}', [CustomerController::class, 'destroy']);
    Route::get('/status_customers/{id}', [CustomerController::class, 'status_customers']);

    //-----Contact-----
    Route::get('/manage_contact', [ContactController::class, 'show']);
    Route::get('/manage_contact/{id}', [ContactController::class, 'destroy']);

    //-----Order-----
    Route::get('/manage_order', [OrderController::class, 'show']);
    Route::get('/manage_order/{id}', [OrderController::class, 'destroy']);
});
