<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;

class TransactionsExport implements FromView
{
    public function collection()
    {
        $transactions = Transactions::with(['bookings','bookings.flight'])->orderBy('id','DESC')->get();
        $dataTransactions = [];
        foreach ($transactions as $key => $value) {
            dd($value);
        }
    }
}
