<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    protected $table = 'email';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;
}
