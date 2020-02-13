<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

Class SearchController extends Controller{

     /*
     * Display a listing of offers resulting from a search
     */

    public function searchoffers(Request $request){
   
   if(isset($request->tipocontratto)){
    $result=  DB::table('offers')->select('*')
                                
                                ->where( "offers.titolo", "like", "%$request->titolo%")
                                ->where( "offers.luogo", "like", "%$request->luogo%")
                                ->where( "offers.tipocontratto", "=" , "$request->tipocontratto")->paginate(12);}

   else{
      $result=  DB::table('offers')->select('*')
                                
      ->where( "offers.titolo", "like", "%$request->titolo%")
      ->where( "offers.luogo", "like", "%$request->luogo%")->paginate(12);}
   


    return view('search-offers-results', [
       'offe' => $result

    ]); }

     /*
     * Display a listing of users resulting from a search
     */

    public function searchusers(Request $request){

        $result=  DB::table('users')->select('*')
                                    
                                    ->where( "users.name", "like", "%$request->name%")
                                    ->where( "users.cognome", "like", "%$request->cognome%")->paginate(12);
    
    
        return view('search-users-results', [
           'user' => $result
    
        ]); }

}