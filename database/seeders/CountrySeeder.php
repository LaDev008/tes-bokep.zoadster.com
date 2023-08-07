<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
          ['name' => 'Japan'],
          ['name' => 'indonesia'],
          ['name' => 'English'],
          ['name' => 'Germany'],
          ['name' => 'Korea'],
          ['name' => 'Russia'],
          ['name' => 'India'],
          ['name' => 'China'],
          ['name' => 'Thailand'],
          ['name' => 'France'],
          ['name' => 'Argentina'],
          ['name' => 'Brazil'],
          ['name' => 'Spain'],
          ['name' => 'Saudi Arabia'],
        ];

        foreach ($countries as $data) {
            Country::create([
              'name' => $data['name'],
              'slug' => str_replace(' ', '-',str_replace('/', '', Str::lower($data['name']))),
            ]);
        }
    }
}
