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

####
+ 内容自动入库(多个源)
+ TODO: 图文视频自动推广到短视频平台

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

#### [二维码](https://www.pwmqr.com/qrcodeapi)
```
php artisan schedule:list
php artisan schedule:work
```

#### [icon](https://feathericons.com/)

#### _ide_helper
```
ide-helper:eloquent
ide-helper:generate
ide-helper:meta
ide-helper:models
make:factory
```

#### [又拍云CDN](https://www.upyun.com/?utm_source=lianmeng&utm_medium=referral)

~ 本项目使用又拍云CDN，每个月免费10G存储空间、HTTP(S)CDN流量

~ [又拍云CDN](https://www.upyun.com/?utm_source=lianmeng&utm_medium=referral)

~ 又拍云UPX🚀[使用文档](https://github.com/upyun/upx)

```
  wget -O ~/upx.tar.gz https://collection.b0.upaiyun.com/softwares/upx/upx_0.4.3_Linux_x86_64.tar.gz
  tar -xf ~/upx.tar.gz -C ~
  chmod +x ~/upx
  mv ~/upx /usr/local/bin
```

#### 基于LNP的关键词，标题，描述生成
+ 待定
+ 
