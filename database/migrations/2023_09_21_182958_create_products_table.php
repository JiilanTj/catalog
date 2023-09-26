<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // database/migrations/xxxx_xx_xx_create_products_table.php

        public function up()
        {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('category');
                $table->text('description');
                $table->decimal('price', 10, 2);
                $table->decimal('price_discount', 10, 2)->nullable();
                $table->json('images');       // Main product image
                $table->json('images1')->nullable();     // Additional images
                $table->json('images2')->nullable();
                $table->json('images3')->nullable();
                $table->json('images4')->nullable();
                $table->json('images5')->nullable();
                $table->timestamps();
            });
        }

};
