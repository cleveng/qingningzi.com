<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $table = 'position';
    protected $primaryKey = 'posid';
    protected $guarded = [];
    public $timestamps = false;

    public function content($len = 6)
    {
        return $this->hasMany('App\Models\PositionData', 'posid', 'posid')
            ->select(['data'])->inRandomOrder()->take($len);
    }

    public function len()
    {
        return $this->hasMany('App\Models\PositionData', 'posid', 'posid')
            ->select(['data']);
    }
}
