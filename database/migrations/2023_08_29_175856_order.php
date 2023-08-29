<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("orders",function(Blueprint $b){
            $b->id("order_id");
            $b->integer("user_id");
            $b->integer("product_id");
            $b->string("product_price");
            $b->integer("product_quantity");
            $b->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
