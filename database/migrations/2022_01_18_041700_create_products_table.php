<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('code');
            $table->string('description');
            $table->foreignId('provider_id')->references('id')->on('providers')->cascadeOnDelete();
            $table->double('price');
            $table->double('provider_price')->nullable();
            $table->enum('wholesale',[0,1])->nullable();
            $table->integer('stock');
            $table->double('wholesale_price')->nullable();
            $table->integer('wholesale_quantity')->nullable();
            $table->string('photo')->nullable();
            $table->enum('status',[0,1])->default('1');
            $table->softDeletes();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
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
