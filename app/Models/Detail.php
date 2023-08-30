<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Detail
 *
 * @property int $id
 * @property int $article_id
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Detail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Detail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Detail query()
 * @method static \Illuminate\Database\Eloquent\Builder|Detail whereArticleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Detail whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Detail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Detail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Detail whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Article|null $article
 */
class Detail extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function article()
    {
        return $this->belongsTo('App\Models\Article', 'article_id', 'id');
    }
}
