<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Seller\SellerDashboardController;
use App\Http\Controllers\Seller\CustomerController;
use App\Http\Controllers\Seller\PropertyController;
use App\Http\Controllers\Seller\OrderController;
use App\Http\Controllers\Seller\TransactionController;
use App\Http\Controllers\Seller\ExpenditureController;
use App\Http\Controllers\Seller\ContactController;


Route::group(['prefix' => 'seller','middleware'=>['auth','seller']], function () {
    Route::get('dashboard', [SellerDashboardController::class, 'index'])->name('seller.dashboard');
    Route::get('/profile',[SellerDashboardController::class,'sellerProfile'])->name('seller.profile');
    Route::post('/profile/update/{id}',[SellerDashboardController::class,'sellerProfileUpdate'])->name('seller.profile.update');
    Route::get('customer/create',[CustomerController::class,'create'])->name('seller.customer.create');
    Route::post('customer/store',[CustomerController::class,'store'])->name('seller.customer.store');
    Route::get('customers',[CustomerController::class,'getCustomer'])->name('seller.customers');
    Route::get('customer/edit/{id}',[CustomerController::class,'edit'])->name('seller.customer.edit');
    Route::post('customer/update/{id}',[CustomerController::class,'update'])->name('seller.customer.update');
    Route::delete('customer/delete',[CustomerController::class,'destroy'])->name('seller.customer.delete');

    Route::get('properties', [PropertyController::class, 'index'])->name('seller.properties');
    Route::get('get/properties', [PropertyController::class, 'getProperty'])->name('seller.get_properties');
    Route::get('property/create',[PropertyController::class,'create'])->name('seller.property.create');
    Route::post('property/store',[PropertyController::class,'store'])->name('seller.property.store');
    Route::get('property/edit/{id}',[PropertyController::class,'edit'])->name('seller.property.edit');
    Route::post('property/update/{id}',[PropertyController::class,'update'])->name('seller.property.update');
    Route::delete('property/delete',[PropertyController::class,'delete'])->name('seller.property.delete');


    Route::get('order/create/',[OrderController::class,'create'])->name('seller.order.create');
    Route::get('orders',[OrderController::class,'index'])->name('seller.orders');
    Route::get('get_orders',[OrderController::class,'getOrders'])->name('seller.order.get_orders');
    Route::get('order/get/property/{project_id}',[OrderController::class,'getProperty']);
    Route::post('order/store/',[OrderController::class,'store'])->name('seller.order.store');
    Route::delete('order/delete/',[OrderController::class,'delete'])->name('seller.order.delete');
    Route::get('generate/order/invoice/{id}',[OrderController::class,'getOrderInvoice'])->name('seller.order.invoice');
    Route::get('send/order/confirmation/{id}',[OrderController::class,'sendConfirmation'])->name('seller.order.confirmation');

    Route::get('active/order',[OrderController::class,'active'])->name('seller.order.active');
    Route::get('active_orders',[OrderController::class,'activeOrders'])->name('seller.get.active_orders');
    Route::get('transaction/create/{id}',[TransactionController::class,'create'])->name('seller.transaction.create');
    Route::get('transactions',[TransactionController::class,'index'])->name('seller.transactions');
    Route::get('transaction/view/{id}',[TransactionController::class,'show'])->name('seller.transaction.show');
    Route::delete('/delete/transaction/{id}',[TransactionController::class,'delete'])->name('seller.transaction.delete');
    Route::get('get_transactions',[TransactionController::class,'getTransactions'])->name('seller.transaction.get_transactions');
    Route::get('send/payment/confirmation/{id}',[TransactionController::class,'paymentConfirmation'])->name('seller.payment.confirmation');
    Route::post('transaction/store',[TransactionController::class,'store'])->name('seller.transaction.store');
    Route::get('generate/payment/invoice/{id}',[TransactionController::class,'paymentInvoice'])->name('seller.payment.invoice');

    Route::get('expense/create',[ExpenditureController::class,'create'])->name('seller.expense.create');
    Route::get('expenditures',[ExpenditureController::class,'index'])->name('seller.expense.index');
    Route::get('expense/show/{id}',[ExpenditureController::class,'show'])->name('seller.expense.show');
    Route::get('expense/edit/{id}',[ExpenditureController::class,'edit'])->name('seller.expense.edit');
    Route::post('expense/store',[ExpenditureController::class,'store'])->name('seller.expense.store');
    Route::post('expense/update/{id}',[ExpenditureController::class,'update'])->name('seller.expense.update');
    Route::delete('expense/delete/{id}',[ExpenditureController::class,'delete'])->name('seller.expense.delete');

    Route::get('contacts',[ContactController::class,'index'])->name('seller.contacts');
    Route::get('get/contacts',[ContactController::class,'getContacts'])->name('seller.get_contacts');
    Route::get('contact/view/{id}',[ContactController::class,'show'])->name('seller.contact.view');
    Route::post('contact/status/{id}',[ContactController::class,'status'])->name('seller.contact.status');
    Route::delete('contact/delete/{id}',[ContactController::class,'delete'])->name('seller.contact.delete');





});
