#### 阿里云 Composer 全量镜像
+ 全局配置
```
composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/
composer config -g --unset repos.packagist #取消
```

# 当前项目
```
composer config repo.packagist composer https://mirrors.aliyun.com/composer/
composer config --unset repos.packagist #取消
```

#### 本地开发
+ vagrant
+ php artisan serve


#### 部署
```
chmod -R 755 storage
chmod -R 755 bootstrap/cache
```


#### 更新
```
make build
```

#### TODO
+ 内容自动入库(多个源)，计划内
+ 图文视频自动推广到短视频平台，待定


#### [队列](https://laravel.com/docs/10.x/queues)
```
vim .env
QUEUE_CONNECTION=redis
REDIS_QUEUE=qrcode,thumb // 队列任务

php artisan make:job ProcessPodcast
php artisan queue:work --verbose [systemctl service]
```

#### [事件](https://laravel.com/docs/10.x/events)
```command
php artisan make:event ArticleViewed
php artisan make:listener UpdateArticleCount --event=ArticleViewed --queued
```
