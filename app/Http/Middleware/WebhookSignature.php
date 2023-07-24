<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WebhookSignature
{

    /**
     * @param Request $request
     * @param Closure $next
     * @return JsonResponse|mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // WEBHOOK_NAME => 自定义请求头本身有下划线_的，则要配置 underscores_in_headers on;
        $name = $request->header('WEBHOOK-NAME');
        $passwd = $request->header('WEBHOOK-PASSWD');

        // 判断 Header 中是否携带 name 和 password 参数
        if (!isset($name) || !isset($passwd)) {
            return response()->json(['error' => 'Invalid'], 403);
        }

        // 比较 Header 中的 WEBHOOK_NAME 和 WEBHOOK_PASSWD 参数
        if ($name !== env('WEBHOOK_NAME') || $passwd !== env('WEBHOOK_PASSWD')) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
