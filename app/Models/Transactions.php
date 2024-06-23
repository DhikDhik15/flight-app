<?php

namespace App\Models;

use App\Models\Bookings;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transactions extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $table = 'transactions';

    protected $guarded = ['id'];

    public function bookings()
    {
        return $this->hasMany(Bookings::class, 'id', 'booking_id');
    }
}
