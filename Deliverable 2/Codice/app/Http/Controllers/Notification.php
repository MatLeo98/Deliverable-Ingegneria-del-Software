<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Notification extends Controller
{
    /*
     * Display a listing of notifications
     */
    public function index()
    {
        return \App\Notification::all();
    }

    /*
     * Sending a new notification.
     */
    public function store()
    {
        $Notification = new \App\Notification();

        $Notification->titolo = request( 'titolo');
        $Notification->descrizione = request ( 'descrizione');


        $Notification->save();

        return response($Notification);
    }

    


    /*
     * Display the specified notification.
     */
    public function show($id)
    {
        if(empty(\App\Notification::find( $id )))  return response()->json(['message' => "Errore, La risorsa richiesta non è stata trovata",'code'=> 404], 404);

        return \App\Notification::find( $id );
    }


    /*
     * Remove the specified notification from storage.
     */
    public function destroy($id)
    {
        $toDelete = \App\Notification::find($id);
        if ( $toDelete )
             $toDelete->delete( );

        return response(200);
    }

}
