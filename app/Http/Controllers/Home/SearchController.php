<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

class SearchController extends BaseController
{
    public function index(Request $request)
    {
        $keyword = $request->get("keyword") ?? env("APP_NAME");
        $domain = env("APP_DOMAIN");
        $url = "https://www.so.com/s?q=" . $keyword . "&ie=utf8&src=" . $domain . "&site=" . $domain . "&rg=1";
        return redirect($url, 302);
    }
}
