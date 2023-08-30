<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PositionData
 *
 * @property int $id
 * @property int $catid
 * @property int $posid
 * @property string|null $module
 * @property int|null $modelid
 * @property int $thumb
 * @property string|null $data
 * @property int $siteid
 * @property int|null $listorder
 * @property int $expiration
 * @property string|null $extention
 * @property int|null $synedit
 * @method static \Illuminate\Database\Eloquent\Builder|PositionData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PositionData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PositionData query()
 * @method static \Illuminate\Database\Eloquent\Builder|PositionData whereCatid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PositionData whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PositionData whereExpiration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PositionData whereExtention($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PositionData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PositionData whereListorder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PositionData whereModelid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PositionData whereModule($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PositionData wherePosid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PositionData whereSiteid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PositionData whereSynedit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PositionData whereThumb($value)
 * @mixin \Eloquent
 */
class PositionData extends Model
{
    use HasFactory;
    public $timestamps = false;
}
