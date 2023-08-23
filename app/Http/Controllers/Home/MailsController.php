<?php

namespace App\Http\Controllers\Home;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;

/**
 * @controller: mails
 */
class MailsController extends BaseController
{
    public function index(Request $request): \Illuminate\Routing\Redirector|Application|\Illuminate\Http\RedirectResponse
    {
        return redirect(url('/'), 302);
    }
}
