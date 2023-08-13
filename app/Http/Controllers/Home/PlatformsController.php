<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

class PlatformsController extends BaseController
{
    public function index(Request $request)
    {
        // TODO: Platforms
        return redirect(url('/'), 302);
    }
}
