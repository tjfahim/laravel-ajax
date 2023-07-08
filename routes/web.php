<?php

use App\Http\Controllers\StudentController;
use App\Models\student;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/students',[StudentController::class,'index']);
Route::post('/students',[StudentController::class,'store']);

Route::get('/', function () {
    return view('welcome');
});
