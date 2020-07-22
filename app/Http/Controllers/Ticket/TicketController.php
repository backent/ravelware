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
    	$ticket->setData('tipe', strtoupper($data['tipe']));
    	$result = $ticket->store_ticket();

        return response()->json($result, 200);
    }

    public function updateExit() {
        $data = request()->validate([
            'platNomor' => "required"
        ]);

        $ticket = new Ticket();
        $result = $ticket->update_exit_by_plat($data['platNomor']);
        if ($result != false) {
            return response()->json($result, 200);
        } else {
            return response()->json(['message' => 'Plat nomor tidak ditemukan'], 404);
        }
        
    }

    public function reportJumlah() {
        $data = request()->validate([
            'tipe' => "required"
        ]);

        $ticket = new Ticket();
        $result = $ticket->get_count_by_type($data['tipe']);

        return response()->json(['jumlahKendaraan' => $result], 200);
    }

    public function reportWarna() {
        $data = request()->validate([
            'warna' => "required"
        ]);

        $ticket = new Ticket();
        $result = $ticket->get_plat_by_warna($data['warna']);

        return response()->json(['platNomor' => $result], 200);
    }
}
