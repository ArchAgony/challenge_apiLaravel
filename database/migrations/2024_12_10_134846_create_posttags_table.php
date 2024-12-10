<?php

use App\Models\Posts;
use App\Models\Tags;
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
        Schema::create('posttags', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Tags::class);
            $table->foreignIdFor(Posts::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posttags');
    }
};
