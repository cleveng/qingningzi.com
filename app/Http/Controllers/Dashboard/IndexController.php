<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

class IndexController extends BaseController
{

    public function index(Request $request)
    {
        return view($this->tmpl.'home.index', []);
    }
}
