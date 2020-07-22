<?php

namespace App\Models;

use App\Models\Model;
use stdClass;


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


}
