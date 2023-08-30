<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Mood
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $author
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Mood newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mood newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mood query()
 * @method static \Illuminate\Database\Eloquent\Builder|Mood whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mood whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mood whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mood whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mood whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mood whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Mood extends Model
{
    use HasFactory;
}
