<?php

use App\Models\Comment;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('publication_id')->references('id')->on('publications');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->longText('content');
            $table->enum('status', [
                Comment::STATUS_PENDIENTE,
                Comment::STATUS_APROBADO,
                Comment::STATUS_RECHAZADO
            ])->default(Comment::STATUS_PENDIENTE);
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
        Schema::dropIfExists('comments');
    }
}
