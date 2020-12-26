<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BeginMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('categories', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('name');

          $table->timestamps();
          $table->softDeletes();
      });

      Schema::create('sub_categories', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('subcategory_id');
          $table->string('name');

          $table->foreign('subcategory_id')->references('id')->on('categories');
          $table->timestamps();
          $table->softDeletes();
      });

      Schema::create('products', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('subcategory_id');
          $table->string('name');
          $table->string('description')->nullable();
          $table->decimal('price', 8, 2)->nullable();
          $table->boolean('status')->default(0);

          $table->foreign('subcategory_id')->references('id')->on('sub_categories');
          $table->timestamps();
          $table->softDeletes();
      });

      Schema::create('promotions', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('name');
          $table->string('description')->nullable();
          $table->decimal('price', 8, 2);

          $table->timestamps();
          $table->softDeletes();
      });

      Schema::create('promotion_items', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('product_id');
          $table->unsignedBigInteger('promotion_id');
          $table->string('amount');
          $table->decimal('price', 8, 2);

          $table->foreign('product_id')->references('id')->on('products');
          $table->foreign('promotion_id')->references('id')->on('promotions');
          $table->timestamps();
          $table->softDeletes();
      });





    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('products');
      Schema::dropIfExists('categories');
    }
}
