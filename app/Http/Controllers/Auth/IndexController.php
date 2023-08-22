<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Platform;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
use Vinkla\Hashids\Facades\Hashids;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $signature = Hashids::encode(time());
        Redis::set('signature', $signature);
        $platforms = Platform::where('status', 1)->get();
        return view('account.index', [
            'platforms' => $platforms,
            'signature' => $signature,
        ]);
    }

    public function records(Request $request)
    {
        $signature = Redis::get('signature');
        if ($signature !== $request->get('signature')) {
            return Redirect::back()->withErrors(['message' => '参数非法!!!']);
        }

        $data = $request->except(['_token', 'signature']);
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

        return Redirect::back();
    }
}
