<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\Animes\AnimesController;
use App\Http\Controllers\Animes\CategoriesController;
use App\Http\Controllers\Animes\EpisodesController;
use App\Http\Controllers\Animes\SeasonalsController;
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

/* Route de base pour l'affiche et l'acces au pages du site */
Route::get('/',[AccueilController::class,'index'])->name("accueil");

Route::get('/Les_Evenements',[EvenementsController::class,'index'])->name("LesEvenements");
Route::get('/Les_Articles',[ArticlesController::class,'index'])->name("LesArticles");


Route::get('/Les_Seasonals',[SeasonalsController::class,'index'])->name("LesSeasonals");
Route::get('/Les_Animes',[AnimesController::class,'index'])->name("LesAnimes");

//Route pour la barre de recherche
Route::get("/Les_Animes/search",[AnimesController::class,'search'])->name("Anime_search");

/* mise en place de ressource */
Route::resource("les_evenements",EvenementsController::class);
Route::resource("les_articles",ArticlesController::class);

Route::resource("les_seasonals",SeasonalsController::class);
Route::resource("les_animes",AnimesController::class);
Route::resource("les_episodes",EpisodesController::class);
Route::resource("les_categories",CategoriesController::class);

/* route pour le back-office */
Route::middleware(['auth',"role:admin"])->group(function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/dashboard/cree_un_evenements',[EvenementsController::class,"create"])->name("nouvelEvenement");
    Route::get('/dashboard/cree_un_article',[ArticlesController::class,"create"])->name("nouvelArticle");

    Route::get('/dashboard/ajouter_une_seasonal',[SeasonalsController::class,"create"])->name("newSeasonal");
    Route::get('/dashboard/ajouter_un_anime_HorsSeasonal/',[AnimesController::class,"create"])->name("nouvelAnime_HS");
    Route::get('/dashboard/ajouter_une_categorie/',[CategoriesController::class,"create"])->name("nouvelCategorie");  
});
    
Route::middleware(['auth'])->group(function(){
    Route::get('/profil', function () {
        return view('pages/Profil');
    })->name('profil');
});

require __DIR__.'/auth.php';
