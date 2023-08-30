<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Platform
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $url
 * @property string|null $thumb
 * @property string|null $qrcode
 * @property int|null $status
 * @property int|null $views_count
 * @property int|null $hit_count
 * @property int|null $post_count
 * @property int|null $article_count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $content_type
 * @property int|null $parent_id
 * @property string|null $title
 * @property string|null $keywords
 * @property string|null $description
 * @property int|null $order
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Article[] $articles
 * @property-read int|null $articles_count
 * @method static \Illuminate\Database\Eloquent\Builder|Platform newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Platform newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Platform query()
 * @method static \Illuminate\Database\Eloquent\Builder|Platform whereArticleCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Platform whereContentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Platform whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Platform whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Platform whereHitCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Platform whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Platform whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Platform whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Platform whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Platform whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Platform wherePostCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Platform whereQrcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Platform whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Platform whereThumb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Platform whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Platform whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Platform whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Platform whereViewsCount($value)
 * @mixin \Eloquent
 */
class Platform extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function articles()
    {
        return $this->hasMany('App\Models\Article', 'platform_id', 'id');
    }
}
