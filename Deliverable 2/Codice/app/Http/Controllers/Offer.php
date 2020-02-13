<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

use Illuminate\Support\Facades\Auth;

class Offer extends Controller
{
    /*
     * Display a listing of offers.
     */
    public function index()
    {
        return \App\Offer::all();
    }

    /*
     * Matching offers for the authenticated user
     */

    public function indexweb()
    {
        $user = Auth::user();
        $offers = DB::table('preferences')->select('*')
                                     ->join("offers","offers.categoria","=","preferences.nomecategoria")
                                     ->where("preferences.email","=",$user->email)->paginate(10);


        return view('index', [
            'offer' => $offers,
            'user' => $user
        ]);
    }

    /*
     * Creating an offer 
     */
    public function store()
    {
        $Offer = new \App\Offer();

        $Offer->titolo = request( 'titolo');
        $Offer->descrizione = request ( 'descrizione');
        $Offer->categoria = request ( 'categoria');
        $Offer->stipendio = request ( 'stipendio');
        $Offer->tipocontratto = request ( 'tipocontratto' );
        $Offer->luogo = request ( 'luogo' );
        $Offer->email = request ( 'email' );

        $Offer->save();

        return response($Offer);
    }


    /*
     * Display the specified offer.
     */
  
    public function show($id)
    {
        if(empty(\App\Offer::find( $id )))  return response()->json(['message' => "Errore, La risorsa richiesta non è stata trovata",'code'=> 404], 404);
        return \App\Offer::find( $id );

    }

    /*
     * Display the specified offer with the candidates.
     */


    public function showweb($offer)
    {
        $user = Auth::user();
        $offer = \App\Offer::find( $offer );
        $candidatures = DB::table('candidatures')->select('*')
                                                    ->join("offers","candidatures.offer_id","=", "offers.id")
                                                    ->join("users","candidatures.email", "=", "users.email")
                                                    ->where("candidatures.offer_id","=",$offer->id)
                                                    ->orderBy('candidatures.punteggio', 'desc')->get();
        

        return view('single-offer', [
            'offer' => $offer,
            'candidature' => $candidatures,
            'user' => $user

        ]);
    }

    /*
     * Editing the specified offer.
     */
    public function edit(Request $request, $id)
    {
        $Offer = \App\Offer::find($id);

        if(!($request->email = $Offer->email)) {
            return response()->json(['message' => "Errore, non sei autorizzato a modificare questa offerta", 'code' => 403], 403);
        }

        if(!$Offer) {
            return response()->json(['message' => "Errore, offerta non trovata", 'code' => 404], 404);
        }


            $titolo = $request->get('titolo');
            $descrizione = $request->get('descrizione');
            $categoria = $request->get('categoria');
            $stipendio = $request->get('stipendio');
            $tipocontratto = $request->get('tipocontratto');
            $luogo = $request->get('luogo');
            $email = $request->get('email');

            $Offer->titolo = $titolo;
            $Offer->descrizione = $descrizione;
            $Offer->categoria = $categoria;
            $Offer->stipendio = $stipendio;
            $Offer->tipocontratto = $tipocontratto;
            $Offer->luogo = $luogo;
            $Offer->email = $email;

        $Offer->save();

        return response($Offer);

    }

    /*
     * Update some fields of the specified offer.
     */
    public function update(Request $request, $id)
    {
        $Offer = \App\Offer::find($id);

    if(!$Offer) {
        return response()->json(['message' => "Errore", 'code' => 404], 404);
    }

        if(!empty($request->get('titolo'))){$titolo = $request->get('titolo'); $Offer->titolo = $titolo;}
        if(!empty($request->get('descrizione'))){$descrizione = $request->get('descrizione'); $Offer->descrizione = $descrizione;}
        if(!empty($request->get('categoria'))){$categoria = $request->get('categoria');$Offer->categoria = $categoria;}
        if(!empty($request->get('stipendio'))){$stipendio = $request->get('stipendio');$Offer->stipendio = $stipendio;}
        if(!empty($request->get('tipocontratto'))){$tipocontratto = $request->get('tipocontratto');$Offer->tipocontratto = $tipocontratto;}
        if(!empty($request->get('luogo'))){$luogo = $request->get('luogo');$Offer->luogo = $luogo;}
        if(!empty($request->get('email'))){$email = $request->get('email');$Offer->email = $email;}

    $Offer->save();

    return response($Offer);
    }

    /**
     * Remove the specified offer with her candidatures
     */
    public function destroy($id)
    {
        $toDelete = \App\Offer::find($id);
        $candidatures = DB::table('candidatures')->select('*')
                                               ->where('candidatures.offer_id','=', $toDelete->id)->get();
        foreach($candidatures as $candidature){
                $toDel = \App\Candidature::find($candidature->id);
                $toDel->delete( );
        }
        if ( $toDelete )
             $toDelete->delete( );
             

        return response(200);
    }
}
