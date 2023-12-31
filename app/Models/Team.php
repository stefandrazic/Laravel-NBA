<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Team extends Model
{
    use HasFactory;

    public function players()
    {
        return $this->hasMany(Player::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function slug()
    {
        return Str::slug($this->name);
    }

    public function news()
    {
        return $this->belongsToMany(News::class, 'news_teams');
    }
}
