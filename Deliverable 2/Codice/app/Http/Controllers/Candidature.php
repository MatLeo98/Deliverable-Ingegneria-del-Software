<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Candidature extends Controller
{
    /*
     * Display a listing of candidatures.
     */
    public function index()
    {
        return \App\Candidature::all();
    }


    /**
     * Creating a new candidature.
     */
    public function store()
    {
        $Candidature = new \App\Candidature();

        $Candidature->anniesperienza = request( 'anniesperienza');
        $Candidature->titolostudio = request ( 'titolostudio');
        $Candidature->eta = request ( 'eta');
        $Candidature->offer_id = request ( 'offer_id');
        $Candidature->email = request ( 'email');

        $id = request ( 'offer_id');
        $requirements = DB::table('requirements')->select('*')
                                                 ->where('requirements.id','=',$id)->get();
        $punteggio=0;

        if($requirements[0]->titolodistudio == $Candidature->titolostudio)
            $punteggio = 2;
        if($requirements[0]->anniesperienza <= $Candidature->anniesperienza)
            $punteggio += 2;
        if($requirements[0]->eta >= $Candidature->eta)
            $punteggio += 1;
        
        $Candidature->punteggio = $punteggio;


        $Candidature->save();

        return response($Candidature);
    }



    /**
     * Display the specified candidature.
     */
    public function show($id)
    {
        if(empty(\App\Candidature::find( $id )))  return response()->json(['message' => "Errore, La risorsa richiesta non è stata trovata",'code'=> 404], 404);
        return \App\Candidature::find( $id );

    }

    
    

    /*
     * Remove the specified candidature from storage.
     */
    public function destroy($id)
    {
        $toDelete = \App\Candidature::find($id);
        if ( $toDelete )
             $toDelete->delete( );

        return response(200);
    }
}
