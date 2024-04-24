<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\DefaultStatus;
use App\Enums\Is_featured;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post1', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->tinyInteger('is_featured')->default(Is_featured::Yes->value);
            $table->tinyInteger('status')->default(DefaultStatus::Published->value);
            $table->string('image')->nullable();
            $table->text('excerpt');
            $table->text('content');
            $table->timestamp('posted_at')->nullable();
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post1');
    }
};
