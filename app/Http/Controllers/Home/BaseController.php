<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected string $title;
    protected string $keywords;
    protected string $description;
    protected string $url;
    protected int $expiredAt;
    protected int $prePage;
    protected int $duration;
    protected string $defaultThumb;

    public function __construct()
    {
        $this->prePage = 12;
        $this->expiredAt = 20;
        $this->title = env('APP_NAME');
        $this->keywords = '青柠子矜,青柠子衿,恋爱博客,恋爱经历,恋爱分析,青青子衿,恋爱电影,恋爱技巧,青柠子,qingningzi';
        $this->description = '爱情总是想象比现实美丽，相逢如是，告别亦如是。我们以为爱得很深、很深，来日岁月，会让你知道，它不过很浅、很浅。最深最重的爱，必须和时日一起成长。因为爱情的缘故，两个陌生人可以突然熟络到睡在同一张床上。然而，相同的两个人，在分手时却说，我觉得你越来越陌生。爱情将两个人由陌生变成熟悉，又由熟悉变成陌生。爱情正是一个将一对陌生人变成情侣，又将一对情侣变成陌生人的游戏？';
        $this->url = env('APP_URL');
        $this->duration = env('APP_DEBUG') ? 0 : 3600 * 24 * 31;
        $this->defaultThumb = 'https://source.unsplash.com/featured/720x368?t=';
    }
}
