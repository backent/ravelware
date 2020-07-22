<?php

namespace App\Models;

use App\Models\Model;
use stdClass;
use DateTime;

class Ticket extends Model
{
    //

    public function store_ticket() {
    	$data = $this->getData();
    	$data->parkingLot = $this->get_empty_slot();
    	$data->tanggalMasuk = $time = date('Y-m-d H:i:s');
    	$this->database->insert("ticket", $data);
    	unset($data->warna);
    	unset($data->tipe);
    	return $data;
    }

    public function get_empty_slot() {
    	$data = $this->database->get('ticket');
    	$data = collect($data);

    	$processing = true;
	    $numberLot = 1;
	    $lot = "A";

    	while ($processing) {
	    	$parkingLot = $lot . (string) $numberLot;
	    	$dataToFind = $data->first(function($item) use($parkingLot) {
	    		return $item->parkingLot == $parkingLot;
	    	});

	    	if (!isset($dataToFind)) {
	    		$processing = false;
	    	}
	    	
	    	
	    	$numberLot++;
    	}
    	return $parkingLot;
    }

    public function get_ticket_by_plat($platNomor) {
		$data = $this->database->get('ticket');
    	$data = collect($data);

    	$result = $data->first(function($item) use($platNomor) {
    		return $item->platNomor == $platNomor;
    	});

    	return $result;
    }

    public function update_exit_by_plat($platNomor) {
    	$ticket = $this->get_ticket_by_plat($platNomor);
    	if (isset($ticket)) {
    		$timeBefore = new DateTime($ticket->tanggalMasuk);
    		$jumlahBayar = $this->count_pay($timeBefore, $ticket->tipe);
    		
    		$data = [
    			'parkingLot' => null,
    			'tanggalKeluar' => date('Y-m-d H:i:s'),
    			'jumlahBayar' => $jumlahBayar
    		];

    		$result = $this->database->update('ticket', 'platNomor', $platNomor, $data);
    		$ticket = $this->get_ticket_by_plat($platNomor);

    		unset($ticket->warna);
    		unset($ticket->tipe);
    		unset($ticket->parkingLot);

    		return $ticket;
    	} else {
    		return false;
    	}
    }

    public function count_pay($timeBefore, $tipe) {
    	$timeBefore = new DateTime('2020-02-02 02:02:02');
    	$timeAfter = new DateTime();
    	$diff = $timeBefore->diff($timeAfter);
    	$diffDate = (int) $diff->format('%h%');
    	$price = 0;
    	$initPrice = 0;
    	if ($tipe == 'SUV') {
    		$initPrice = 15000;
    	} elseif ($tipe == "MPV") {
    		$initPrice = 15000;
    	} 

    	if ($diffDate > 0) {
			$multiply = $diffDate + 1;
			$price = ($initPrice * $multiply * 20 / 100) + $initPrice; 
		} else {
			$price = $initPrice;
		}

		return $price;
    	
    }


}
