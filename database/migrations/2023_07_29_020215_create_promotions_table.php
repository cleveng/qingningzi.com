<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('标题');
            $table->string('description')->default('')->comment('描述');
            $table->string('target_url')->default('')->comment('链接地址');
            $table->string('cover_image')->default('')->comment('封面');
            $table->smallInteger('promotion_type')->default(0)->comment('类型');
            $table->boolean('is_visible')->default(1)->comment('收否显示');
            $table->unsignedInteger('hit_count')->default(0)->comment('点击次数');
            $table->timestamp('expired_at')->nullable()->comment('过期时间');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotions');
    }
};
