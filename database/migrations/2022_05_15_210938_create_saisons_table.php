<?php

use App\Models\Animes\animes;
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
        Schema::create('saisons', function (Blueprint $table) {

            $table->id();
            $table->timestamps();
            
            $table->string("nom");
            $table->string("synopsis");
            $table->string("images");

            $table->foreignIdFor(animes::class)
                ->references("id")
                ->on("animes")
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
        Schema::dropIfExists('saisons');
    }
};
