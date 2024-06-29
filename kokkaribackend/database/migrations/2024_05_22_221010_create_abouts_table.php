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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('email');
            $table->string('address');
            $table->string('phone');
            $table->string('managing_partner');
            $table->string('chef_partner');
            $table->string('general_manager');
            $table->string('executive_chef');
            $table->string('chef_de_cuisine');
            $table->string('office_manager');
            $table->string('sous_chefs');
            $table->string('pastry');
            $table->string('managers');
            $table->string('wine_buyer');
            $table->string('event_manager');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
