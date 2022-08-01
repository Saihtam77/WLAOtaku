<?php

use App\Models\Animes\animes;
use App\Models\Animes\categories;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animes_categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignIdFor(animes::class)
                ->references("id")
                ->on("animes")
                ->onDelete('cascade');

            $table->foreignIdFor(categories::class)
                ->references("id")
                ->on("categories")
                ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
