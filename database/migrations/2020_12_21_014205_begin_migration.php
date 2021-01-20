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
      //lvl1
      Schema::create('companies', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('name');
          $table->string('description')->nullable();

          $table->timestamps();
          $table->softDeletes();
      });

      Schema::create('branch_offices', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('company_id');
          $table->string('name');
          $table->string('country')->nullable();
          $table->string('city')->nullable();
          $table->string('address')->nullable();
          $table->integer('number')->nullable();
          $table->decimal('latitude', 11, 8)->nullable();
          $table->decimal('longitude', 11, 8)->nullable();

          $table->foreign('company_id')->references('id')->on('companies');
          $table->timestamps();
          $table->softDeletes();
      });

      Schema::create('tables', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('branch_office_id');
          $table->string('identifier');

          $table->foreign('branch_office_id')->references('id')->on('branch_offices');
          $table->timestamps();
          $table->softDeletes();
      });

      Schema::create('waiters', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('name');

          $table->timestamps();
          $table->softDeletes();
      });

      Schema::create('sales', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('waiter_id')->nullable();
          $table->unsignedBigInteger('table_id');
          $table->dateTime('date');
          $table->decimal('total', 8, 2)->nullable();
          $table->enum('status', ['open', 'paid_out']);

          $table->foreign('waiter_id')->references('id')->on('waiters');
          $table->foreign('table_id')->references('id')->on('tables');
          $table->timestamps();
          $table->softDeletes();
      });





      //2
      Schema::create('categories', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('name');

          $table->timestamps();
          $table->softDeletes();
      });

      Schema::create('subcategories', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('category_id');
          $table->string('name');

          $table->foreign('category_id')->references('id')->on('categories');
          $table->timestamps();
          $table->softDeletes();
      });

      Schema::create('products', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('subcategory_id');
          $table->unsignedBigInteger('branch_office_id');
          $table->string('name');
          $table->string('description')->nullable();
          $table->decimal('price', 8, 2)->nullable();
          $table->boolean('status')->default(0);

          $table->foreign('subcategory_id')->references('id')->on('subcategories');
          $table->foreign('branch_office_id')->references('id')->on('branch_offices');
          $table->timestamps();
          $table->softDeletes();
      });

      Schema::create('promotions', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('branch_office_id');
          $table->string('name');
          $table->string('description')->nullable();
          $table->decimal('price', 8, 2);

          $table->foreign('branch_office_id')->references('id')->on('branch_offices');
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







      //3
      Schema::create('levels', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('name');
          $table->string('description');

          $table->timestamps();
          $table->softDeletes();
      });

      Schema::create('clans', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('name');
          $table->string('description');

          $table->timestamps();
          $table->softDeletes();
      });

      Schema::create('clients', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('level_id')->nullable();
          $table->unsignedBigInteger('clan_id')->nullable();
          $table->string('email')->unique()->nullable();
          $table->string('name')->nullable();
          $table->string('nickname')->nullable();
          $table->bigInteger('phone_number')->nullable();
          $table->boolean('show')->default(0);
          $table->bigInteger('experience')->default(0);
          $table->string('facebook_id')->nullable();
          $table->string('country')->nullable();
          $table->string('city')->nullable();
          $table->string('address')->nullable();
          $table->string('address_number')->nullable();
          $table->string('password')->nullable();

          $table->foreign('level_id')->references('id')->on('levels');
          $table->foreign('clan_id')->references('id')->on('clans');
          $table->timestamps();
          $table->softDeletes();
      });

      Schema::create('client_tables', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('client_id')->nullable();
          $table->unsignedBigInteger('table_id');
          // $table->string('user_name')->nullable();
          $table->dateTime('entry_date');
          $table->dateTime('exit_date')->nullable();

          $table->foreign('client_id')->references('id')->on('clients');
          $table->foreign('table_id')->references('id')->on('tables');
          $table->timestamps();
          $table->softDeletes();
      });




      //4
      Schema::create('sale_details', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('client_id');
          $table->unsignedBigInteger('product_id');
          $table->unsignedBigInteger('sale_id');
          $table->unsignedBigInteger('promotion_id')->nullable();

          $table->dateTime('date');
          $table->string('amount');
          $table->decimal('price', 8, 2);

          $table->foreign('client_id')->references('id')->on('clients');
          $table->foreign('product_id')->references('id')->on('products');
          $table->foreign('sale_id')->references('id')->on('sales');
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
      Schema::dropIfExists('sale_details');

      Schema::dropIfExists('client_tables');
      Schema::dropIfExists('promotion_items');
      Schema::dropIfExists('promotions');
      Schema::dropIfExists('products');
      Schema::dropIfExists('subcategories');
      Schema::dropIfExists('categories');

      Schema::dropIfExists('sales');
      Schema::dropIfExists('waiters');
      Schema::dropIfExists('tables');
      Schema::dropIfExists('branch_offices');
      Schema::dropIfExists('companies');

      Schema::dropIfExists('clients');
      Schema::dropIfExists('clans');
      Schema::dropIfExists('levels');
    }
}
