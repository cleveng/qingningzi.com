<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Idol
 *
 * @property int $id
 * @property string $username 明星名称
 * @property string|null $profile_url 头像
 * @property string|null $thumb 封面
 * @property string|null $keywords 关键词
 * @property string|null $description 描述
 * @property int $status 是否显示
 * @property string|null $url 文章链接
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Idol newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Idol newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Idol query()
 * @method static \Illuminate\Database\Eloquent\Builder|Idol whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idol whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idol whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idol whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idol whereProfileUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idol whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idol whereThumb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idol whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idol whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idol whereUsername($value)
 * @mixin \Eloquent
 */
class Idol extends Model
{
    use HasFactory;

}
