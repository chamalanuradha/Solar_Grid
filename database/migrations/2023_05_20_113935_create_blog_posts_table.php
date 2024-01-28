<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('slug')->nullable();
            $table->string('title_on_tab')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();

            $table->string('post_title')->nullable();
            $table->text('section_one_text')->nullable();
            $table->text('section_two_text')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('cover_image_alt')->nullable();

            $table->string('main_video_thumbnail')->nullable();
            $table->string('main_video_url')->nullable();

            $table->string('main_quote')->nullable();
            $table->text('main_quote_description')->nullable();

            $table->string('sub_section_one_title')->nullable();
            $table->text('sub_section_one_text')->nullable();
            $table->string('images_array')->nullable();

            $table->string('sub_section_two_title')->nullable();
            $table->text('sub_section_two_text')->nullable();

            $table->date('post_date')->nullable();

            $table->tinyInteger('status')->nullable()->default(1)->comment('1 = Active, 0 = Inactive');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('post_categories')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_posts');
    }
}
