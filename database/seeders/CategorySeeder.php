<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $categories = [
      ['name' => 'Teen (18+)'],
      ['name' => 'Anal'],
      ['name' => 'Japanese'],
      ['name' => 'Threesome'],
      ['name' => 'Hentai'],
      ['name' => 'MILF'],
      ['name' => 'Young and Old (18+)'],
      ['name' => 'Lesbian'],
      ['name' => 'Public'],
      ['name' => 'Workout / Yoga / Gym'],

      // ['name' => 'Amateur'],
      // ['name' => 'Anal'],
      // ['name' => 'Arab'],
      // ['name' => 'Asian'],
      // ['name' => 'BBW'],
      // ['name' => 'Big Ass'],
      // ['name' => 'Big Dick'],
      // ['name' => 'Big Tits'],
      // ['name' => 'Blonde'],
      // ['name' => 'Blow Job'],
      // ['name' => 'Bondage'],
      // ['name' => 'Brazilian'],
      // ['name' => 'Brunette'],
      // ['name' => 'Bukkake'],
      // ['name' => 'Cartoon'],
      // ['name' => 'Casting'],
      // ['name' => 'Celebrity'],
      // ['name' => 'College (18+)'],
      // ['name' => 'Compilation'],
      // ['name' => 'Cosplay'],
      // ['name' => 'Creampie'],
      // ['name' => 'Cumshot'],
      // ['name' => 'Double Penetration'],
      // ['name' => 'Ebony'],
      // ['name' => 'European'],
      // ['name' => 'Facials'],
      // ['name' => 'Feet'],
      // ['name' => 'Female Orgasm'],
      // ['name' => 'Fetish'],
      // ['name' => 'French'],
      // ['name' => 'Funny'],
      // ['name' => 'Gangbang'],
      // ['name' => 'Gay'],
      // ['name' => 'German'],
      // ['name' => 'Group'],
      // ['name' => 'HD'],
      // ['name' => 'Hentai'],
      // ['name' => 'Indian'],
      // ['name' => 'Interracial'],
      // ['name' => 'Japanese'],
      // ['name' => 'Latina'],
      // ['name' => 'Lesbian'],
      // ['name' => 'Lingerie'],
      // ['name' => 'Massage'],
      // ['name' => 'Masturbation'],
      // ['name' => 'Mature'],
      // ['name' => 'MILF'],
      // ['name' => 'Orgy'],
      // ['name' => 'Party'],
      // ['name' => 'Pissing'],
      // ['name' => 'POV'],
      // ['name' => 'Premium Videos'],
      // ['name' => 'Public'],
      // ['name' => 'Reality'],
      // ['name' => 'Redhead'],
      // ['name' => 'Romantic'],
      // ['name' => 'Rough'],
      // ['name' => 'Solo Male'],
      // ['name' => 'Squirting'],
      // ['name' => 'Step Fantasy'],
      // ['name' => 'Teens (18+)'],
      // ['name' => 'Threesome'],
      // ['name' => 'Toys'],
      // ['name' => 'Transgender'],
      // ['name' => 'Verified Amateurs'],
      // ['name' => 'Vintage'],
      // ['name' => 'Virtual Reality'],
      // ['name' => 'Webcam'],
      // ['name' => 'Young and Old (18+)'],
    ];

    foreach ($categories as $item) {
      Category::create([
        'name' => $item['name'],
        'slug' => str_replace(' ', '-',str_replace('/', '', Str::lower($item['name']))),
      ]);
    }
  }
}
