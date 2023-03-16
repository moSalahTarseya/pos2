<?php

use App\Http\Controllers\Front\Auth\SocialiteController;
use App\Http\Controllers\Front\ConsultationController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\MeetingController;
use App\Mail\MeetingMail;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
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

Auth::routes([ 'verify'=> true]);

Route::get('/lang', ['as'=>'front','uses'=>'LangController@index'])->name('.lang');


Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::post('/profile/{id}/update', [HomeController::class, 'updateProfile'])->name('front.profile-update');


Route::group(['middleware' => 'auth:web'], function () {
    Route::get('/profile', [HomeController::class, 'profile'])->name('front.profile');

});
