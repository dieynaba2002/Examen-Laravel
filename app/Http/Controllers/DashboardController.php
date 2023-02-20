<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Formation;
use App\Models\Referentiel;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countByFormation = Formation::withCount('candidat')->get();
        $countByReferentiel = Referentiel::withCount('formations')->get();
        $candidats_masculins = Candidat::where('sexe', 'masculin')->get();
        $candidats_feminins = Candidat::where('sexe', 'feminin')->get();
        $repartition_formations  = Type::with('referentiels.formations')->whereIn('libelle', ['initiation', 'metier'])->get(); 
        $ages = DB::table('candidats')->select('age', DB::raw('count(*) as total'))->groupBy('age')->orderBy('age')->get();
        $formationsEnCours = Formation::where('isStarted', true)->count();
        $formationsEnAttente = Formation::where('isStarted', false)->count();
        //$formations = DB::table('formations')->select(DB::raw('count(*) as total'), 'isStarted')->groupBy('isStarted')->get();
        


        return view('dashboard.dashboard',
                    ['countByFormation' => $countByFormation, 'candidats_masculins' => $candidats_masculins, 'candidats_feminins' => $candidats_feminins, 'repartition_formations' => $repartition_formations,'ages'=>$ages,'formationsEnCours'=>$formationsEnCours,'formationsEnAttente'=>$formationsEnAttente],
                    ['countByReferentiel' => $countByReferentiel],
                    []);

                    
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
