<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Promotion
 *
 * @property int $id
 * @property string $title 标题
 * @property string $description 描述
 * @property string $target_url 链接地址
 * @property string $cover_image 封面
 * @property int $promotion_type 类型
 * @property int $is_visible 收否显示
 * @property int $views_count 访问量
 * @property int $hit_count 点击次数
 * @property string|null $expired_at 过期时间
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion newQuery()
 * @method static \Illuminate\Database\Query\Builder|Promotion onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion query()
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereCoverImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereExpiredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereHitCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereIsVisible($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion wherePromotionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereTargetUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereViewsCount($value)
 * @method static \Illuminate\Database\Query\Builder|Promotion withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Promotion withoutTrashed()
 * @mixin \Eloquent
 */
class Promotion extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

}
