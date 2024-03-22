# Vite 项目打包
vite-build:
	bun install && bun run build
	make upyun

# 静态资源上云操作
upyun:
	sh deploy.sh

# Composer 更新依赖
composer-update:
	composer update

# ide-helper
ide:
	php artisan ide-helper:generate

# ide-model
ide-model:
	php artisan ide-helper:models

# 删除缓存
clear-cache:
	php artisan config:clear #配置缓存
	php artisan route:clear #路由缓存
	php artisan view:clear #视图缓存
	php artisan cache:clear #应用程序缓存

.PHONY: build
build:
	make vite-build
	make composer-update
	make clear-cache
