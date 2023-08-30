<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Article
 *
 * @property int $id
 * @property string $title 标题
 * @property string|null $description 描述
 * @property string|null $thumb 封面
 * @property string|null $qrcode 二维码
 * @property string $shortcode 链接地址
 * @property string|null $author 作者
 * @property int $category_id 栏目
 * @property int|null $platform_id 平台
 * @property int $status 是否显示
 * @property string|null $source_url
 * @property int $order 排序
 * @property int $rate 评分
 * @property int|null $views_count
 * @property int|null $hit_count
 * @property-read int|null $comments_count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Attachment|null $attachment
 * @property-read \App\Models\Category|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read \App\Models\Platform|null $platform
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article query()
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereCommentsCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereHitCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article wherePlatformId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereQrcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereShortcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereSourceUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereThumb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereViewsCount($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Detail|null $detail
 */
class Article extends Model
{
    use HasFactory;

    protected $prefix;

    protected $guarded = [];

    public function __construct()
    {
        $this->prefix = "s/";
    }

    public function platform(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Platform', 'platform_id', 'id');
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function getShortcodeAttribute(): string
    {
        return $this->prefix . $this->attributes['shortcode'];
    }

    public function tags()
    {
        return $this->morphMany('App\Models\Tag', 'taggable');
    }

    public function attachment()
    {
        return $this->hasOne('App\Models\Attachment', 'article_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'article_id', 'id');
    }

    public function detail()
    {
        return $this->hasOne('App\Models\Detail', 'article_id', 'id');
    }
}
