<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Http\Requests\Film as FilmRequest;
use App\Models\Category;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug = null)
    {
        //$films = Film::all();
        $query = $slug ? Category::whereSlug($slug)->firstOrfail()->films() : Film::query();
        $films = $query->oldest('title')->paginate(50);
        $categories = Category::all();

        return view('index',compact('films','categories','slug'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // On attache les catégories des films comme ça l'utilisateur peur choisir
        $categories = Category::all();
        return view('create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FilmRequest $filmRequest)
    {
        Film:: create($filmRequest->all());
        return redirect()->route('films.index')->with('info','Le film a été bien enregisté');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        $category = $film->category;
        return view('show',compact('film','category'));
    }
    
    
     // We can also do like this :
     /*
     * public function show(Film $film)
     *{
     * return view('show', compact('film'));
     * }
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        return view('edit',compact('film'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FilmRequest $filmRequest, Film $film)
    {
        $film->update($filmRequest->all());

        return redirect()->route('films.index')->with('info','Le film a été bien modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $film = Film::find($id);
        $film->delete();
        // Ou bien
        //Film::destroy($id);

        return back()->with('info','Le film a été bien supprimé de la base de données');
    }
}
