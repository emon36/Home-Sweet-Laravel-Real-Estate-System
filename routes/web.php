<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SubscriberController;



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


Route::get('/', [WebsiteController::class,'index'])->name('website.home');
Route::get('/contact', [WebsiteController::class,'contact'])->name('website.contact');
Route::get('/services', [WebsiteController::class,'service'])->name('website.service');
Route::get('/gallery', [WebsiteController::class,'gallery'])->name('website.gallery');
Route::get('/projects', [WebsiteController::class,'projects'])->name('website.projects');

Route::post('contact/store', [ContactController::class,'store'])->name('contact.store');
Route::post('subscriber/store', [SubscriberController::class,'store'])->name('subscriber.store');

Route::get('property/list/{id}',[WebsiteController::class,'propertyList'])->name('website.property.list');
Route::get('properties/view/{id}',[WebsiteController::class,'propertiesView'])->name('website.properties.show');
Route::get('projects/view/{id}',[WebsiteController::class,'projectView'])->name('website.project.show');
Route::get('news/view/{id}',[WebsiteController::class,'newsView'])->name('website.news.show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['prefix' => 'user','middleware'=>['auth','user']], function () {
    Route::get('dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    Route::get('bookings', [UserDashboardController::class, 'bookings'])->name('user.booking');
    Route::get('transactions', [UserDashboardController::class, 'transactions'])->name('user.transactions');
    Route::get('profile', [UserDashboardController::class, 'profile'])->name('user.profile');
    Route::get('change_password', [UserDashboardController::class, 'changePassword'])->name('user.changePassword');

    Route::post('profile/update/{id}', [UserDashboardController::class, 'profileUpdate'])->name('user.profile.update');
    Route::post('password/update', [UserDashboardController::class, 'updatePassword'])->name('user.password.update');
});




