<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Illuminate\Http\Request;

/**
 * @Controller: RedirectController
 */
class RedirectController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->get('target_id');
        if (!$id) {
            return redirect('/', 302);
        }

        $data = Promotion::where('id', $id)->first();
        if (!$data) {
            return redirect('/', 302);
        }

        $data->increment('hit_count');
        return redirect($data->target_url, 302);
    }
}
