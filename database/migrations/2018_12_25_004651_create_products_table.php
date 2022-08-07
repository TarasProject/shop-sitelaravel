<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type_object')->nullable();
            $table->string('firm_object')->nullable();
            $table->string('model_object')->nullable();
            $table->string('file_name')->nullable();
            $table->string('file_size')->nullable();


            $table->integer('price')->nullable();
            $table->string('type_currency')->nullable();

            $table->string('condition')->nullable();
            $table->string('phone')->nullable();
            $table->string('more_information')->nullable();
            $table->string('remember')->default(App\Models\Product::REMEMBER_FALSE);
            $table->unsignedInteger('store_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
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
        Schema::dropIfExists('products');
    }
}
