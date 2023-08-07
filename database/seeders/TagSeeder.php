<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $tags = [
      ['name' => 'Step Mom'],
      ['name' => 'Workout'],
      ['name' => 'Public'],
      ['name' => 'Babysister'],
      ['name' => 'Massage'],
      ['name' => 'Reality'],
      ['name' => 'Threesome'],
      ['name' => 'Gangbang'],
      ['name' => 'Squirt'],
      ['name' => 'Hentai'],
      ['name' => 'Big Dick'],
      ['name' => 'Big Tits'],
      ['name' => 'Teen (18+)'],
      ['name' => 'MILF'],
      ['name' => 'Pornstar'],
      ['name' => 'Lesbian'],
      ['name' => 'Blowjob'],
      ['name' => 'Celebrity'],
      ['name' => 'Cosplay'],
      ['name' => 'Blonde'],
      ['name' => 'BBW'],
      ['name' => 'Female Orgasm'],
      ['name' => 'Hardcore'],
      ['name' => 'Japanese'],
      ['name' => 'Korean'],
      ['name' => 'Latina'],
      ['name' => 'Arab'],
    ];

    foreach ($tags as $tag) {
      Tag::create([
        'name' => $tag['name'],
        'slug' => str_replace(' ', '-',str_replace('/', '', Str::lower($tag['name']))),
      ]);
    }
  }
}
