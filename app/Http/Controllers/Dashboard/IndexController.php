<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class IndexController extends Controller
{

    public function index(Request $request)
    {
        // TODO: permission
        $auth = auth()->user();
        if (!$auth->is_admin) {
            return Redirect::to('/');
        }

        return view('dashboard.home.index', []);
    }
}
