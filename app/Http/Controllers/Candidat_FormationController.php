<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Candidat_Formation;
use App\Models\Formation;
use Illuminate\Http\Request;

class Candidat_FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidat_formations = Candidat_formation::all();
        return view('candidat_formations.index', compact('candidat_formations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $candidats = Candidat::all();
        $formations = Formation::all();
        return view('candidat_formations.create',compact('candidats'), compact('formations'));
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
            'candidat_id' => 'required',
            'formation_id' => 'required',
            
        ]);
        
        Candidat_formation::create($request->post());

        return redirect()->route('candidat_formations.index')->with('success','referentiel cree avec succes.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('candidat_formations.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
