<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\ExpenditureController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\EmployeeController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\NewsController;




Route::group(['prefix' => 'admin','middleware'=>['auth','admin']], function () {

    Route::get('/clear-cache', function() {
        Artisan::call('route:clear');
        return redirect()->back()->with('success','cache cleared successfully');
    });

    Route::get('/clear-config', function() {
        Artisan::call('config:clear');
        return redirect()->back()->with('success','config cleared successfully');
    });

    Route::get('dashboard', [AdminDashboardController::class,'index'])->name('admin.dashboard');
    Route::get('/user/admins',[UsersController::class,'getAdmin'])->name('admin.user.get_admin');
    Route::get('/profile',[UsersController::class,'adminProfile'])->name('admin.profile');
    Route::post('/profile/update/{id}',[UsersController::class,'adminProfileUpdate'])->name('admin.profile.update');
    Route::delete('/user/admin/delete/{id}',[UsersController::class,'deleteAdmin'])->name('admin.user.delete_admin');


    Route::get('/user/create/',[UsersController::class,'create'])->name('admin.user.create');
    Route::post('/user/store',[UsersController::class,'store'])->name('admin.user.store');
    Route::get('/user/customers',[UsersController::class,'getCustomer'])->name('admin.user.get_customer');
    Route::delete('/user/customer/delete',[UsersController::class,'destroy'])->name('admin.user.delete_customer');
    Route::get('/user/customer/edit/{id}',[UsersController::class,'edit'])->name('admin.user.edit_customer');
    Route::post('/user/customer/update/{id}',[UsersController::class,'update'])->name('admin.user.update_customer');


    Route::get('/user/sellers',[UsersController::class,'getSeller'])->name('admin.user.get_sellers');
    Route::get('/user/edit/seller/{id}',[UsersController::class,'editSeller'])->name('admin.user.edit.sellers');
    Route::post('/user/update/seller/{id}',[UsersController::class,'updateSeller'])->name('admin.user.update.seller');
    Route::delete('/user/seller/delete/{id}',[UsersController::class,'deleteSeller'])->name('admin.user.delete.seller');

    Route::get('project/create', [ProjectController::class,'create'])->name('admin.project.create');
    Route::post('project/store', [ProjectController::class,'store'])->name('admin.project.store');
    Route::get('projects', [ProjectController::class,'index'])->name('admin.project.index');
    Route::get('project/edit/{id}', [ProjectController::class,'edit'])->name('admin.project.edit');
    Route::post('project/update/{id}', [ProjectController::class,'update'])->name('admin.project.update');
    Route::delete('project/delete', [ProjectController::class,'delete'])->name('admin.project.delete');

    Route::get('property/create', [PropertyController::class,'create'])->name('admin.property.create');
    Route::get('properties', [PropertyController::class,'index'])->name('admin.properties');
    Route::get('get_property', [PropertyController::class,'getProperty'])->name('admin.property.get_property');
    Route::post('property/store',[PropertyController::class,'store'])->name('admin.property.store');
    Route::get('property/edit/{id}', [PropertyController::class,'edit'])->name('admin.property.edit');
    Route::post('property/update/{id}',[PropertyController::class,'update'])->name('admin.property.update');
    Route::delete('property/delete',[PropertyController::class,'delete'])->name('admin.property.delete');
    Route::get('property/approve/{id}',[PropertyController::class,'approve'])->name('admin.property.approve');
    Route::get('property/disapprove/{id}',[PropertyController::class,'disapprove'])->name('admin.property.disapprove');

    Route::get('order/create/',[OrderController::class,'create'])->name('admin.order.create');
    Route::get('orders/',[OrderController::class,'index'])->name('admin.orders');
    Route::get('order/view/{id}',[OrderController::class,'show'])->name('admin.order.view');
    Route::get('get_orders',[OrderController::class,'getOrders'])->name('admin.order.get_orders');
    Route::get('order/get/property/{project_id}',[OrderController::class,'getProperty']);
    Route::post('order/store/',[OrderController::class,'store'])->name('admin.order.store');
    Route::delete('order/delete/',[OrderController::class,'delete'])->name('admin.order.delete');
    Route::post('order/status/{id}',[OrderController::class,'changeOrderStatus'])->name('admin.order.status');
    Route::post('order/payment_status/{id}',[OrderController::class,'changePaymentStatus'])->name('admin.order.payment_status');
    Route::get('generate/order/invoice/{id}',[OrderController::class,'getOrderInvoice'])->name('admin.order.invoice');
    Route::get('send/order/confirmation/{id}',[OrderController::class,'sendConfirmation'])->name('admin.order.confirmation');

    Route::get('active/order',[OrderController::class,'active'])->name('admin.order.active');
    Route::get('active_orders',[OrderController::class,'activeOrders'])->name('admin.get.active_orders');
    Route::get('transaction/create/{id}',[TransactionController::class,'create'])->name('admin.transaction.create');
    Route::get('transactions',[TransactionController::class,'index'])->name('admin.transactions');
    Route::get('transaction/view/{id}',[TransactionController::class,'show'])->name('admin.transaction.show');
    Route::delete('/delete/transaction/{id}',[TransactionController::class,'delete'])->name('admin.transaction.delete');
    Route::get('get_transactions',[TransactionController::class,'getTransactions'])->name('admin.transaction.get_transactions');
    Route::get('send/payment/confirmation/{id}',[TransactionController::class,'paymentConfirmation'])->name('admin.payment.confirmation');
    Route::post('transaction/store',[TransactionController::class,'store'])->name('admin.transaction.store');
    Route::get('generate/payment/invoice/{id}',[TransactionController::class,'paymentInvoice'])->name('admin.payment.invoice');

    Route::get('expense/create',[ExpenditureController::class,'create'])->name('admin.expense.create');
    Route::get('expenditures',[ExpenditureController::class,'index'])->name('admin.expenditures');
    Route::get('expense/show/{id}',[ExpenditureController::class,'show'])->name('admin.expense.show');
    Route::get('expense/edit/{id}',[ExpenditureController::class,'edit'])->name('admin.expense.edit');
    Route::post('expense/store',[ExpenditureController::class,'store'])->name('admin.expense.store');
    Route::post('expense/update/{id}',[ExpenditureController::class,'update'])->name('admin.expense.update');
    Route::delete('expense/delete/{id}',[ExpenditureController::class,'delete'])->name('admin.expense.delete');
    Route::get('expense/disapprove/{id}',[ExpenditureController::class,'disapprove'])->name('admin.expense.disapprove');
    Route::get('expense/approve/{id}',[ExpenditureController::class,'approve'])->name('admin.expense.approve');

    Route::get('employees',[EmployeeController::class,'index'])->name('admin.employees');
    Route::get('create/employee',[EmployeeController::class,'create'])->name('admin.employee.create');
    Route::get('edit/employee/{id}',[EmployeeController::class,'edit'])->name('admin.employee.edit');
    Route::post('store/employee',[EmployeeController::class,'store'])->name('admin.employee.store');
    Route::post('update/employee/{id}',[EmployeeController::class,'update'])->name('admin.employee.update');
    Route::delete('delete/employee/{id}',[EmployeeController::class,'delete'])->name('admin.employee.delete');

    Route::get('contacts',[ContactController::class,'index'])->name('admin.contacts');
    Route::get('get/contacts',[ContactController::class,'getContacts'])->name('admin.get_contacts');
    Route::get('contact/view/{id}',[ContactController::class,'show'])->name('admin.contact.view');
    Route::post('contact/status/{id}',[ContactController::class,'status'])->name('admin.contact.status');
    Route::delete('contact/delete/{id}',[ContactController::class,'delete'])->name('admin.contact.delete');

    Route::get('create/review',[ReviewController::class,'create'])->name('admin.review.create');
    Route::get('reviews',[ReviewController::class,'index'])->name('admin.reviews');
    Route::get('review/edit/{id}',[ReviewController::class,'edit'])->name('admin.review.edit');
    Route::post('store/review',[ReviewController::class,'store'])->name('admin.review.store');
    Route::delete('delete/review',[ReviewController::class,'delete'])->name('admin.review.delete');
    Route::post('update/review/{id}',[ReviewController::class,'update'])->name('admin.review.update');

    Route::get('subscribers',[SubscriberController::class,'index'])->name('admin.subscribers');
    Route::delete('delete/subscriber',[SubscriberController::class,'delete'])->name('admin.subscriber.delete');


    Route::get('create/gallery',[GalleryController::class,'create'])->name('admin.gallery.create');
    Route::get('galleries',[GalleryController::class,'index'])->name('admin.galleries');
    Route::post('store/gallery',[GalleryController::class,'store'])->name('admin.gallery.store');
    Route::delete('delete/gallery',[GalleryController::class,'delete'])->name('admin.gallery.delete');


    Route::get('create/news',[NewsController::class,'create'])->name('admin.news.create');
    Route::post('store/news',[NewsController::class,'store'])->name('admin.news.store');
    Route::get('news',[NewsController::class,'index'])->name('admin.news');
    Route::get('edit/news/{id}',[NewsController::class,'edit'])->name('admin.news.edit');
    Route::post('update/news/{id}',[NewsController::class,'update'])->name('admin.news.update');
    Route::delete('delete/news',[NewsController::class,'delete'])->name('admin.news.delete');



});











