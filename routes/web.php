<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

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
// Form ruolo utente
Route::post('/careers/submit', [PublicController::class, 'careersSubmit'])->name('careersSubmit');
// ROTTE WRITER 
Route::middleware('writer')->group(function(){
    //VISTA CREA ARTICOLO
    Route::get('/article/create', [ArticleController::class, 'create'])->name('create');
    //rotta store articolo
    Route::post('/article/store', [ArticleController::class,'store'])->name('article.store');
});
// Rotte admin 
Route::middleware('admin')->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // rotta rendi admin 
    Route::get('/admin/{user}/set-admin', [AdminController::class, 'setAdmin'])->name('admin.setAdmin');
    // rotta rendi revisore
    Route::get('/admin/{user}/set-revisor', [AdminController::class, 'setRevisor'])->name('admin.setRevisor');
    // rotta rendi redattore 
    Route::get('/admin/{user}/set-writer', [AdminController::class, 'setWriter'])->name('admin.setWriter');
    Route::put('/admin/edit/{tag}/tag', [AdminController::class, 'editTag'])->name('admin.editTag');
    Route::delete('/admin/delete/{tag}/tag', [AdminController::class, 'deleteTag'])->name('admin.deleteTag');
    Route::put('/admin/edit/{category}/category', [AdminController::class, 'editCategory'])->name('admin.editCategory');
    Route::delete('/admin/delete/{category}/category', [AdminController::class, 'deleteCategory'])->name('admin.deleteCategory');
    Route::post('/admin/category/store', [AdminController::class, 'storeCategory'])->name('admin.storeCategory');
});
    Route::put('/admin/edit/{tag}/tag', [AdminController::class, 'editTag'])->name('admin.editTag');
// ROTTE REVISORE
Route::middleware('revisor')->group(function()
{
    Route::get('/revisor/dashboard', [RevisorController::class, 'dashboard'])->name('revisor.dashboard');
    // ACCETTA ARTICOLO
    Route::get('/revisor/{article}/accept', [RevisorController::class, 'acceptArticle'])->name('revisor.acceptArticle');
    // RIFIUTA ARTICOLO 
    Route::get('/revisor/{article}/reject', [RevisorController::class, 'rejectArticle'])->name('revisor.reject');
    // RIMANDA A REVISIONE L'ARTICOLO
    Route::get('/revisor/{article}/undo', [RevisorController::class, 'undoArticle'])->name('revisor.undo');
});
// BARRA DI RICERCA
Route::get('/article/search', [ArticleController::class, 'articleSearch'])->name('article.search');