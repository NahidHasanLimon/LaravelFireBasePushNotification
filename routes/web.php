<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/send-web-push-notificaiton', [UserController::class, 'index'])->name('send-push.notificaiton');

Route::post('/save-device-token', [UserController::class, 'saveDeviceToken'])->name('save-device.token');
Route::post('/send-notification', [UserController::class, 'sendNotification'])->name('send.notification');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', function () {

    return view('home');
})->name('home');