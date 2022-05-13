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


Auth::routes();

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');


Route::group(['middleware' => 'auth'],function (){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/change-password', [App\Http\Controllers\PasswordChangeController::class, 'change'])->name('change-password');
    Route::post('/change-data-user', [App\Http\Controllers\ChangeUserData::class, 'change'])->name('change-data-user');
    Route::post('/questionnaire', [App\Http\Controllers\QuestionnaireController::class, 'pass'])->name('questionnaire');
});
