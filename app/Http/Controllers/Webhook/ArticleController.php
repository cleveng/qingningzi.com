<?php

namespace App\Http\Controllers\Webhook;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Jobs\ProcessThumb;
use App\Models\Article;
use App\Models\Category;
use App\Models\Platform;
use App\Models\Post;
use Illuminate\Http\JsonResponse;

class ArticleController extends Controller
{

    protected $platform;

    public function __construct()
    {
        $this->platform = Platform::find(20);
    }

    /**
     * @param ArticleRequest $request
     * @return JsonResponse
     */
    public function callback(ArticleRequest $request)
    {

        $validated = $request->validated();
        if (!$validated) {
            return response()->json([
                'message' => '数据验证失败',
            ], 404);
        }

        $data = $request->except(['_method']);
        $category = Category::find($data['category_id']);
        if (!$category) {
            return response()->json([
                'message' => '栏目不存在',
            ], 404);
        }

        $platform = isset($data['platform']) ? Platform::firstOrCreate(['name' => $data['platform']['name']]) : $this->platform;

        unset($data['platform']);
        $data['platform_id'] = $platform->id;

        $result = $category->id === 13 ? Article::create($data) : Post::create($data);
        if (!$result) {
            return response()->json([
                'message' => '创建失败',
            ], 404);
        }

        // TODO: 批量图片保存到本地
        // TODO: 封面图片尺寸调整
        if ($data['thumb'] && \Str::contains($data['thumb'], 'http')) {
            ProcessThumb::dispatch($result, $result['thumb'])->onQueue('thumb');
        }

        return response()->json([
            'message' => 'ok',
        ]);
    }
}
