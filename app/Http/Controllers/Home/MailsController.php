<?php

namespace App\Http\Controllers\Home;

use App\Models\Email;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MailsController extends BaseController
{

    const __TITLE__ = '最新邮件订阅',
        __URL__ = '/emails',
        __KEYWORDS__ = '邮件订阅,最新邮件订阅,青柠邮件订阅,青柠子矜邮件订阅',
        __DESCRIPTION__ = '青柠邮件订阅，是由青柠子矜网开发的一款免费邮件订阅服务，用户只需要输入自己的邮箱地址即可收到最新的青柠资讯，青柠子矜网不会主动推广邮件订阅服务，不会收集用户隐私敏感问题，若需要定期发送邮件服务，在线留言即可。';

    public function index(Request $request)
    {
        SEOMeta::setTitle(self::__TITLE__);
        SEOMeta::addKeyword(self::__KEYWORDS__);
        SEOMeta::setDescription(self::__DESCRIPTION__);
        SEOMeta::setCanonical(url('/'));

        $page = $request->has('page') ? $request->get('page') : 1;
        $emails = Cache::remember(self::__URL__ . '_' . $page, $this->expiredAt, function () {
            return Email::orderBy('inputtime', 'desc')->paginate($this->prePage);
        });

        return view('pages.mails.index', [
            'data' => $emails,
            'url' => self::__URL__,
            'path' => self::__URL__,
            'title' => self::__TITLE__,
            'catid' => null
        ]);
    }

    public function show(Request $request, $id)
    {
        $email = Email::find($id);
        if (!$email) {
            abort(404);
        }

        SEOMeta::setTitle(self::__TITLE__);
        SEOMeta::addKeyword(self::__KEYWORDS__);
        SEOMeta::setDescription(self::__DESCRIPTION__);
        SEOMeta::setCanonical(url('/'));

        $email->content = Cache::remember(self::__URL__ . '_email_' . $id, $this->expiredAt, function () use ($email) {
            return json_decode($email->content);
        });

        return view('pages.mails.id', [
            'data' => $email,
            'url' => self::__URL__,
            'path' => self::__URL__,
            'title' => self::__TITLE__,
            'catid' => null
        ]);
    }
}
