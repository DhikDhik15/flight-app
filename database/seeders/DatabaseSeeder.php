<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ReservasiMaskapaiSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ReservasiMaskapaiSeeder::class,
        ]);
    }
}
