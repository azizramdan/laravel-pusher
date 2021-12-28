<?php

use App\Events\CounterEvent;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
});

Route::post('update', function (Request $request) {
    $request->validate([
        'type' => ['in:increment,decrement']
    ]);

    event(new CounterEvent($request->type));

    return response()->json([
        'success' => true,
        'message' => 'OK'
    ]);
});

Route::view('counter', 'counter');
