<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function posts()
    {
        return $this->hasMany('App\Models\Post', 'platform_id', 'id');
    }

    public function articles()
    {
        return $this->hasMany('App\Models\Article', 'platform_id', 'id');
    }
}
