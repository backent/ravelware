<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/test', function () {
	return "fawf";
});

Route::post('/ticket', 'Ticket\TicketController@store');
Route::post('/ticket/exit', 'Ticket\TicketController@updateExit');
Route::post('/report/jumlahkendaraan', 'Ticket\TicketController@reportJumlah');
Route::post('/report/platwarna', 'Ticket\TicketController@reportWarna');