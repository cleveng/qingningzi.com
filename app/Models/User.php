<?php

namespace App\Models;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @model: User
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;
    use CanResetPassword;

    protected $guarded = [];
}
