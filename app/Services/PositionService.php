<?php

namespace App\Services;

use App\Models\Hit;
use App\Models\iModel;
use App\Models\Position;
use App\Models\Video;

class PositionService extends BaseService
{
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
    }


    public function random($posid, $len = 4, $strict = false)
    {

    }


    public function name($id)
    {
        return [];
    }


    public function category($id)
    {
        return [];
    }

    //hitsid字段 存储的就是 c-模型ID-文章ID
    public function hits($article_id, $category_id)
    {
        return [];
    }
}
