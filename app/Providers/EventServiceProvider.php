<?php

namespace App\Providers;

use App\Events\UpdateArticle;
use App\Events\UpdateAttachment;
use App\Events\UpdateTag;
use App\Listeners\UpdateArticleListener;
use App\Listeners\UpdateAttachmentListener;
use App\Listeners\UpdateTagListener;
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

        // 更新article *_count 数据
        UpdateArticle::class => [
            UpdateArticleListener::class,
        ],

        // 更新article tag 数据
        UpdateTag::class => [
            UpdateTagListener::class,
        ],

        // 更新 attachment
        UpdateAttachment::class => [
            UpdateAttachmentListener::class,
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
