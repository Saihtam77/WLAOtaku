<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\Animes\AnimesController;
use App\Http\Controllers\Animes\CategoriesController;
use App\Http\Controllers\Animes\EpisodesController;
use App\Http\Controllers\Blog\ArticlesController;
use App\Http\Controllers\Blog\EvenementsController;
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

Route::get('/',[AccueilController::class,'index'])->name("accueil");
Route::get('/Les_Evenements',[EvenementsController::class,'index'])->name("LesEvenements");
Route::get('/Les_Animes',[AnimesController::class,'index'])->name("LesAnimes");


Route::resource("les_evenements",EvenementsController::class);
Route::resource("les_articles",ArticlesController::class);

Route::resource("les_animes",AnimesController::class);
Route::resource("les_episodes",EpisodesController::class);
Route::resource("les_categories",CategoriesController::class);

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/dashboard/cree_un_evenements',[EvenementsController::class,"create"])->name("nouvelEvenement");
    Route::get('/dashboard/cree_un_article',[ArticlesController::class,"create"])->name("nouvelArticle");
});

require __DIR__.'/auth.php';
