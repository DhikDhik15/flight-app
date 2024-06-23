<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\TransactionsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Repositories\FlightRepository;

class TransactionController extends Controller
{
    protected $flight;

    public function __construct(
        FlightRepository $flight
    ){
        $this->flights = $flight;
    }
    public function index(Request $request)
    {
        $transactions = $this->flights->transactions();

        return view('dashboard', compact('transactions'));
    }

    public function export()
    {
        return Excel::download(new TransactionsExport, 'transactions.xlsx');
    }

}
