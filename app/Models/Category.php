<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

}
