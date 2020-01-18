<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class User extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \App\User::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new \App\User();

        $user->nome = request('nome');
        $user->cognome = request ( 'cognome');
        $user->indirizzo = request ( 'indirizzo');
        $user->recapito = request ('recapito');

        if(empty(request('ragionesociale'))) $user->ragionesociale = null;
        $user->ragionesociale = request ( 'ragionesociale' );

        if(empty(request('sede'))) $user->sede = null;
        $user->sede = request ( 'sede' );

        $user->eta = request ( 'eta' );

        if(empty(request('titolodistudio'))) $user->titolodistudio = null;
        $user->titolodistudio = request ( 'titolodistudio' );

        if(empty(request('corsodistudi'))) $user->corsodistudi = null;
        $user->corsodistudi = request ( 'corsodistudi' );

        $user->flag = request ( 'flag' ); //true se è un offerente, false se è un richiedente
        $user->email = request ( 'email' );
        $user->password = request ( 'password' );


        $user->save();

        return response(200);
    }

    public function show($id)
    {
        if(empty(\App\User::find( $id )))  return response()->json(['message' => "Errore, La risorsa richiesta non è stata trovata",'code'=> 404], 404);

        return \App\User::find( $id );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $user = \App\User::find($id);

        if(!$user) {
            return response()->json(['message' => "Errore", 'code' => 404], 404);
        }

        //foreach($request as $k => $v){
            //if(!empty($request->get($v))
            $nome = $request->get('nome');
            $cognome = $request->get('cognome');
            $indirizzo = $request->get('indirizzo');
            $recapito = $request->get('recapito');
            $sede = $request->get('sede');
            $eta = $request->get('eta');
            $titolodistudio = $request->get('titolodistudio');
            $corsodistudi = $request->get('corsodistudi');
            $flag = $request->get('flag');
            $email = $request->get('email');
            $password = $request->get('password');

            $user->nome = $nome;
            $user->cognome = $cognome;
            $user->indirizzo = $indirizzo;
            $user->recapito = $recapito;
            $user->sede = $sede;
            $user->eta = $eta;
            $user->titolodistudio = $titolodistudio;
            $user->corsodistudi = $corsodistudi;
            $user->flag = $flag;
            $user->email = $email;
            $user->password = $password;

        $user->save();

        //return response()->json(['message' => 'Der AED wurde aktualisiert'], 200);
        return response(200);
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
        $user = \App\User::find($id);

        if(!$user) {
            return response()->json(['message' => "Errore", 'code' => 404], 404);
        }

        //foreach($request as $k => $v){
            //if(!empty($request->get($v))
            if(!empty($request->get('nome'))){$nome = $request->get('nome');$user->nome = $nome;}
            if(!empty($request->get('cognome'))){$cognome = $request->get('cognome');$user->cognome = $cognome;}
            if(!empty($request->get('indirizzo'))){$indirizzo = $request->get('indirizzo');$user->indirizzo = $indirizzo;}
            if(!empty($request->get('recapito'))){$recapito = $request->get('recapito');$user->recapito = $recapito;}
            if(!empty($request->get('sede'))){$sede = $request->get('sede');$user->sede = $sede;}
            if(!empty($request->get('eta'))){$eta = $request->get('eta');$user->eta = $eta;}
            if(!empty($request->get('titolodistudio'))){$titolodistudio = $request->get('titolodistudio'); $user->titolodistudio = $titolodistudio;}
            if(!empty($request->get('corsodistudi'))){$corsodistudi = $request->get('corsodistudi');$user->corsodistudi = $corsodistudi;}
            if(!empty($request->get('flag'))){$flag = $request->get('flag');$user->flag = $flag;}
            if(!empty($request->get('email'))){$email = $request->get('email');$user->email = $email;}
            if(!empty($request->get('password'))){$password = $request->get('password');$user->password = $password;}


        $user->save();

        //return response()->json(['message' => 'Der AED wurde aktualisiert'], 200);
        return response(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $toDelete = \App\User::find($id);
        if ( $toDelete )
             $toDelete->delete( );

        return response(200);
    }
}



