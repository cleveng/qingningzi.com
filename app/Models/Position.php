<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Position
 *
 * @property int $posid
 * @property int|null $modelid
 * @property int|null $catid
 * @property string $name
 * @property int $maxnum
 * @property string|null $extention
 * @property int $listorder
 * @property int $siteid
 * @property string $thumb
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PositionData[] $len
 * @property-read int|null $len_count
 * @method static \Illuminate\Database\Eloquent\Builder|Position newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Position newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Position query()
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereCatid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereExtention($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereListorder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereMaxnum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereModelid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position wherePosid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereSiteid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereThumb($value)
 * @mixin \Eloquent
 */
class Position extends Model
{
    use HasFactory;

    protected $table = 'position';
    protected $primaryKey = 'posid';
    protected $guarded = [];
    public $timestamps = false;

    public function content($len = 6)
    {
        return $this->hasMany('App\Models\PositionData', 'posid', 'posid')
            ->select(['data'])->inRandomOrder()->take($len);
    }

    public function len()
    {
        return $this->hasMany('App\Models\PositionData', 'posid', 'posid')
            ->select(['data']);
    }
}
