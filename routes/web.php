<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Models\User;
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


// Routes Guide
// controllername => index **eg: Academicyearfile :: index
// defaultci => dashboard ** defaultci for globalfunctions
# Controller function

// index - Display a listing of the resource.
// create - Show the form for creating a new resource.
// store - Store a newly created resource in storage.
// show - Display the specified resource.
// edit - Show the form for editing the specified resource.
// update - Update the specified resource in storage.
// destroy - Remove the specified resource from storage.
// exportUser - Export selected resource to excel
// importUser - Import the selected excel file from resource

Route::controller(LoginController::class)->group(function() {
    Route::get("/", 'index');
    Route::get("/login", 'index');
    Route::post("/login/process", "process");
});

Route::controller(UserController::class)->group(function() {
    Route::get('/users/{isactive?}', 'index')->middleware('auth');
    Route::get('/user/create', 'create');
    Route::post('/user/store', 'store');
    Route::get('/user/edit/{id}', 'edit');
    Route::put('/user/update/{user}', 'update');
    Route::delete('/user/destroy/{user}', 'destroy');
});
