<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class NewofferController extends Controller
{
    public function index(Request $request)
    {
        
        return view('new-offer.index');
    }

    /*
     * Creating a new offer from the prototype.
     */

    public function store(Request $request)
    {
        $user = Auth::user();
        $Offer = new \App\Offer();
        $requirements = new \App\Requirement();
        
        $this->validate($request, [
            'titolo' => 'required',
            'categoria'=> 'required',
            'tipocontratto' => 'required',
            'luogo' => 'required',
            'descrizione' => 'required',
            'anniesperienza'=> 'required',
            'titolodistudio' => 'required',
            'eta' => 'required'

        ]);

        $Offer->titolo = $request->titolo;
        $Offer->descrizione = $request->descrizione;
        $Offer->categoria = $request->categoria;
        if(!empty($request->stipendio)) $Offer->stipendio = $request->stipendio;
        $Offer->tipocontratto = $request->tipocontratto;
        $Offer->luogo = $request->luogo;
        $Offer->email = $user->email;

        $Offer->save();

        $requirements->anniesperienza = $request->anniesperienza;
        $requirements->titolodistudio = $request->titolodistudio;
        $requirements->eta = $request->eta;

        
      
        $requirements->save();


        return view('home');
     }
}

