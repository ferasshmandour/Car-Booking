<?php

use App\Models\User;
use App\Models\Admin;
use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('manufacturing_year');
            $table->decimal('price');
            $table->string('color');
            $table->string('photo', 1000);

            $table->foreignIdFor(Category::class, 'category_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignIdFor(Admin::class, 'admin_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignIdFor(User::class, 'user_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
