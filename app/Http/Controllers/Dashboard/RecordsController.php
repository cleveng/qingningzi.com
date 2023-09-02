<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Platform;
use App\Models\Record;
use Illuminate\Http\Request;
use Redirect;

class RecordsController extends BaseController
{

    public function index(Request $request)
    {
        $data = Record::orderBy('updated_at', 'desc')->paginate();
        return view($this->tmpl.'records.index', [
            'data' => $data,
        ]);
    }

    public function create(Request $request)
    {
        $platforms = Platform::where('status', 1)->get();
        return view($this->tmpl.'records.create', [
            'platforms' => $platforms,
        ]);
    }

    public function edit(Request $request, $id)
    {
        $platforms = Platform::where('status', 1)->get();

        $data = Record::find($id);
        if (!$data) {
            return Redirect::to('/dashboard/records', 302);
        }

        return view($this->tmpl.'records.edit', [
            'platforms' => $platforms,
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->except(['_token']);
        $data['uid'] = intval($data['uid']);
        $data['category_id'] = intval($data['category_id']);
        $data['platform_id'] = intval($data['platform_id']);

        if (Record::where('uid', $data['uid'])->first()) {
            return Redirect::back()->withErrors(['message' => '数据已经存在!!!']);
        }

        $data['is_valid'] = isset($data['is_valid']) ? $data['is_valid'] === "on" : false;
        if (!Record::create($data)) {
            return Redirect::back()->withErrors(['message' => '创建数据失败!!!']);
        }

        return Redirect::back()->with(['message' => '创建成功!!!']);
    }

    public function update(Request $request,$id)
    {
        $record = Record::find($id);
        if (!$record) {
            return Redirect::to('/dashboard/records', 302);
        }

        $data = $request->except(['_token']);
        $record->uid = intval($data['uid']);
        $record->category_id = intval($data['category_id']);
        $record->platform_id = intval($data['platform_id']);
        $record->rate = intval($data['rate']);
        $record->except_words = $data['except_words'];
        $record->sample_link = $data['sample_link'];
        $record->writer = $data['writer'];
        $record->is_valid = isset($data['is_valid']) ? $data['is_valid'] === "on" : false;
        if (!$record->save()) {
            return Redirect::back()->withErrors(['message' => '更新数据失败!!!']);
        }

        return Redirect::back()->with(['message' => '更新成功!!!']);

    }
}
