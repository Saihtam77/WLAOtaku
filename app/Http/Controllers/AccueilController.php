<?php

namespace App\Http\Controllers;

use App\Models\Animes\animes;
use App\Models\Animes\episodes;
use App\Models\Animes\seasonals;
use App\Models\Blog\articles;
use App\Models\Blog\evenements;
use Illuminate\Http\Request;

class AccueilController extends Controller
{   
    /* import des donner en direction de la page d'accueil */
    public function index()
    {
        /* import des table concernant le blog */
        $evenements=evenements::OrderBy('created_at','desc')->limit(5)->get();
        $articles=articles::OrderBy('created_at','desc')->limit(5)->get();

        /* import des table concernant les animes */
        $seasonals=seasonals::OrderBy('created_at','desc')->limit(4)->get();
        $animes=animes::OrderBy('created_at','desc')->get();
        $episodes=episodes::OrderBy('created_at','desc')->limit(15)->get();

        return view("pages.accueil",[
            
            "evenements"=>$evenements,
            "articles"=>$articles,
            
            "seasonals"=>$seasonals,
            "animes"=>$animes,
            "episodes"=>$episodes
        ]);
        
    }
}
