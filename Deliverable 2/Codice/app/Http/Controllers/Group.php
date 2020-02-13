<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Group extends Controller
{
    /**
     * Display a listing of groups.
     */
    public function index()
    {
        return \App\Group::all();
    }

    /*
     * Creating a new group.
     */
    public function store()
    {
        $Group = new \App\Group();

        $Group->nome = request( 'nome');
        $Group->descrizione= request ( 'descrizione');
        $Group->categoria = request ( 'categoria');
        $Group->isprivate = request ( 'isprivate');

        $Group->email_creatore = request ( 'email_creatore');


        $Group->save();

        return response($Group);
    }


    /*
     * Display the specified group.
     */
    public function show($id)
    {
        if(empty(\App\Group::find( $id )))  return response()->json(['message' => "Errore, La risorsa richiesta non è stata trovata",'code'=> 404], 404);
        $group = \App\Group::find( $id );

        if($group->isprivate) return response()->json(['message' => "Errore, Questo gruppo è privato",'code'=> 403], 403);

        return \App\Group::find( $id );
    }

    /*
     * Editing the specified group.
     */
    public function edit(Request $request, $id)
    {
        $Group = \App\Group::find($id);

        if(!$Group) {
            return response()->json(['message' => "Errore, non sei autorizzato a modificare questo gruppo", 'code' => 403], 403);
        }

        $nome = $request->get('nome');
        $descrizione = $request->get('descrizione');
        $categoria= $request->get('categoria');
        $isprivate= $request->get('isprivate');

        $email_creatore= $request->get('email_creatore');

        $Group->nome = $nome;
        $Group->descrizione = $descrizione;
        $Group->categoria= $categoria;
        $Group->isprivate= $isprivate;

        $Group->email_creatore= $email_creatore;

        $Group->save();

        return response($Group);
    }

    /**
     * Update some fields of the specified group.
     */
    public function update(Request $request, $id)
    {
        $Group = \App\Group::find($id);

        if(!$Group) {
            return response()->json(['message' => "Errore, non sei autorizzato a modificare questo gruppo", 'code' => 403], 403);
        }

        if(!empty($request->get('nome'))){$nome = $request->get('nome');$Group->nome = $nome;}
        if(!empty($request->get('descrizione'))){$descrizione = $request->get('descrizione');$Group->descrizione = $descrizione;}
        if(!empty($request->get('categoria'))){$categoria= $request->get('categoria');$Group->categoria= $categoria;}
        if(!empty($request->get('isprivate'))){$isprivate= $request->get('isprivate');$Group->isprivate= $isprivate;}
        if(!empty($request->get('email_creatore'))){$email_creatore= $request->get('email_creatore');$Group->email_creatore= $email_creatore;}


        $Group->save();

        return response($Group);
    }

    /*
     * Remove the specified group from storage.
     */
    public function destroy($id)
    {
        $toDelete = \App\Group::find($id);
        if ( $toDelete )
             $toDelete->delete( );

        return response(200);
    }
}
