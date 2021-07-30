<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\AuthorsController;
use App\Http\Controllers\Admin\BooksController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\Front\AuthorsController as FrontAuthorsController;
use App\Http\Controllers\Front\BookController;
use App\Http\Controllers\Front\CategoriesController as FrontCategoriesController;
use App\Http\Controllers\Front\HomeController;
use App\Models\Message;

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

Route::get('/', [HomeController::class,'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','type.user:admin,super-admin'])->name('dashboard');

require __DIR__.'/auth.php';

Route::prefix('admin')
->namespace('admin')
->as('admin.')
->middleware('auth','type.user:admin,super-admin')
->group(function(){
Route::resource('categories','CategoriesController');
Route::resource('authors','AuthorsController');
Route::resource('books','BooksController');
Route::resource('users','UsersController');
Route::resource('roles','RolesController');
Route::get('messages',[MessageController::class,'index'])->name('message');
Route::get('messages/{slug}',[MessageController::class,'show'])->name('message.details');
});


/* Front Route */
Route::get('categories',[FrontCategoriesController::class,'index'])->name('categories');
Route::get('categories/{slug}',[FrontCategoriesController::class,'show'])->name('show.categories');
Route::get('authors',[FrontAuthorsController::class,'index'])->name('authors');
Route::get('authors/{slug}',[FrontAuthorsController::class,'show'])->name('show.authors');
Route::get('books/{slug}',[BookController::class,'show'])->name('show.book');
Route::get('books/download/{slug}',[BookController::class,'downloadBook'])->name('download.book');
Route::get('search',[FrontAuthorsController::class,'search'])->name('search');
Route::get('contact-us', [HomeController::class,'contactUs'])->name('contact-us');
Route::post('contact-us/save', [HomeController::class,'storeMessage'])->name('contact-us.save');