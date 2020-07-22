<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    //


    public function store() {
    	$ticket = new Ticket();
    	$ticket->setData('platNomor', "b weaefawf 3");
    	$ticket->setData('bamband', "b weaefawf 3");
    	$ticket->setData('daram', "b weaefawf 3");
    	$ticket->store();
    }
}
