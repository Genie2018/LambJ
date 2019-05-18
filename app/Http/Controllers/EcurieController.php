<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class EcurieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.ajouter_ecurie');
    }

    public function toute_ecurie()
    {
        $toute_ecurie_info=DB::table('table_ecurie')->get();
        $manage_ecurie=view('admin.toute_ecurie')
            ->with('toute_ecurie_info',$toute_ecurie_info);

        return view('admin_layout')->with('admin.toute_ecurie',$manage_ecurie);
    }

    public function sauvegarder_ecurie(Request $request)
    {
        $data=array();
        $data['ecurie_id']=$request->ecurie_id;
        $data['ecurie_nom']=$request->ecurie_nom;
        $data['ecurie_description']=$request->ecurie_description;
        $data['publication_status']=$request->publication_status;

        DB::table('table_ecurie')->insert($data);
        Session::put('message','ecurie ajoutée avec sucess !!');
        return Redirect::to('/ajouter-ecurie');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inactive_ecurie($ecurie_id)
    {
        DB::table('table_ecurie')
        ->where('ecurie_id',$ecurie_id)
        ->update(['publication_status' => 0]);
         Session::put('message','ecurie inactive avec sucess !!');

        return Redirect::to('/toute-ecurie');
    }

    public function active_ecurie($ecurie_id)
    {
        DB::table('table_ecurie')
        ->where('ecurie_id',$ecurie_id)
        ->update(['publication_status' => 1]);
         Session::put('message','ecurie active avec sucess !!');

        return Redirect::to('/toute-ecurie');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_ecurie($ecurie_id)
    {
        $ecurie_info=DB::table('table_ecurie')
            ->where('ecurie_id',$ecurie_id)
            ->first();
           $ecurie_info=view('admin.edit_ecurie')
            ->with('ecurie_info',$ecurie_info);

        return view('admin_layout')
        ->with('admin.edit_ecurie',$ecurie_info);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function modifier_ecurie(Request $request,$ecurie_id)
    {
        $data=array();
        $data['ecurie_nom']=$request->ecurie_nom;
        $data['ecurie_description']=$request->ecurie_description;

        DB::table('table_ecurie')
        ->where('ecurie_id',$ecurie_id)
        ->update($data);
        Session::get('message','ecurie modifiee avec succes');
        return Redirect::to('/toute-ecurie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_ecurie($ecurie_id)
    {
        DB::table('table_ecurie')
        ->where('ecurie_id',$ecurie_id)
        ->delete();
        Session::get('message','ecurie supprimée avec succes');
        return Redirect::to('/toute-ecurie');
    }
}
