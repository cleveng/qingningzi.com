<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Site
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $domain
 * @property string|null $title
 * @property string|null $keywords
 * @property string|null $description
 * @property int|null $subscribed
 * @property string|null $gtm_code
 * @property int|null $ads_enabled
 * @property int|null $allow_registration
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Site newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Site newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Site query()
 * @method static \Illuminate\Database\Eloquent\Builder|Site whereAdsEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Site whereAllowRegistration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Site whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Site whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Site whereDomain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Site whereGtmCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Site whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Site whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Site whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Site whereSubscribed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Site whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Site whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Site extends Model
{
    use HasFactory;
    protected $guarded = [];
}
