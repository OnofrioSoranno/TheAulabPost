<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;

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
// HOME
Route::get('/', [PublicController::class, 'home'])->name('home');
// PAGINA REGISTRAZIONE
Route::get('/register', [PublicController::class, 'register'])->name('register');
// PAGINA LOGIN
Route::get('/login', [PublicController::class, 'login'])->name('login');
//VISTA CREA ARTICOLO
Route::get('/article/create', [ArticleController::class, 'create'])->name('create');
//rotta store articolo
Route::post('/article/store', [ArticleController::class,'store'])->name('article.store');
//index degli articoli
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
// show degli articoli 
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');
//filtro per categoria
Route::get('/article/category/{category}', [ArticleController::class, 'byCategory'])->name('article.byCategory');
// filtro per utente
Route::get('/article/user/{user}', [ArticleController::class, 'byUser'])->name('article.byUser');
//lavora con noi
Route::get('/careers', [PublicController::class, 'careers'])->name('careers');