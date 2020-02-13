<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class User extends Controller
{
    /*
     * Display a listing of users.
     */
    public function index()
    {
        return \App\User::all();
    }

    /*
     * Register a new user.
     */
    public function store()
    {
        $user = new \App\User();

        $user->name = request('name');
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

        return response($user);
    }

    /*
     * Display the specified user.
     */

    public function show($user)
    {
        if(empty(\App\User::find( $user )))  return response()->json(['message' => "Errore, La risorsa richiesta non è stata trovata",'code'=> 404], 404);
        return \App\User::find( $user );
    }



    /*
     * Editing the specified user.
     */

    public function edit(Request $request, $id)
    {
        $user = \App\User::find($id);

        if(!$user) {
            return response()->json(['message' => "Errore", 'code' => 404], 404);
        }

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

        return response($user);
    }

    /*
     * Update some fields of the specified user.
     */
    public function update(Request $request, $id)
    {
        $user = \App\User::find($id);

        if(!$user) {
            return response()->json(['message' => "Errore", 'code' => 404], 404);
        }

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

        return response($user);
    }

    /*
     * Remove the specified user.
     */
    public function destroy($id)
    {
        $toDelete = \App\User::find($id);
        if ( $toDelete )
             $toDelete->delete( );

        return response(200);
    }

    /*
     * Authentication error.
     */

    public function login(Request $request)
    {
        $credentials = DB::table('users')->select('*')
                                         ->where('users.email','=',$request->email)->get();
        if($credentials->password != $request->password)
            return response()->json(['message' => "Errore", 'Credenziali errate' => 401], 401);
    }
}



