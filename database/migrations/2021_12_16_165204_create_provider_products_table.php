<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProviderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provider_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->foreignId('product_provider_id');
            $table->string('name', 100);
            $table->string('code', 50)->unique();
            $table->bigInteger('price')->nullable();
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
        Schema::dropIfExists('provider_products');
    }
}
