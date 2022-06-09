<?php

namespace App\Http\Controllers\Animes;

use App\Http\Controllers\Controller;
use App\Models\Animes\animes;
use App\Models\Animes\seasonals;
use Illuminate\Http\Request;

class SeasonalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seasonals=seasonals::OrderBy("created_at","desc")->get();
        $animes=animes::OrderBy("created_at","desc")->get();
        
        return view("pages.Animes.lesSeasonals",[
            "seasonals"=>$seasonals,
            "animes"=>$animes
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.Creation.newSeasonal");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        /*Verification du remplissage des champs requis*/
        $this->validate($request,[
            
            "seasons"=>'required',
            "date_debut"=>'required',
            "date_fin"=>'required',
        ]);

        /* Exportation des nouvelles donnée dans la base de donnée */
        $seasonals=new seasonals;
        $seasonals->seasons=$request->input('seasons');

        $seasonals->date_debut=$request->input('date_debut');
        $seasonals->date_fin=$request->input('date_fin');

        $seasonals->save();
        return redirect()->route("dashboard")->with('success', 'Nouvel Seasonal ajouter');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seasonal=seasonals::find($id);
        $animes=animes::OrderBy("created_at","desc")->where("seasonals_id",'=',$id)->get();
        return view("pages.Animes.Seasonal",[
            "seasonal"=>$seasonal,
            "animes"=>$animes
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seasonals=seasonals::find($id);
        return view("pages.Edit.editSeasonals")->with("seasonals",$seasonals);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*Verification du remplissage des champs requis*/
        $this->validate($request,[
            
            "seasons"=>'required',
            "date_debut"=>'required',
            "date_fin"=>'required',
        ]);

        /* Exportation des nouvelles donnée dans la base de donnée */
        $seasonals=seasonals::find($id);
        $seasonals->nom=$request->input('seasons');

        $seasonals->date_debut=$request->input('date_debut');
        $seasonals->date_fin=$request->input('date_fin');

        $seasonals->save();
        return redirect()->route("dashboard")->with('success', 'Seasonal mise a jours');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seasonal=seasonals::find($id);
        $seasonal->delete();
        return redirect()->route("LesSeasonals")->with('success', 'Seasonal supprimer');
    }
}
