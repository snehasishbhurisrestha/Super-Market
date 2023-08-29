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
        Schema::table("users",function(Blueprint $b){
            $b->string("phone")->after("email_verified_at");
            $b->string("address")->after("phone")->nullable();
            $b->string("role")->after("address");
            $b->string("image")->after("password")->nullable();
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
