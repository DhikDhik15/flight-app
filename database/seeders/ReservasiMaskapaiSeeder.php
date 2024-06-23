<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservasiMaskapaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('flights')->insert([
            [
                'airline' => 'Garuda Indonesia',
                'destination' => 'Jakarta',
                'from' => 'Surabaya',
                'departure_date' => Carbon::now()->addDays(10)->toDateString(),
                'arrival_date' => Carbon::now()->addDays(1)->toDateString(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'transit_count' => 1,
                'price' => 500000
            ],
            [
                'airline' => 'Lion Air',
                'destination' => 'Bali',
                'from' => 'Jakarta',
                'departure_date' => Carbon::now()->addDays(20)->toDateString(),
                'arrival_date' => Carbon::now()->addDays(1)->toDateString(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'transit_count' => 2,
                'price' => 750000

            ],
            [
                'airline' => 'AirAsia',
                'destination' => 'Medan',
                'from' => 'Yogyakarta',
                'departure_date' => Carbon::now()->addDays(15)->toDateString(),
                'arrival_date' => Carbon::now()->addDays(1)->toDateString(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'transit_count' => 2,
                'price' => 900000

            ],
            [
                'airline' => 'Batik Air',
                'destination' => 'Jakarta',
                'from' => 'Bali',
                'departure_date' => Carbon::now()->addDays(20)->toDateString(),
                'arrival_date' => Carbon::now()->addDays(2)->toDateString(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'transit_count' => 2,
                'price' => 800000

            ],
            [
                'airline' => 'Susi Air',
                'destination' => 'Papua',
                'from' => 'Makassar',
                'departure_date' => Carbon::now()->addDays(15)->toDateString(),
                'arrival_date' => Carbon::now()->addDays(2)->toDateString(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'transit_count' => 2,
                'price' => 1700000

            ],
        ]);
    }
}
