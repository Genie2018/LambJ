<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Frontend site ..........
Route::get('/','AdminController@index');









//Backend site...................................
Route::get('/tableaudebord','AdminController@show_tableaudebord');
Route::post('/admin-tableaudebord','AdminController@tableaudebord');
Route::get('/deconnecter','SuperAdminController@deconnecter');

//Ecurie Route
Route::get('/ajouter-ecurie','ecurieController@index');
Route::get('/toute-ecurie','ecurieController@toute_ecurie');
Route::post('/sauvegarder-ecurie','ecurieController@sauvegarder_ecurie');
Route::get('/inactive-ecurie/{ecurie_id}','ecurieController@inactive_ecurie');
Route::get('/active-ecurie/{ecurie_id}','ecurieController@active_ecurie');
Route::get('/edit-ecurie/{ecurie_id}','ecurieController@edit_ecurie');
Route::post('/modifier-ecurie/{ecurie_id}','ecurieController@modifier_ecurie');
Route::get('/delete-ecurie/{ecurie_id}','ecurieController@delete_ecurie');



//lutteur Routes
Route::get('/ajouter-lutteur','LutteurController@index');
Route::post('/sauvegarder-lutteur','LutteurController@sauvegarder_lutteur');
Route::get('/tous-lutteur','LutteurController@tous_lutteur');


//Calendrier
Route::get('/ajouter-calendrier','CalendrierController@index');
Route::post('/sauvegarder-calendrier','CalendrierController@sauvegarder_calendrier');
Route::get('/tous-combat','CalendrierController@tous_combat');
Route::get('/edit-calendrier/{calendrier_id}','CalendrierController@edit_calendrier');
Route::post('/modifier-calendrier/{calendrier_id}','CalendrierController@modifier_calendrier');
Route::get('/delete-calendrier/{calendrier_id}','CalendrierController@delete_calendrier');
Route::get('/inactive-calendrier/{calendrier_id}','CalendrierController@inactive_calendrier');
Route::get('/active-calendrier/{calendrier_id}','CalendrierController@active_calendrier');


//Promoteur

Route::get('/ajouter-promoteur','PromoteurController@index');
Route::get('/tous-promoteur','PromoteurController@tous_promoteur');
Route::post('/sauvegarder-promoteur','PromoteurController@sauvegarder_promoteur');
Route::get('/inactive-promoteur/{promoteur_id}','PromoteurController@inactive_promoteur');
Route::get('/active-promoteur/{promoteur_id}','PromoteurController@active_promoteur');
Route::get('/edit-promoteur/{promoteur_id}','PromoteurController@edit_promoteur');
Route::post('/modifier-promoteur/{promoteur_id}','PromoteurController@modifier_promoteur');
Route::get('/delete-promoteur/{promoteur_id}','PromoteurController@delete_promoteur');