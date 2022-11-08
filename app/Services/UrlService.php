<?php

namespace App\Services;


use App\Models\Category;
use App\Models\iModel;
use Illuminate\Support\Facades\Cache;

class UrlService extends BaseService
{
    /**
     * Function: pos_url => postion url
     * @description
     * @param $id
     * @param null $catid
     * @return mixedpos_url
     */
    public function pos_url($id, $catid)
    {
        return Cache::remember('u_' . $catid . '_' . $id, $this->expiredAt, function () use ($catid, $id) {
            $category = Category::where('catid', $catid)->select('modelid')->first();
            $model = iModel::where('modelid', $category->modelid)->select('tablename')->first();
            $tablename = $model->tablename;
            return url($tablename . '/' . $id);
        });
    }
}
