<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\userInterface\userInterfaceController;

// Admin Controllers
use App\Http\Controllers\admin\LoginController as AdminLoginController;
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\CareerApplicationController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\SystemUserController;
use App\Http\Controllers\admin\BackupController;


/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

// Guest routes
Route::prefix('account')->middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('account.login');
    Route::get('register', [LoginController::class, 'register'])->name('account.register');
    Route::post('process-register', [LoginController::class, 'processRegister'])->name('account.processRegister');
    Route::post('authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');
});

// Authenticated user routes
Route::prefix('account')->middleware('auth')->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('account.logout');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('account.dashboard');
    // Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    // Route::post('/checkout', [CheckoutController::class, 'placeOrder'])->name('place.order');
    Route::get('/my-orders', [OrderController::class, 'index'])->name('my.orders');
    // Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

    //checkout process
    // Route::post('/checkout/place-order', [CartController::class, 'placeOrder'])->name('checkout.placeOrder');

    Route::get('/my-orders', [OrderController::class, 'index'])->name('account.orders');
    Route::get('/my-orders', [OrderController::class, 'index'])->name('my.orders');
    Route::get('/account/my-orders', [OrderController::class, 'index'])->name('account.orders');


// Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

// Checkout & Payment
Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::post('/checkout', [CartController::class, 'redirectToPayHere'])->name('checkout.placeOrder');
Route::get('/checkout/success', [CartController::class, 'paymentSuccess'])->name('checkout.success');
Route::get('/checkout/cancel', [CartController::class, 'paymentCancel'])->name('checkout.cancel');
Route::post('/checkout/notify', [CartController::class, 'paymentNotify'])->name('checkout.notify');


Route::get('/payment/success', [CartController::class, 'paymentSuccess'])->name('payment.success');
Route::get('/payment/cancel', [CartController::class, 'paymentCancel'])->name('payment.cancel');
Route::post('/payment/notify', [CartController::class, 'paymentNotify'])->name('payment.notify');



Route::get('/checkout/dummy-payment/{order_id}', [CartController::class, 'dummyPayment'])->name('checkout.dummyPayment');

Route::post('/checkout/dummy-payment/process', [CartController::class, 'dummyPaymentProcess'])->name('checkout.paymentDummyProcess');

Route::post('/checkout/dummy-payment/cancel', [CartController::class, 'dummyPaymentCancel'])->name('checkout.paymentDummyCancel');




       
});


//cart process

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');







/*
 Admin Routes

*/

