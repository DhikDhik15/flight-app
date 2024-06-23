<?php

namespace App\Repositories;

use App\Models\Flights;
use App\Models\Transactions;

class FlightRepository
{
    public function flights(array $request)
    {
        $flights = Flights::orderBy('id','DESC');

        return $flights->get();
    }

    public function transactions()
    {
        $transaction =  Transactions::with(['bookings','bookings.flight'])->orderBy('id','DESC');
        return $transaction->get();
    }
}
