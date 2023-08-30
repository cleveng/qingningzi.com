<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Record
 *
 * @property int $id
 * @property int|null $uid
 * @property int|null $category_id
 * @property int|null $platform_id
 * @property int|null $rate
 * @property string|null $writer
 * @property int|null $is_valid
 * @property string|null $except_words
 * @property string|null $sample_link 示例链接
 * @property int|null $fetch_count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category|null $category
 * @property-read \App\Models\Platform|null $platform
 * @method static \Illuminate\Database\Eloquent\Builder|Record newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Record newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Record query()
 * @method static \Illuminate\Database\Eloquent\Builder|Record whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Record whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Record whereExceptWords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Record whereFetchCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Record whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Record whereIsValid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Record wherePlatformId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Record whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Record whereSampleLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Record whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Record whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Record whereWriter($value)
 * @mixin \Eloquent
 */
class Record extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function platform(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Platform', 'platform_id', 'id');
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }
}
