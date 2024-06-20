<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\ReligionController;
use App\Http\Controllers\API\EchelonController;
use App\Http\Controllers\API\GroupController;
use App\Http\Controllers\API\EmployeeController;

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);


Route::middleware('auth:api')->group( function () {
    Route::resource('religions', ReligionController::class);
    Route::resource('groups', GroupController::class);
    Route::resource('echelons', EchelonController::class);
    Route::resource('employees', EmployeeController::class);
    Route::get('getCities',[ RegisterController::class, 'getCities' ]);
    Route::post('employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');

});

