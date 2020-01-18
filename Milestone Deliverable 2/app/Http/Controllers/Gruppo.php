<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Gruppo extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \App\Gruppo::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gruppo = new \App\Gruppo();

        $gruppo->nome = request( 'nome');
        $gruppo->descrizione= request ( 'descrizione');
        $gruppo->categoria = request ( 'categoria');

        $gruppo->save();

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
        if(empty(\App\Gruppo::find( $id )))  return response()->json(['message' => "Errore, La risorsa richiesta non è stata trovata",'code'=> 404], 404);

        return \App\Gruppo::find( $id );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $gruppo = \App\Gruppo::find($id);

        if(!$gruppo) {
            return response()->json(['message' => "Errore, non sei autorizzato a modificare questo gruppo", 'code' => 403], 403);
        }

        $nome = $request->get('nome');
        $descrizione = $request->get('descrizione');
        $categoria= $request->get('categoria');

        $gruppo->nome = $nome;
        $gruppo->descrizione = $descrizione;
        $gruppo->categoria= $categoria;

        $gruppo->save();

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
        $gruppo = \App\Gruppo::find($id);

        if(!$gruppo) {
            return response()->json(['message' => "Errore, non sei autorizzato a modificare questo gruppo", 'code' => 403], 403);
        }

        if(!empty($request->get('nome'))){$nome = $request->get('nome');$gruppo->nome = $nome;}
        if(!empty($request->get('descrizione'))){$descrizione = $request->get('descrizione');$gruppo->descrizione = $descrizione;}
        if(!empty($request->get('categoria'))){$categoria= $request->get('categoria');$gruppo->categoria= $categoria;}

        $gruppo->save();

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
        $toDelete = \App\Gruppo::find($id);
        if ( $toDelete )
             $toDelete->delete( );

        return response(200);
    }
}
