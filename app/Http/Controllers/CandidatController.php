<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Formation;
use Illuminate\Http\Request;

class CandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidats = Candidat::orderBy('id','desc')->paginate(5);
        return view('candidats.index', compact('candidats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formations = Formation::all();
       
        return view('candidats.create',['formations'=>$formations]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     
    public function store(Request $request)
    {
        $candidats = Candidat::all();
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'age' => 'required',
            'niveauEtude' => 'required',
            'sexe' => 'required'
        ]);
        
        Candidat::create($request->post());
        $candidats = Candidat::where('nom', $request->input('nom'))->first();
        $candidat_id = $candidats->id;
        $candidats = Candidat::find($candidat_id);
        $candidats->formations()->attach($request->input('formation_id'));
        return redirect()->route('candidats.index')->with('success','Candidat cree avec succes.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('candidats.show',compact('candidats'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidat $candidat)
    {
        $candidats = Candidat::orderBy('id','desc')->paginate(5);
        return view('candidats.edit',compact('candidat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidat $candidat)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'age' => 'required',
            'niveauEtude' => 'required',
            'sexe' => 'required'
        ]);

        $candidat->fill($request->post())->save();

        return redirect()->route('candidats.index')->with('success','Le candidat a été mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidat $candidat)
    {
        $candidat->delete();
        return redirect()->route('candidats.index')->with('success','Le candidats a été supprimé avec succès');
    }
}
