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
        Schema::create("products",function(Blueprint $t){
            $t->id("p_id");
            $t->string("p_catagory_id");
            $t->string("p_name");
            $t->integer("p_price");
            $t->string("p_description");
            $t->integer("p_rating");
            $t->string("p_offer_price");
            $t->string("p_image");
            $t->timestamps();
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
