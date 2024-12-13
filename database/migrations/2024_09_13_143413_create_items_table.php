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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('Item_Id');
            $table->string('Item_Name');
            $table->string('Category');
            $table->string('Supplier');
            $table->integer('Quantity_in_Stock');
            $table->decimal('Unit_Price', 8, 2);
            $table->date('Date_Last_Ordered')->nullable();
            $table->date('Date_of_Restock')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
