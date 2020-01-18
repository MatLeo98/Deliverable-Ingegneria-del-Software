<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Offerta extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \App\Offerta::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $offerta = new \App\Offerta();

        $offerta->titolo = request( 'titolo');
        $offerta->descrizione = request ( 'descrizione');
        $offerta->categoria = request ( 'categoria');
        $offerta->stipendio = request ( 'stipendio');
        $offerta->tipocontratto = request ( 'tipocontratto' );

        $offerta->save();

        return response(200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(empty(\App\Offerta::find( $id )))  return response()->json(['message' => "Errore, La risorsa richiesta non è stata trovata",'code'=> 404], 404);

        return \App\Offerta::find( $id );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $offerta = \App\Offerta::find($id);

        if(!$offerta) {
            return response()->json(['message' => "Errore, non sei autorizzato a modificare questa offerta", 'code' => 403], 403);
        }

        //foreach($request as $k => $v){
            //if(!empty($request->get($v))
            $titolo = $request->get('titolo');
            $descrizione = $request->get('descrizione');
            $categoria = $request->get('categoria');
            $stipendio = $request->get('stipendio');
            $tipocontratto = $request->get('tipocontratto');

            $offerta->titolo = $titolo;
            $offerta->descrizione = $descrizione;
            $offerta->categoria = $categoria;
            $offerta->stipendio = $stipendio;
            $offerta->tipocontratto = $tipocontratto;

        $offerta->save();

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
        $offerta = \App\Offerta::find($id);

    if(!$offerta) {
        return response()->json(['message' => "Errore", 'code' => 404], 404);
    }

    //foreach($request as $k => $v){
        //if(!empty($request->get($v))

        if(!empty($request->get('titolo'))){$titolo = $request->get('titolo'); $offerta->titolo = $titolo;}
        if(!empty($request->get('descrizione'))){$descrizione = $request->get('descrizione'); $offerta->descrizione = $descrizione;}
        if(!empty($request->get('categoria'))){$categoria = $request->get('categoria');$offerta->categoria = $categoria;}
        if(!empty($request->get('stipendio'))){$stipendio = $request->get('stipendio');$offerta->stipendio = $stipendio;}
        if(!empty($request->get('tipocontratto'))){$tipocontratto = $request->get('tipocontratto');$offerta->tipocontratto = $tipocontratto;}

    $offerta->save();

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
        $toDelete = \App\Offerta::find($id);
        if ( $toDelete )
             $toDelete->delete( );

        return response(200);
    }
}
