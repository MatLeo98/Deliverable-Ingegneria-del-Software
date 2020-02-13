<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Offer;
use Illuminate\Support\Facades\DB;


class NewcandidatureController extends Controller
{
    public function index(Request $request)
    {
        //return view('new-candidature.index');
    }

    /*
     * Sending a new candidature from the prototype
     */

    public function store(Request $request)
    {
        $user = Auth::user();
        $candidature = new \App\Candidature();
        $requirements = DB::table('requirements')->select('*')
                                                 ->where('requirements.id','=',$request->offer_id)->get();
        $punteggio=0;

        if($requirements[0]->titolodistudio == $request->titolostudio)
            $punteggio = 2;
        if($requirements[0]->anniesperienza <= $request->anniesperienza)
            $punteggio += 2;
        if($requirements[0]->eta >= $request->eta)
            $punteggio += 1;



        
        $this->validate($request, [
            'offer_id' => 'required',
            'anniesperienza' => 'required',
            'titolostudio'=> 'required',
            'eta' => 'required',
        ]);

        $candidature->email = $user->email;
        $candidature->anniesperienza = $request->anniesperienza;
        $candidature->titolostudio = $request->titolostudio;
        $candidature->eta = $request->eta;
        $candidature->punteggio = $punteggio;
        $candidature->offer_id = $request->offer_id;
        
        

        $candidature->save();

        return view('new-candidature');
     }


}

