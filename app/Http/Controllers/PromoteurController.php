<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class PromoteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.ajouter_promoteur');
    }

    public function tous_promoteur()
    {
        $tous_promoteur_info=DB::table('table_promoteur')->get();
        $manage_promoteur=view('admin.tous_promoteur')
            ->with('tous_promoteur_info',$tous_promoteur_info);

        return view('admin_layout')->with('admin.tous_promoteur',$manage_promoteur);
    }

    public function sauvegarder_promoteur(Request $request)
    {
        $data=array();
        $data['promoteur_id']=$request->promoteur_id;
        $data['promoteur_nom']=$request->promoteur_nom;   
        $data['publication_status']=$request->publication_status;

        DB::table('table_promoteur')->insert($data);
        Session::put('message','promoteur ajoutée avec sucess !!');
        return Redirect::to('/ajouter-promoteur');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inactive_promoteur($promoteur_id)
    {
        DB::table('table_promoteur')
        ->where('promoteur_id',$promoteur_id)
        ->update(['publication_status' => 0]);
         Session::put('message','promoteur inactive avec sucess !!');

        return Redirect::to('/tous-promoteur');
    }

    public function active_promoteur($promoteur_id)
    {
        DB::table('table_promoteur')
        ->where('promoteur_id',$promoteur_id)
        ->update(['publication_status' => 1]);
         Session::put('message','promoteur active avec sucess !!');

        return Redirect::to('/tous-promoteur');
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
    public function edit_promoteur($promoteur_id)
    {
        $promoteur_info=DB::table('table_promoteur')
            ->where('promoteur_id',$promoteur_id)
            ->first();
           $promoteur_info=view('admin.edit_promoteur')
            ->with('promoteur_info',$promoteur_info);

        return view('admin_layout')
        ->with('admin.edit_promoteur',$promoteur_info);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function modifier_promoteur(Request $request,$promoteur_id)
    {
        $data=array();
        $data['promoteur_nom']=$request->promoteur_nom;

        DB::table('table_promoteur')
        ->where('promoteur_id',$promoteur_id)
        ->update($data);
        Session::get('message','promoteur modifiee avec succes');
        return Redirect::to('/tous-promoteur');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_promoteur($promoteur_id)
    {
        DB::table('table_promoteur')
        ->where('promoteur_id',$promoteur_id)
        ->delete();
        Session::get('message','promoteur supprimée avec succes');
        return Redirect::to('/tous-promoteur');
    }
}
