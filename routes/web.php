<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    //Admins Routes
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    Route::get('/admin/admins', [AdminController::class, 'index'])->name('admins');

    Route::get('/admin/addAdmin', [AdminController::class, 'create'])->name('addAdmin');

    Route::post('/admin/storeAdmin', [AdminController::class, 'store'])->name('storeAdmin');

    Route::get('/admin/editAdmin/{id}', [AdminController::class, 'edit'])->name('editAdmin');

    Route::put('/admin/updateAdmin/{id}', [AdminController::class, 'update'])->name('updateAdmin');

    Route::get('/admin/removeAdmin/{id}', [AdminController::class, 'destroy'])->name('removeAdmin');

    //Users Routes

    Route::get('/admin/users', [UserController::class, 'index'])->name('users');

    Route::get('/admin/addUser', [UserController::class, 'create'])->name('addUser');

    Route::post('/admin/storeUser', [UserController::class, 'store'])->name('storeUser');

    Route::get('/admin/editUser/{id}', [UserController::class, 'edit'])->name('editUser');

    Route::put('/admin/updateUser/{id}', [UserController::class, 'update'])->name('updateUser');

    Route::get('/admin/removeUser/{id}', [UserController::class, 'destroy'])->name('removeUser');

    //Tables Routes

    Route::get('/admin/tables', [TableController::class, 'index'])->name('tables');

    Route::get('/admin/editTable/{id}', [TableController::class, 'edit'])->name('editTable');

    Route::put('/admin/updateTable/{id}', [TableController::class, 'update'])->name('updateTable');

    Route::get('/admin/removeTable/{id}', [TableController::class, 'destroy'])->name('removeTable');

    // Categories Routes

    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('categories');

    Route::get('/admin/addCategory', [CategoryController::class, 'create'])->name('addCategory');

    Route::post('/admin/storeCategory', [CategoryController::class, 'store'])->name('storeCategory');

    Route::get('/admin/editCategory/{category}', [CategoryController::class, 'edit'])->name('editCategory');

    Route::put('/admin/updateCategory/{category}', [CategoryController::class, 'update'])->name('updateCategory');

    Route::get('/admin/removeCategory/{category}', [CategoryController::class, 'destroy'])->name('removeCategory');

    //Items Routes

    Route::get('/admin/items', [ItemsController::class, "index"])->name('items');

    Route::get('/admin/addItem', [ItemsController::class, "create"])->name('addItem');

    Route::post('/admin/storeItem', [ItemsController::class, "store"])->name('storeItem');

    Route::get('/admin/editItem/{id}', [ItemsController::class, "edit"])->name('editItem');

    Route::put('/admin/updateItem/{id}', [ItemsController::class, "update"])->name('updateItem');

    Route::get('/admin/removeItem/{id}', [ItemsController::class, "destroy"])->name('removeItem');
});



Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('login', [LoginController::class, 'login']);

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');

Route::post('register', [RegisterController::class, 'register']);



Route::get('/', [MenuController::class, 'index'])->name('index');

Route::get('/menu', [MenuController::class, 'menu'])->name('menu');

Route::get('/about', function () {
    return view('restaurant.about');
})->name('about');

Route::get('/book', [TableController::class, 'create'])->name('createTable');

Route::post('/book/store', [TableController::class, 'store'])->name('storeTable');


//Log in Routes



require __DIR__ . '/auth.php';
