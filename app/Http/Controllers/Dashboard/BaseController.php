<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected string $tmpl;

    public function __construct()
    {
        $this->tmpl = 'dashboard.';
    }
}
