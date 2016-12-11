<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelatedArticleTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('categories', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('articles', function (Blueprint $table) {
			$table->increments('id');
            $table->integer('admin_id')->unsigned()->nullable();
            $table->integer('category_id')->unsigned()->nullable();
			$table->string('title')->nullable();
			$table->string('content')->nullable();
			$table->string('thumb_img_path')->nullable();
			$table->integer('views')->unsigned()->default(0);
			$table->string('status')->default('draft'); // public|private|draft
			$table->timestamp('publication_date')->nullable();
			$table->timestamps();
			$table->softDeletes();

			$table->foreign('admin_id')->references('id')->on('admins');
			$table->foreign('category_id')->references('id')->on('categories');
		});

        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('article_id')->unsigned()->nullable();
            $table->text('comment');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('article_id')->references('id')->on('articles');
        });

		Schema::create('article_images', function(Blueprint $table){
			$table->increments('id');
			$table->integer('article_id')->unsigned();
			$table->string('img_path');
			$table->timestamps();
			$table->softDeletes();

			$table->foreign('article_id')->references('id')->on('articles');
		});

		Schema::create('tags', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('tag_article', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('tag_id')->unsigned();
			$table->integer('article_id')->unsigned();
			$table->timestamps();
			$table->softDeletes();

			$table->foreign('tag_id')->references('id')->on('tags');
			$table->foreign('article_id')->references('id')->on('articles');
		});
	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::drop('article_images');
		Schema::drop('tag_article');
		Schema::drop('articles');
		Schema::drop('categories');
		Schema::drop('comments');
		Schema::drop('tags');
    }
}
