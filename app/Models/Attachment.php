<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getMediaAttribute(): array
    {
        return json_decode($this->attributes['media'], true);
    }
}
