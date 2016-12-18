<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelatedPostTables extends Migration
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

		Schema::create('posts', function (Blueprint $table) {
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
            $table->integer('post_id')->unsigned()->nullable();
            $table->text('comment');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('post_id')->references('id')->on('posts');
        });

		Schema::create('post_images', function(Blueprint $table){
			$table->increments('id');
			$table->integer('post_id')->unsigned();
			$table->string('img_path');
			$table->timestamps();
			$table->softDeletes();

			$table->foreign('post_id')->references('id')->on('posts');
		});

		Schema::create('tags', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('tag_post', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('tag_id')->unsigned();
			$table->integer('post_id')->unsigned();
			$table->timestamps();
			$table->softDeletes();

			$table->foreign('tag_id')->references('id')->on('tags');
			$table->foreign('post_id')->references('id')->on('posts');
		});
	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::drop('post_images');
		Schema::drop('tag_post');
		Schema::drop('posts');
		Schema::drop('categories');
		Schema::drop('comments');
		Schema::drop('tags');
    }
}
