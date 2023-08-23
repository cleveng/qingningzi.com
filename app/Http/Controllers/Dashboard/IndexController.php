<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Platform;
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

        $platforms = Platform::where('status', 1)->get();
        return view('dashboard.home.index', [
            'platforms' => $platforms,
        ]);
    }
}
