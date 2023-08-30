<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Email
 *
 * @property int $id
 * @property string $title
 * @property string $thumb
 * @property string $keywords
 * @property string $description
 * @property string $content
 * @property string $link
 * @property string $stars
 * @property string $url
 * @property int $status
 * @property string $original
 * @property int $inputtime
 * @property int $updatetime
 * @method static \Illuminate\Database\Eloquent\Builder|Email newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Email newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Email query()
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereInputtime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereOriginal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereStars($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereThumb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereUpdatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereUrl($value)
 * @mixin \Eloquent
 */
class Email extends Model
{
    use HasFactory;

    protected $table = 'email';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;
}
