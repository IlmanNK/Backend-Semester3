<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// // methode get
Route::get('/animals', [AnimalController::class, 'index']);

//methode post
Route::post('/animals', [AnimalController::class, 'store']);

//methode put
Route::put('/animals/{id}', [AnimalController::class, "update"]);

//methode delete
Route::delete('/animals/{id}', [AnimalController::class, "destroy"]);



// Untuk Student Pertemuan 5
// Untuk menampilkan seluruh siswa
Route::get("/student",[StudentController::class,"index"]);

// Untuk menambahkan data
Route::post("/student", [StudentController::class, "store"]);

// Untuk mengupdate data siswa
Route::put("/student/{id}", [StudentController::class, "update"]);

// untuk menghapus data siswa
Route::delete("/student/{id}", [StudentController::class, "destroy"]);

// untuk menampilkan detail data siswa
Route::get("/student/{id}", [StudentController::class, "show"]);