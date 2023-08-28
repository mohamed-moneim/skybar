<?php

use Illuminate\Support\Facades\Route;
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


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\restaurant;


Route::group(["prefix"=>"","middleware"=>['LanguageManager','web']],function()
{

Auth::routes();

Route::get('/admin',[LoginController::class,'showAdminLoginForm'])->name('admin.login-view');
Route::post('/admin',[LoginController::class,'adminLogin'])->name('admin.login');

Route::get('/admin/register',[RegisterController::class,'showAdminRegisterForm'])->name('admin.register-view');
Route::post('/admin/register',[RegisterController::class,'createAdmin'])->name('admin.register');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/dashboard',function(){
    return view('admin');
})->middleware('auth:admin');
Route::get('/addrestaurant', [App\Http\Controllers\restaurant::class, 'index'])->name('addrestaurant');
Route::post('/addimg', [App\Http\Controllers\restaurant::class, 'addimg'])->name('addimg');
Route::post('/addvideo', [App\Http\Controllers\restaurant::class, 'addvideo'])->name('addvideo');
Route::post('/uploadrestaurant', [App\Http\Controllers\restaurant::class, 'uploadrestaurant'])->name('uploadrestaurant');
Route::post('/uploadcategory', [App\Http\Controllers\restaurant::class, 'uploadcategory'])->name('uploadcategory');
Route::get('/categories', [App\Http\Controllers\restaurant::class, 'categories'])->name('categories');
Route::post('/updatecategory', [App\Http\Controllers\restaurant::class, 'updatecategory'])->name('updatecategory');
Route::post('/ordercategory', [App\Http\Controllers\restaurant::class, 'ordercategory'])->name('ordercategory');
Route::get('/deletecat/{id}', [App\Http\Controllers\restaurant::class, 'deletecat'])->name('deletecat');
Route::get('/food', [App\Http\Controllers\restaurant::class, 'food'])->name('food');
Route::post('/uploadfood', [App\Http\Controllers\restaurant::class, 'uploadfood'])->name('uploadfood');
Route::post('/updatefood', [App\Http\Controllers\restaurant::class, 'updatefood'])->name('updatefood');
Route::get('/deletefood/{id}', [App\Http\Controllers\restaurant::class, 'deletefood'])->name('deletefood');

Route::get('/bar', [App\Http\Controllers\restaurant::class, 'bar'])->name('bar');
Route::post('/uploadbar', [App\Http\Controllers\restaurant::class, 'uploadbar'])->name('uploadbar');
Route::post('/updatebar', [App\Http\Controllers\restaurant::class, 'updatebar'])->name('updatebar');
Route::get('/deletebar/{id}', [App\Http\Controllers\restaurant::class, 'deletebar'])->name('deletebar');

Route::get('/shisha', [App\Http\Controllers\restaurant::class, 'shisha'])->name('shisha');
Route::post('/uploadshisha', [App\Http\Controllers\restaurant::class, 'uploadshisha'])->name('uploadshisha');
Route::post('/updateshisha', [App\Http\Controllers\restaurant::class, 'updateshisha'])->name('updateshisha');
Route::get('/deleteshisha/{id}', [App\Http\Controllers\restaurant::class, 'deleteshisha'])->name('deleteshisha');
Route::get('/events', [App\Http\Controllers\restaurant::class, 'events'])->name('events');
Route::post('/uploadevent', [App\Http\Controllers\restaurant::class, 'uploadevent'])->name('uploadevent');
Route::post('/updateevent', [App\Http\Controllers\restaurant::class, 'updateevent'])->name('updateevent');
Route::get('/eventtables/{id}', [App\Http\Controllers\restaurant::class, 'eventtables'])->name('eventtables');

Route::get('/deleteevent/{id}', [App\Http\Controllers\restaurant::class, 'deleteevent'])->name('deleteevent');

