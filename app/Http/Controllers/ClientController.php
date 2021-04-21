<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\ClientController;
use App\Models\Client;

class ClientController extends Controller
{
    public function index() {
        return view('layout');
    }

    public function store(Request $request) 
    {
        $clients = new Client;

        $clients->first_name = $request->input('first_name');
        $clients->last_name = $request->input('last_name');
        $clients->employee = $request->input('employee');
        $clients->service = $request->input('service');

        $clients->save();

    }
}