// Admin guest (login page)
Route::prefix('admin')->middleware('admin.guest')->group(function () {
    Route::get('login', [AdminLoginController::class, 'index'])->name('admin.login');
    Route::post('authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
});

// Admin authenticated routes
Route::prefix('admin')->name('admin.')->middleware('admin.auth')->group(function () {

    // Dashboard
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Logout
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');

    // Customers
    Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('customers/{id}', [CustomerController::class, 'show'])->name('customers.show');
    Route::get('customers-report', [CustomerController::class, 'generatePdfReport'])->name('customers.report');

    // Products
    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('products/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('products/report', [ProductController::class, 'generateReport'])->name('products.report');
    Route::get('products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('products/update/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('products/destroy/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

    // Categories
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::get('categories/pdf', [CategoryController::class, 'pdf'])->name('categories.pdf');
    Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/destroy/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');


    //inventory

    Route::get('inventory', [InventoryController::class, 'index'])->name('inventory.index');
    Route::post('inventory/update/{product}', [InventoryController::class, 'update'])->name('inventory.update');
    Route::get('inventory/report', [InventoryController::class, 'generateReport'])->name('inventory.report');


    
    // re order part
    Route::get('re-order', [InventoryController::class, 'reorder'])->name('inventory.re-order');


    //order

    Route::resource('orders', AdminOrderController::class)->only(['index', 'show']);
    Route::post('orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('orders.updateStatus');
    Route::get('orders-report', [AdminOrderController::class, 'generateReport'])->name('orders.report');

    Route::post('orders/{order}/send-invoice', [AdminOrderController::class, 'sendInvoice'])->name('orders.sendInvoice');


    // Route::resource('system-users', SystemUserController::class);


    Route::get('sales-report', [ReportsController::class, 'salesReport'])->name('reports.sales');



Route::get('system-users', [SystemUserController::class, 'index'])->name('system_users.index');
Route::get('system-users/create', [SystemUserController::class, 'create'])->name('system_users.create');
Route::post('system-users/store', [SystemUserController::class, 'store'])->name('system_users.store');
Route::get('system-users/{id}/edit', [SystemUserController::class, 'edit'])->name('system_users.edit');
Route::post('system-users/destroy', [SystemUserController::class, 'destroy'])->name('system_users.destroy');
Route::PUT('system-users/{id}/update', [SystemUserController::class, 'update'])->name('system_users.update');
Route::get('system-users-report', [SystemUserController::class, 'report'])->name('system_users.report');

Route::middleware(['auth', 'role:admin', 'checkModuleAccess:reports'])->group(function () {
    // ...
});



    Route::get('/', [BackupController::class, 'index'])->name('backup.index');
    Route::post('backup/create', [BackupController::class, 'createBackup'])->name('backup.createBackup');
    Route::get('/download/{fileName}', [BackupController::class, 'downloadBackup'])->name('backup.downloadBackup');
    Route::delete('/delete/{fileName}', [BackupController::class, 'deleteBackup'])->name('backup.deleteBackup');



   









    // Reports
    Route::prefix('reports')->name('reports.')->group(function () {
        Route::get('/', [ReportsController::class, 'index'])->name('index');
        Route::get('sales', [ReportsController::class, 'sales'])->name('sales');
        Route::get('products', [ReportsController::class, 'products'])->name('products');
        Route::get('orders', [ReportsController::class, 'orders'])->name('orders');
        Route::get('users', [ReportsController::class, 'users'])->name('users');
        Route::get('inventory', [ReportsController::class, 'inventory'])->name('inventory');
        Route::get('backup', [ReportsController::class, 'backup'])->name('backup');
    });


    // messages

    Route::get('messages', [userInterfaceController::class, 'adminMessages'])->name('messages.index');
    Route::get('messages/report', [userInterfaceController::class, 'generateMessageReport'])->name('messages.report');
    Route::post('messages/send/{id}', [MessageController::class, 'sendReply'])->name('messages.sendMail');


    // career
    
    Route::get('careers', [CareerApplicationController::class, 'index'])->name('careers.index');
    Route::get('careers/download/{id}', [CareerApplicationController::class, 'download'])->name('careers.download');
    Route::post('careers/check/{id}', [CareerApplicationController::class, 'markChecked'])->name('careers.check');
    Route::delete('careers/delete/{id}', [CareerApplicationController::class, 'destroy'])->name('careers.delete');

});




/*
 Common Routes
*/

// Public welcome page
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Frontend homepage
Route::get('home', [userInterfaceController::class, 'index'])->name('user.index');
Route::get('/', [userInterfaceController::class, 'index']);
Route::get('/about', [userInterfaceController::class, 'about']);
Route::get('/services', [userInterfaceController::class, 'services']);
Route::get('/contact', [userInterfaceController::class, 'contact']);
Route::get('/careers', [userInterfaceController::class, 'careers']);
Route::post('/contact', [userInterfaceController::class, 'submitContact'])->name('contact.submit');
Route::post('/careers', [userInterfaceController::class, 'submitCV'])->name('careers.apply');
Route::get('/collection', [userInterfaceController::class, 'exploreCollection'])->name('collection');
Route::get('/product/{id}', [userInterfaceController::class, 'viewProduct'])->name('product.view');



Route::get('/category-id/{id}', [userInterfaceController::class, 'viewCategoryById'])->name('category.byId');
Route::get('/gallery', [userInterfaceController::class, 'gallery'])->name('gallery');




// Order Details
Route::get('orders/{id}', [OrderController::class, 'show'])->name('orders.show');



