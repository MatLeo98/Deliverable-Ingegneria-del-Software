<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Preference extends Controller
{
    /*
     * Display a listing of the preferences of the specified user.
     */
    public function index($email)
    {
        $preferences = DB::table('preferences')->select('*')
                                               ->where('preferences.email','=',$email)->get();
        if(!empty($preferences))
            return ($preferences);
        else
            return response()->json(['message' => "Errore, preferenze non trovate per l'utente inserito", 'code' => 404], 40);
    }

    /*
     * Insering a new preference.
     */
    public function store()
    {
        $Preference = new \App\Preference();

        $Preference->nomecategoria= request('nomecategoria');
        $Preference->email= request('email');


        $Preference->save();

        return response($Preference);
    }


    /*
     * Editing the specified preference.
     */
    public function edit(Request $request, $id)
    {
        $Preference = \App\Preference::find($id);

        if(!$Preference) {
            return response()->json(['message' => "Errore", 'code' => 404], 404);
        }

        $nomecategoria = $request->get('nomecategoria');
        $email = $request->get('email');

        $Preference->nomecategoria = $nomecategoria;
        $Preference->email = $email;

        $Preference->save();

        return response($Preference);
    }

    /*
     * Update some fields of the specified preference.
     */
    public function update(Request $request, $id)
    {
       //
    }

    /*
     * Remove the specified preference from storage.
     */
    public function destroy($id)
    {
        $toDelete = \App\Preference::find($id);
        if ( $toDelete )
             $toDelete->delete( );

        return response(200);
    }
}
