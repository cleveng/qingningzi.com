<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Link
 *
 * @property int $id
 * @property int $link_type 分类
 * @property string $name 显示名称
 * @property string|null $introduce 简介
 * @property string|null $logo logo
 * @property string|null $url 链接地址
 * @property string|null $username 站长名
 * @property string|null $email 站长邮箱
 * @property int $order 排序
 * @property int $status 是否显示
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Link newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Link newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Link query()
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereIntroduce($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereLinkType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereUsername($value)
 * @mixin \Eloquent
 */
class Link extends Model
{
    use HasFactory;
}
