<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'popularity', 'priority', 'clicked_today'];

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
