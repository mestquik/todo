<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\todolar;
use App\Models\User;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::get('/downloads', function () {
    return view('downloads');
})->middleware(['auth', 'verified'])->name('downloads');










Route::get('/done', [\App\Http\Controllers\todoController::class, 'Done'])->name('done');


//CREATE
Route::post('/todo/create', [\App\Http\Controllers\todoController::class, 'todoCreate'])->middleware(['auth', 'verified'])->name('createPost');
Route::get('/todo/create', [\App\Http\Controllers\todoController::class, 'goToCreate'])->middleware(['auth', 'verified'])->name('create');


///DELETE
Route::delete('/done/{id}', [\App\Http\Controllers\todoController::class, 'delete'])->middleware(['auth', 'verified'])->name('delete');
//OKEY-TAMAMLANDI
Route::get('/todo/okey/{id}', [\App\Http\Controllers\todoController::class, 'okey'])->middleware(['auth', 'verified'])->name('okey');
//DEVAM ET
Route::get('/todo/continue/{id}', [\App\Http\Controllers\todoController::class, 'continue'])->middleware(['auth','verified'])->name('continue');



//UPDATE
Route::get('/todo/update/{id}', function ($id) {

    $kullanicilar = todolar::whereId($id)->get();

    return view('update', compact('kullanicilar'));
})->
middleware(['auth', 'verified'])->name('update');
Route::post('/todo/update{id}', [\App\Http\Controllers\todoController::class, 'UpdatePost'])->middleware(['auth', 'verified'])->name('UpdatePost');


//CONTENT
Route::get('/todo/content/{id}', [\App\Http\Controllers\todoController::class, 'content'])->middleware(['auth', 'verified'])->name('content');


//COMPLETED
Route::get('/todo/completed', [\App\Http\Controllers\todoController::class, 'completed'])->middleware(['auth', 'verified'])->name('completed');

///////////////USER/////////
//USER LIST
Route::get('/todo/users', [\App\Http\Controllers\Auth\RegisterUsersController::class, 'EditUser'])->middleware(['auth', 'verified'])->name('users');

//CREATE USER
Route::get('/createUser', [\App\Http\Controllers\Auth\RegisterUsersController::class, 'createUser'])->middleware(['auth', 'verified'])->name('createUser');
Route::post('/createUser', [\App\Http\Controllers\Auth\RegisterUsersController::class, 'createUserPost'])->middleware(['auth', 'verified'])->name('createUserPost');


//UPDATE USER
Route::get('/users/update/{id}',[\App\Http\Controllers\Auth\RegisterUsersController::class,'GotoUpdateUsers'])->
middleware(['auth', 'verified'])->name('updateUsers');
Route::post('/users/update{id}', [\App\Http\Controllers\Auth\RegisterUsersController::class,'UpdateUser'])->middleware(['auth', 'verified'])->name('UpdateUsersPost');


//DELETE USER
Route::delete('/users/delete{id}', [\App\Http\Controllers\Auth\RegisterUsersController::class,'DeleteUser'])->middleware(['auth', 'verified'])->name('DeleteUser');



Route::get('/users/status', [\App\Http\Controllers\Auth\RegisterUsersController::class,'status'])->middleware(['auth', 'verified'])->name('status');
//Route::get('/users/status', [\App\Http\Controllers\Auth\RegisterUsersController::class,'status2'])->middleware(['auth', 'verified'])->name('status2');


















