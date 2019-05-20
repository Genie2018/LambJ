<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CalendrierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.ajouter_calendrier');
    }

     public function sauvegarder_calendrier(Request $request)
    {
        $data=array();
        $data['calendrier_id']=$request->calendrier_id;
        $data['promoteur_id']=$request->promoteur_id;
        $data['lutteur1']=$request->lutteur1;
        $data['lutteur2']=$request->lutteur2;
        $data['stade']=$request->stade;
        $data['date_combat']=$request->date_combat;
        $data['prix_decouvert']=$request->prix_decouvert;
        $data['prix_vip']=$request->prix_vip;
        $data['publication_status']=$request->publication_status;

        DB::table('table_calendrier')->insert($data);
        Session::put('message',' Combat programmé avec sucess !!');
        return Redirect::to('/ajouter-calendrier');
    }
 
        public function tous_combat()
    {
        $tous_calendrier_info=DB::table('table_calendrier')->get();
        $manage_calendrier=view('admin.tous_combat')
            ->with('tous_calendrier_info',$tous_calendrier_info);

        return view('admin_layout')->with('admin.tous_combat',$manage_calendrier);
    }

        public function edit_calendrier($calendrier_id)
    {
        $calendrier_info=DB::table('table_calendrier')
            ->where('calendrier_id',$calendrier_id)
            ->first();
           $calendrier_info=view('admin.edit_calendrier')
            ->with('calendrier_info',$calendrier_info);

        return view('admin_layout')
        ->with('admin.edit_calendrier',$calendrier_info);
    }


         public function modifier_calendrier(Request $request,$calendrier_id)
    {
        $data=array();
        $data['promoteur_id']=$request->promoteur_id;
        $data['lutteur1']=$request->lutteur1;
        $data['lutteur2']=$request->lutteur2;
        $data['stade']=$request->stade;
        $data['date_combat']=$request->date_combat;
        $data['prix_decouvert']=$request->prix_decouvert;
        $data['prix_vip']=$request->prix_vip;

        DB::table('table_calendrier')
        ->where('calendrier_id',$calendrier_id)
        ->update($data);
        Session::get('message','calendrier modifiee avec succes');
        return Redirect::to('/tous-combat');
    }


 public function inactive_calendrier($calendrier_id)
    {
        DB::table('table_calendrier')
        ->where('calendrier_id',$calendrier_id)
        ->update(['publication_status' => 0]);
         Session::put('message','calendrier inactive avec sucess !!');

        return Redirect::to('/tous-combat');
    }

    public function active_calendrier($calendrier_id)
    {
        DB::table('table_calendrier')
        ->where('calendrier_id',$calendrier_id)
        ->update(['publication_status' => 1]);
         Session::put('message','combat active avec sucess !!');

        return Redirect::to('/tous-combat');
    }
  
       public function delete_calendrier($calendrier_id)
    {
        DB::table('table_calendrier')
        ->where('calendrier_id',$calendrier_id)
        ->delete();
        Session::get('message','combat supprimée avec succes');
        return Redirect::to('/tous-combat');
    }
}
