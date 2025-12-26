<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Fee;
use App\Models\Grade;
use App\Models\Month;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        User::factory()->count(10)->create();

        Fee::create([
            'amount' => '200000',
            'year' => '2025',
        ]);

        Grade::create([
            'name' => '12 A',
            'major' => 'RPL',
        ]);

        Month::insert([
            'number' => '7',
            'name' => 'Juli',
        ]);
        Month::insert([
            'number' => '8',
            'name' => 'Agustus',
        ]);
        Month::insert([
            'number' => '9',
            'name' => 'September',
        ]);
        Month::insert([
            'number' => '10',
            'name' => 'Oktober',
        ]);
        Month::insert([
            'number' => '11',
            'name' => 'November',
        ]);
        Month::insert([
            'number' => '12',
            'name' => 'Desember',
        ]);
        Month::insert([
            'number' => '1',
            'name' => 'Januari',
        ]);
        Month::insert([
            'number' => '2',
            'name' => 'Februari',
        ]);
        Month::insert([
            'number' => '3',
            'name' => 'Maret',
        ]);
        Month::insert([
            'number' => '4',
            'name' => 'April',
        ]);
        Month::insert([
            'number' => '5',
            'name' => 'Mei',
        ]);
        Month::insert([
            'number' => '6',
            'name' => 'Juni',
        ]);
    }
}
