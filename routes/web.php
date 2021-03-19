<?php

use App\Http\Controllers\BeerController;
use Illuminate\Support\Facades\Route;

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

/*
Equivalente di Route::resource per index e show
// Route::get("/beers", "BeerController@index");
// Route::get("beers/{id}", "BeerController@show");
 */

Route::resource("beers", "BeerController");

