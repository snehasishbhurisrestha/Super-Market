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
        Schema::create("payments",function(Blueprint $b){
            $b->id("pay_id");
            $b->integer("user_id");
            $b->string("payment_id")->nullable();
            $b->string("rezorpay_id")->nullable();
            $b->boolean("payment_done")->default(false);
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
