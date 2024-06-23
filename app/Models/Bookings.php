<?php

namespace App\Models;

use App\Models\Flights;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bookings extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $table = 'bookings';

    protected $guarded = ['id'];

    public function flight()
    {
        return $this->belongsTo(Flights::class, 'flight_id', 'id');
    }
}
