<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\Home\SubscriptionRequest;
use App\Models\Subscription;
use Redirect;

class SubscriptionController extends BaseController
{
    public function store(SubscriptionRequest $request)
    {
        $data = $request->except('_token');
        $record = Subscription::where('email', $data['email'])->first();
        if ($record) {
            return response()->json(['message' => '该邮箱已经订阅!!!'], 404);
        }

        $data['subscribed'] = true;
        Subscription::create($data);
        return response()->json(['message' => '订阅成功!!!'], 200);
    }

    public function update(Request $request)
    {
        // TODO: unsubscribe
    }
}
