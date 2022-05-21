<?php

use App\Models\Animes\seasonals;
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
        Schema::create('animes', function (Blueprint $table) {
            
            $table->id();
            $table->timestamps();
            
            $table->string("nom");
            $table->string("auteur");
            $table->string("synopsis");
            $table->string("date_diffusion");
            $table->string("image");

            $table->foreignIdFor(seasonals::class)
                ->references("id")
                ->on("seasonals")
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
        Schema::dropIfExists('animes');
    }
};
