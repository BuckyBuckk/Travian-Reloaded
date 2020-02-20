<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// List articles
Route::get('articles', 'ArticleController@index');
// List single article
Route::get('article/{id}', 'ArticleController@show');
// Create new article
Route::post('article', 'ArticleController@store');
// Update article
Route::put('article', 'ArticleController@store');
// Delete article
Route::delete('article/{id}', 'ArticleController@destroy');


Route::get('villages', 'AllVillagesController@index');
Route::get('village/{id}', 'AllVillagesController@show');
Route::post('villages', 'AllVillagesController@store');
Route::put('village/{id}', 'AllVillagesController@update');
Route::delete('village/{id}', 'AllVillagesController@destroy');

Route::get('barracksProductions', 'BarracksProductionController@index');
Route::get('barracksProductions/{id}', 'BarracksProductionController@show');
Route::post('barracksProductions', 'BarracksProductionController@store');
Route::put('barracksProductions/{id}', 'BarracksProductionController@update');
Route::delete('barracksProductions/{id}', 'BarracksProductionController@destroy');

Route::get('resFieldUpgrades', 'ResFieldUpgradesController@index');
Route::get('resFieldUpgrade/{id}', 'ResFieldUpgradesController@show');
Route::post('resFieldUpgrades', 'ResFieldUpgradesController@store');
Route::put('resFieldUpgrade/{id}', 'ResFieldUpgradesController@update');
Route::delete('resFieldUpgrade/{id}', 'ResFieldUpgradesController@destroy');

Route::get('sendTroops', 'SendTroopsController@index');
Route::get('sendTroops/{id}', 'SendTroopsController@show');
Route::post('sendTroops', 'SendTroopsController@store');
Route::put('sendTroops/{id}', 'SendTroopsController@update');
Route::delete('sendTroops/{id}', 'SendTroopsController@destroy');

Route::get('stableProductions', 'StableProductionController@index');
Route::get('stableProductions/{id}', 'StableProductionController@show');
Route::post('stableProductions', 'StableProductionController@store');
Route::put('stableProductions/{id}', 'StableProductionController@update');
Route::delete('stableProductions/{id}', 'StableProductionController@destroy');

Route::get('villageFieldLevels', 'VillageFieldLevelsController@index');
Route::get('villageFieldLevels/{id}', 'VillageFieldLevelsController@show');
Route::post('villageFieldLevels', 'VillageFieldLevelsController@store');
Route::put('villageFieldLevels/{id}', 'VillageFieldLevelsController@update');
Route::delete('villageFieldLevels/{id}', 'VillageFieldLevelsController@destroy');

Route::get('villageFieldTypes', 'VillageFieldTypesController@index');
Route::get('villageFieldTypes/{id}', 'VillageFieldTypesController@show');
Route::post('villageFieldTypes', 'VillageFieldTypesController@store');
Route::put('villageFieldTypes/{id}', 'VillageFieldTypesController@update');
Route::delete('villageFieldTypes/{id}', 'VillageFieldTypesController@destroy');

Route::get('villageMaxResources', 'VillageMaxResourcesController@index');
Route::get('villageMaxResources/{id}', 'VillageMaxResourcesController@show');
Route::post('villageMaxResources', 'VillageMaxResourcesController@store');
Route::put('villageMaxResources/{id}', 'VillageMaxResourcesController@update');
Route::delete('villageMaxResources/{id}', 'VillageMaxResourcesController@destroy');

Route::get('villageOwnTroops', 'VillageOwnTroopsController@index');
Route::get('villageOwnTroops/{id}', 'VillageOwnTroopsController@show');
Route::post('villageOwnTroops', 'VillageOwnTroopsController@store');
Route::put('villageOwnTroops/{id}', 'VillageOwnTroopsController@update');
Route::delete('villageOwnTroops/{id}', 'VillageOwnTroopsController@destroy');

Route::get('villageProduction', 'VillageProductionController@index');
Route::get('villageProduction/{id}', 'VillageProductionController@show');
Route::post('villageProduction', 'VillageProductionController@store');
Route::put('villageProduction/{id}', 'VillageProductionController@update');
Route::delete('villageProduction/{id}', 'VillageProductionController@destroy');

Route::get('villageReinforcements', 'VillageReinforcementsController@index');
Route::get('villageReinforcements/{id}', 'VillageReinforcementsController@show');
Route::post('villageReinforcements', 'VillageReinforcementsController@store');
Route::put('villageReinforcements/{id}', 'VillageReinforcementsController@update');
Route::delete('villageReinforcements/{id}', 'VillageReinforcementsController@destroy');

Route::get('villageResources', 'VillageResourcesController@index');
Route::get('villageResources/{id}', 'VillageResourcesController@show');
Route::post('villageResources', 'VillageResourcesController@store');
Route::put('villageResources/{id}', 'VillageResourcesController@update');
Route::delete('villageResources/{id}', 'VillageResourcesController@destroy');