Route::get('/tables', [App\Http\Controllers\restaurant::class, 'tables'])->name('tables');
Route::post('/uploadtable', [App\Http\Controllers\restaurant::class, 'uploadtable'])->name('uploadtable');
Route::post('/updatetable', [App\Http\Controllers\restaurant::class, 'updatetable'])->name('updatetable');
Route::get('/deletetable/{id}', [App\Http\Controllers\restaurant::class, 'deletetable'])->name('deletetable');
Route::get('/download/{id}', [App\Http\Controllers\restaurant::class, 'download'])->name('down');
Route::get('/offers', [App\Http\Controllers\restaurant::class, 'offers'])->name('offers');
Route::post('/uploadoffer', [App\Http\Controllers\restaurant::class, 'uploadoffer'])->name('uploadoffer');
Route::post('/updateoffer', [App\Http\Controllers\restaurant::class, 'updateoffer'])->name('updateoffer');
Route::get('/activeoffer/{id}', [App\Http\Controllers\restaurant::class, 'activeoffer'])->name('activeoffer');
Route::get('/deleteoffer/{id}', [App\Http\Controllers\restaurant::class, 'deleteoffer'])->name('deleteoffer');

Route::get('/social', [App\Http\Controllers\restaurant::class, 'social'])->name('social');
Route::post('/uploadsocial', [App\Http\Controllers\restaurant::class, 'uploadsocial'])->name('uploadsocial');
Route::post('/updatesocial', [App\Http\Controllers\restaurant::class, 'updatesocial'])->name('updatesocial');
Route::get('/deletesocial/{id}', [App\Http\Controllers\restaurant::class, 'deletesocial'])->name('deletesocial');

Route::get('/menu/{id}/{type}', [App\Http\Controllers\restaurant::class, 'menu'])->name('menu');
Route::get('/bar/{id}/{type}', [App\Http\Controllers\restaurant::class, 'barmenu'])->name('barmenu');
Route::get('/shisha/{id}/{type}', [App\Http\Controllers\restaurant::class, 'shishamenu'])->name('shishamenu');

Route::post('/adduser', [App\Http\Controllers\restaurant::class, 'adduser'])->name('adduser');
Route::post('/addeventuser', [App\Http\Controllers\restaurant::class, 'addeventuser'])->name('addeventuser');
Route::get('/restevents/{id}', [App\Http\Controllers\restaurant::class, 'restevents'])->name('restevents');
Route::get('/restusers/{id}', [App\Http\Controllers\restaurant::class, 'restusers'])->name('restusers');
Route::get('/eventusers/{id}', [App\Http\Controllers\restaurant::class, 'eventusers'])->name('eventusers');




Route::get('/', function () {
    return view('welcome');
});
Route::get('/getrest', [App\Http\Controllers\restaurant::class, 'getrest'])->name('getrest');
Route::get('/profile/{id}', [App\Http\Controllers\restaurant::class, 'profile'])->name('profile');
Route::get('/getitemsbycat/{id}/{type}', [App\Http\Controllers\restaurant::class, 'getitemsbycat'])->name('getitemsbycat');
Route::get('/getevent/{id}', [App\Http\Controllers\restaurant::class, 'getevent'])->name('getevent');
Route::get('/eventslist/{id}', [App\Http\Controllers\restaurant::class, 'eventslist'])->name('eventslist');
Route::get('/offerslist/{id}', [App\Http\Controllers\restaurant::class, 'offerslist'])->name('offerslist');
Route::get('/locale/{locale}', [App\Http\Controllers\restaurant::class, 'setlang'])->name('setlang')->middleware("LanguageManager");
Route::get('/setting', [App\Http\Controllers\restaurant::class, 'setting'])->name('setting');
Route::post('/addsett', [App\Http\Controllers\restaurant::class, 'addsett'])->name('addsett');
Route::post('/arrange', [App\Http\Controllers\restaurant::class, 'arrange'])->name('arrange');
Route::get('/disablerest/{id}', [App\Http\Controllers\restaurant::class, 'disablerest'])->name('disablerest');

});