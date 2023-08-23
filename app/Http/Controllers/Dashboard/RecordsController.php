<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Redirect;

class RecordsController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->except(['_token']);
        $data['uid'] = intval($data['uid']);
        $data['category_id'] = intval($data['category_id']);
        $data['platform_id'] = intval($data['platform_id']);

        if (Record::where('uid', $data['uid'])->first()) {
            return Redirect::back()->withErrors(['message' => '数据已经存在!!!']);
        }

        $except_words = [];
        if (strlen($data['except_words']) > 0) {
            if (Str::contains(",", $data['except_words'])) {
                $except_words = implode(',', $data['except_words']);
            } else {
                $except_words[] = $data['except_words'];
            }
        }
        $data['except_words'] = json_encode($except_words);

        $data['is_valid'] = $data['is_valid'] ? $data['is_valid'] === "on" : false;
        if (!Record::create($data)) {
            return Redirect::back()->withErrors(['message' => '创建数据失败!!!']);
        }

        return Redirect::back()->with(['message' => '创建成功!!!']);
    }
}
