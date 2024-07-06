<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function hello(Request $request)
    {
        $visitor_name = $request->query('visitor_name', 'Guest');
        $client_ip = $request->ip();

        $response = Http::get("http://ipinfo.io/102.88.43.158/json");

        if ($response->successful()) {
            $locationData = $response->json();
        }
        $location = $locationData['city'];
        return $location;
        $temperature = 11; // You might use a weather API to get the actual temperature.

        return response()->json([
            'client_ip' => $client_ip,
            'location' => $location,
            'greeting' => "Hello, $visitor_name!, the temperature is $temperature degrees Celsius in $location"
        ]);
    }
}
