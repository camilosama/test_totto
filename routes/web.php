<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormsController;


Route::get('/', [FormsController::class, 'login']);
Route::post('/totto/frmValidateUser', [FormsController::class, 'frmValidateUser']);
Route::get('/totto/sing_in', [FormsController::class, 'singIn']);
Route::get('/totto/edit_profile', [FormsController::class, 'editProfile']);
Route::post('/totto/sing_in', [FormsController::class, 'singInSave']);
Route::post('/totto/edit_profile', [FormsController::class, 'editProfileSave']);



