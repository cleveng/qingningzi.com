<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * App\Models\Category
 *
 * @method static find($id)
 * @property int $id
 * @property int $content_type 模型
 * @property int $parent_id 父栏目
 * @property string $title 名称
 * @property string|null $keywords 关键词
 * @property string|null $description 描述
 * @property string|null $thumb 封面
 * @property string|null $url 地址
 * @property int $order 排序
 * @property int $status 菜单显示
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Category[] $children
 * @property-read int|null $children_count
 * @property-read \App\Models\Content|null $content
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereContentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereThumb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUrl($value)
 * @mixin \Eloquent
 */
class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fields = ['id', 'title', 'content_type', 'keywords', 'description', 'thumb', 'url'];

    public function parent()
    {
        if ($this->parent_id === 0) {
            return null;
        }
        return DB::table($this->table)->where('id', $this->parent_id)->first();
    }

    public function children(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\Category', 'parent_id', 'id')
            ->select($this->fields);
    }

    public function content()
    {
        return $this->hasOne('App\Models\Content', 'category_id', 'id');
    }

}
