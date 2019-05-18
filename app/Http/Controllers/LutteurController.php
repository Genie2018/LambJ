<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

class LutteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.ajouter_lutteur');
    }

    public function sauvegarder_lutteur(Request $request)
    {
        $data=array();
        $data['lutteur_nom']=$request->lutteur_nom;
        $data['ecurie_id']=$request->ecurie_id;       
        $data['lutteur_combat']=$request->lutteur_combat;
        $data['lutteur_victoire']=$request->lutteur_victoire;
        $data['lutteur_defaite']=$request->lutteur_defaite;
        $data['lutteur_nul']=$request->lutteur_nul;                
        $data['publication_status']=$request->publication_status;


        $image=$request->file('lutteur_image');
        if($image){
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

            if($success){
       $data['lutteur_image']=$image_url;
       DB::table('table_lutteur')->insert($data);
        Session::put('message','lutteur ajoutée avec sucess !!');
        return Redirect::to('/ajouter-lutteur');
            }
        }
        $data['lutteur_image']='';
        DB::table('table_lutteur')->insert($data);
        Session::put('message','lutteur ajoutée avec sucess sans image!!');
        return Redirect::to('/ajouter-lutteur');
    }



            public function list(Request $request){

                $lutteurs=DB::table('table_lutteur')->get();
                return  response()->json($lutteurs,200);
            }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
