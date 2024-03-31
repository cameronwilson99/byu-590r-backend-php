<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Game extends Model
{
    use HasFactory;

    public function categories() : BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'categories_games', 'game_id', 'category_id');
    }

    public function publisher() : HasOne
    {
        return $this->hasOne(Publisher::class, 'id', 'publisher_id');
    }

    public function reviews() : HasMany
    {
        return $this->hasMany(Review::class, 'game_id', 'id');
    }
}
