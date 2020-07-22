<?php

namespace App\Models;

use App\Models\Model;
use stdClass;


class Ticket extends Model
{
    //

    public function store() {
    	$data = $this->getData();
    	$this->database->insert("ticket", $data);
    }
}
