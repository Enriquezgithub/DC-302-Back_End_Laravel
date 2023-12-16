<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    public function index() {
        $client = Client::orderBy('id')->get();

        return response()->json($client);
    }

    public function view(Client $client){

        return response()->json($client);
    }

    public function store(Request $request, Client $client){
        $fields = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'contact' => 'required'
        ]);

        $client = Client::create($fields);

        return response()->json([
            'status' => 'Ok',
            'message' => 'Customer has been added with an ID #'.$client->id
        ]);
    }

    public function update(Request $request, Client $client){
        $fields = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email',
            'contact' => 'required|string',
        ]);

        $client->update($fields);

        return response()->json([
            'status' => 'Ok',
            'message' => 'Customer has been updated.'
        ]);
    }

    public function destroy(Client $client) {
        $client->delete();

        return response()->json([
            'status' => 'Ok',
            'message' => 'Customer has been deleted.'
        ]);
    }
}
