<?php

namespace App\Providers;

use App\Events\ArticleViewed;
use App\Listeners\UpdateArticleCount;
use App\Listeners\UpdateArticleDetail;
use App\Listeners\UpdateAttachmentURL;
use App\Listeners\UpdateTagsCount;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        // 阅读文章
        ArticleViewed::class => [
            UpdateArticleCount::class,
            UpdateTagsCount::class,
            UpdateAttachmentURL::class,
            UpdateArticleDetail::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
