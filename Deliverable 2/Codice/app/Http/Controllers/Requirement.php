<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Requirement extends Controller
{
  

    /*
     * Insering a new requirement.
     */
    public function store()
    {
        $Requirement = new \App\Requirement();

        $Requirement->titolodistudio = request( 'titolodistudio');
        $Requirement->anniesperienza = request ( 'anniesperienza');
        $Requirement->eta = request ( 'eta');


        $Requirement->save();

        return response($Requirement);
    }


    /*
     * Display the requirements of an offer.
     */
    public function show($id)
    {
        return \App\Requirement::find( $id );
    }

    /**
     * Editing the specified requirements and consequent recalculation of candidatures' scores
     */
    public function edit(Request $request, $id)
    {
        $Requirement = \App\Requirement::find($id);
        $candidatures = DB::table('candidatures')->select('*')
                                               ->where('candidatures.offer_id','=', $Requirement->id)->get();

        if(!$Requirement) {
            return response()->json(['message' => "Errore", 'code' => 404], 404);
        }

        $titolodistudio = $request->get('titolodistudio');
        $anniesperienza = $request->get('anniesperienza');
        $eta = $request->get('eta');


        $Requirement->titolodistudio = $titolodistudio;
        $Requirement->anniesperienza = $anniesperienza;
        $Requirement->eta = $eta;

        foreach($candidatures as $candidature){
            $toModify = \App\Candidature::find($candidature->id);
            $punteggio = $candidature->punteggio;

            if($Requirement->titolodistudio == $toModify->titolostudio)
                $punteggio = 2;
            if($Requirement->anniesperienza <= $toModify->anniesperienza)
                $punteggio += 2;
            if($Requirement->eta >= $toModify->eta)
                $punteggio += 1;
            
            $toModify->punteggio = $punteggio;
        }

        $toModify->save();
        $Requirement->save();

        return response($Requirement);
    }

    /**
     * Update some fields of the specified requirements of an offer.
     */
    public function update(Request $request, $id)
    {
        $Requirement = \App\Requirement::find($id);

        if(!$Requirement) {
            return response()->json(['message' => "Errore", 'code' => 404], 404);
        }

        if(!empty($request->get('titolodistudio'))){$titolodistudio = $request->get('titolodistudio'); $Requirement->titolodistudio = $titolodistudio;}
        if(!empty($request->get('anniesperienza'))){$anniesperienza = $request->get('anniesperienza'); $Requirement->anniesperienza = $anniesperienza;}
        if(!empty($request->get('eta'))){$eta = $request->get('eta'); $Requirement->eta = $eta;}



        $Requirement->save();

        return response($Requirement);
    }

    /*
     * Remove the specified requirements from storage.
     */
    public function destroy($id)
    {
        $toDelete = \App\Requirement::find($id);
        if ( $toDelete )
             $toDelete->delete( );

        return response(200);
    }
}
