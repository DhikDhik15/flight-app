<?php

namespace App\Repositories;

use App\Models\Flights;
use App\Models\Transactions;
use Illuminate\Support\Facades\Auth;

class FlightRepository
{
    public function flights(array $request)
    {
        $flights = Flights::orderBy('id','DESC');

        return $flights->get();
    }

    public function transactions()
    {
        $transaction =  Transactions::with(['bookings','bookings.flight'])->whereHas('bookings',function($user){
            $user->where('user_id',Auth::id());
        })->orderBy('id','DESC');
        return $transaction->get();
    }
}
