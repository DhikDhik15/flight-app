<?php

namespace App\Http\Controllers;

use PDF;
use DateTime;
use App\Models\Bookings;
use Illuminate\Support\Str;
use App\Models\Transactions;
use Illuminate\Http\Request;
use App\Repositories\BookingRepository;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $booking = Bookings::create([
            'user_id' => auth()->id(),
            'flight_id' => $request->flight_id,
            'passenger_name' => $request->passenger_name,
            'passenger_birth_date' => $request->passenger_birth_date,
            'passenger_nationality' => $request->passenger_nationality,
            'booking_code' => strtoupper(Str::random(4)),
        ]);

        Transactions::create([
            'booking_id' => $booking->id
        ]);

        $flight = $booking->flight;
        $dob = DateTime::createFromFormat('Y-m-d', $booking->passenger_birth_date);
        $departure = DateTime::createFromFormat('Y-m-d', $flight->departure_date);
        $arrival = DateTime::createFromFormat('Y-m-d', $flight->arrival_date);

        $ticket = [
            'booking_code' => $booking->booking_code,
            'passenger' => $booking->passenger_name,
            'passenger_birth_date' => $dob->format('j F Y'),
            'passenger_nationality' => $booking->passenger_nationality,
            'flight' => $flight->airline,
            "departure_date" => $departure->format('j F Y'),
            "arrival_date" => $arrival->format('j F Y'),
            "from" => $flight->from,
            "destination" => $flight->destination,
            "transit_count" => $flight->transit_count
        ];

        // Load Blade view
        $html = view('booking.ticket', ['ticket' => $ticket]);

        // Konversi HTML ke PDF
        $pdf = PDF::loadHTML($html);

        // Download PDF
        return $pdf->download('eticket-'.$booking->passenger_name.'.pdf');
    }

    public function create()
    {
        $flight_id = intval(request()->query('id'));
        return view('booking.index',compact('flight_id'));
    }
}
