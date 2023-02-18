<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Referentiel;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formations = Formation::orderBy('id','desc')->paginate(5);
        
        return view('formations.index', compact('formations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $referentiels = Referentiel::all();
        return view('formations.create', compact('referentiels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'duree' => 'required',
            'description' => 'required',
            'isStarted' => 'required',
            'dateDebut' => 'required'
        ]);
        Formation::create($request->post());
        return redirect()->route('formations.index')->with('success','Formation cree avec succes.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $formations = Formation::all();
        return view('formations.show',compact('formations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Formation $formation)
    {
        $formations = Formation::orderBy('id','desc')->paginate(5);
        return view('formations.edit',compact('formation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Formation $formation)
    {
        $request->validate([
            'nom' => 'required',
            'duree' => 'required',
            'description' => 'required',
            'isStarted' => 'required',
            'dateDebut' => 'required',
            'referentiel_id' => 'required'
        ]);

        $formation->fill($request->post())->save();

        return redirect()->route('$formations.index')->with('success','La formation a été mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formation $formation)
    {
        $formation->delete();
        return redirect()->route('formation.index')->with('success','La formation a été supprimé avec succès');
    }
}
