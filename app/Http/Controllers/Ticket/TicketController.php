<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    //


    public function store() {
    	$data = request()->validate([
    		'platNomor' => 'required',
    		'warna' => 'required',
    		'tipe' => 'required'
    	]);
    	$ticket = new Ticket();
    	$ticket->setData('platNomor', $data['platNomor']);
    	$ticket->setData('warna', $data['warna']);
    	$ticket->setData('tipe', $data['tipe']);
    	$result = $ticket->store_ticket();

        return response()->json($result, 200);
    }
}
