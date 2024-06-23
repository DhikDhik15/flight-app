<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\FlightRepository;

class FlightController extends Controller
{
    protected $flight;

    public function __construct(
        FlightRepository $flight
    ){
        $this->flights = $flight;
    }

    public function search(Request $request)
    {
        $flights = $this->flights->flights(request()->all());
        return view('flight.index', compact('flights'));
    }

}
