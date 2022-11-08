<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Hit;
use App\Models\iModel;
use App\Models\Position;
use App\Models\PositionData;
use App\Models\Video;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class PositionService extends BaseService
{

    public function travel()
    {
        return [];
//        $position = Position::where('posid', 12)->first();
//        foreach ($position->content as $key => $content) {
//            $temp = json_decode($content['data']);
//            $video = Video::where('title', $temp->title)->select('catid')->first();
//            if (!!$video) {
//                $result = new \stdClass();
//                $result->catid = isset($video->catid) ? $video->catid : null;
//                $result->title = isset($temp->title) ? $temp->title : null;
//                $result->stars = isset($temp->stars) ? $temp->stars : null;
//                $result->thumb = isset($temp->thumb) ? $temp->thumb : null;
//                $result->description = isset($temp->description) ? $temp->description : null;
//                $position->content[$key] = $result;
//            } else {
//                unset($position->content[$key]);
//            }
//
//        }
//        return $position->content;
    }

    public function content($id)
    {
        return [];
        $position = Position::where('posid', $id)->first();

        foreach ($position->content as $key => $content) {
            $temp = json_decode($content['data']);
            $video = Video::where('title', $temp->title)->select(['catid', 'id'])->first();
            if (!!$video) {
                $result = new \stdClass();
                $result->catid = isset($video->catid) ? $video->catid : null;
                $result->id = isset($video->id) ? $video->id : null;
                $result->title = isset($temp->title) ? $temp->title : null;
                $result->stars = isset($temp->stars) ? $temp->stars : null;
                $result->thumb = isset($temp->thumb) ? $temp->thumb : null;
                $result->description = isset($temp->description) ? $temp->description : null;
                $result->inputtime = isset($temp->inputtime) ? $temp->inputtime : null;
                $position->content[$key] = $result;
            } else {
                unset($position->content[$key]);
            }

        }

        return $position->content;
    }

    public function len($id, $len = 4, $strict = false)
    {

        return [];
        return Cache::remember('p_' . $id . '_' . $len, $this->expiredAt, function () use ($id, $len) {

            $arr = PositionData::where('posid', $id)->take($len)->get();

            foreach ($arr as $key => $content) {

                $temp = json_decode($content['data']);
                // 存在不同的tablename
                $imodal = iModel::where('modelid', $content->modelid)->select(['tablename'])->first();

                $video = DB::table($imodal->tablename)->where('title', $temp->title)->select(['catid', 'id'])->first();

                if (!!$video) {
                    $result = new \stdClass();
                    $result->catid = isset($video->catid) ? $video->catid : null;
                    $result->id = isset($video->id) ? $video->id : null;
                    $result->title = isset($temp->title) ? $temp->title : null;
                    $result->stars = isset($temp->stars) ? $temp->stars : null;
                    $result->thumb = isset($temp->thumb) ? $temp->thumb : null;
                    $result->description = isset($temp->description) ? $temp->description : null;
                    $result->inputtime = isset($temp->inputtime) ? $temp->inputtime : null;
                    $arr[$key] = $result;
                } else {
                    unset($arr[$key]);
                }

            }

            return $arr;
        });


    }


    public function random($posid, $len = 4, $strict = false)
    {

    }


    public function name($id)
    {
        return [];
        return Position::where('posid', $id)->first()->name;
    }


    public function category($id)
    {
        return [];
        $category = Category::where('catid', $id)->select(['catname'])->first();
        return $category->catname;
    }

    //hitsid字段 存储的就是 c-模型ID-文章ID
    public function hits($article_id, $category_id)
    {
        return [];
        $category = Category::where('catid', $category_id)->first();
        // modelid
        //c-$category->modelid-$article_id $category_id

        $hitsid = 'c-' . $category->modelid . '-' . $article_id;
        $hit = Cache::remember($hitsid, $this->expiredAt, function () use ($hitsid, $category_id) {
            return Hit::where('hitsid', $hitsid)->where('catid', $category_id)->select('views')->first();
        });
        return $hit ? $hit->views : 99;
    }
}
