<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Requisito extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \App\Requisito::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $requisito = new \App\Requisito();

        $requisito->titolodistudio = request( 'titolodistudio');
        $requisito->anniesperienza = request ( 'anniesperienza');
        $requisito->eta = request ( 'eta');


        $requisito->save();

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
        return \App\Requisito::find( $id );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $requisito = \App\Requisito::find($id);

        if(!$requisito) {
            return response()->json(['message' => "Errore", 'code' => 404], 404);
        }

        $titolodistudio = $request->get('titolodistudio');
        $anniesperienza = $request->get('anniesperienza');

        $requisito->titolodistudio = $titolodistudio;
        $requisito->anniesperienza = $anniesperienza;


        $requisito->save();

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
        $requisito = \App\Requisito::find($id);

        if(!$requisito) {
            return response()->json(['message' => "Errore", 'code' => 404], 404);
        }

        if(!empty($request->get('titolodistudio'))){$titolodistudio = $request->get('titolodistudio'); $requisito->titolodistudio = $titolodistudio;}
        if(!empty($request->get('anniesperienza'))){$anniesperienza = $request->get('anniesperienza'); $requisito->anniesperienza = $anniesperienza;}


        $requisito->save();

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
        $toDelete = \App\Requisito::find($id);
        if ( $toDelete )
             $toDelete->delete( );

        return response(200);
    }
}
