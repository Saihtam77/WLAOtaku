<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog\articles;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles=articles::OrderBy("created_at","desc")->get();
        return view("pages/Blog/LesArticles")->with("articles",$articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.Creation.nouveauxArticles");
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
            
            "titre"=>'required',
            "presentation"=>'required',
            "contenu"=>'required',

            /* image not required */
            "images"=>'image|nullable|max:1999'
        ]);

        /*verification de l'import d'images*/
        if ($request->hasFile("images")) {
            $filenameWithExt=$request->file('images')->getClientOriginalName();
            /* recup le nom du fichier sans l'extension */
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            /* recup le l'extension du fichier */
            $extension=$request->file('images')->getClientOriginalExtension();
            /* stockage de l'image */
            $fileNameToStore=$filename.'_'.time().'.'.$extension;

            $path= $request->file('images')->storeAs('Articles/photos',$fileNameToStore);
        }else{
            $fileNameToStore="noimage.jpg";
        }
        /* Exportation des nouvelles donnée dans la base de donnée */
        $article=new articles;
        $article->titre=$request->input('titre');

        $article->presentation=$request->input('presentation');
        $article->contenu=$request->input('contenu');

        $article->images=$fileNameToStore;

        $article->save();
        return redirect()->route("dashboard")->with('success', 'Nouvel articles ajouter');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article=articles::find($id);
        return view("pages.Blog.Article")->with("article",$article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article=articles::find($id);
        return view("pages.Edit.editArticles")->with("article",$article);
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
            
            "titre"=>'required',
            "presentation"=>'required',
            "contenu"=>'required',
            /* image not required */
            "photo"=>'images|nullable|max:19999'
        ]);

        /*verification de l'import d'images*/
        if ($request->hasFile("images")) {
            $filenameWithExt=$request->file('images')->getClientOriginalName();
            /* recup le nom du fichier sans l'extension */
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            /* recup le l'extension du fichier */
            $extension=$request->file('images')->getClientOriginalExtension();
            /* stockage de l'image */
            $fileNameToStore=$filename.'_'.time().'.'.$extension;

            $path= $request->file('images')->storeAs('Articles/photos',$fileNameToStore);
        }else{
            $fileNameToStore="noimage.jpg";
        }
        /* Exportation des nouvelles donnée dans la base de donnée */
        $article=articles::find($id);
        $article->titre=$request->input('titre');

        $article->presentation=$request->input('presentation');
        $article->contenu=$request->input('contenu');

        $article->images=$fileNameToStore;

        $article->save();
        return redirect()->route("dashboard")->with('success', 'Article mise à jours');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article=articles::find($id);
        $article->delete();
        return redirect()->route("accueil")->with('success', 'Articles supprimer');
    }
}
