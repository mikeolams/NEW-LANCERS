<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->integer('estimate_id')->nullable();
            $table->string('tracking_code')->nullable();
            $table->integer('invoice_id')->nullable();
            $table->integer('progress')->default(0)->nullable();
            $table->text('collaborators')->nullable();
            $table->enum('status', ['pending', 'in-progress', 'completed']);
            $table->integer('contract_id')->nullable();
            $table->timestamps();
             $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade')->onUpdate('cascade');
              $table->foreign('client_id')
                    ->references('id')->on('clients')
                    ->onDelete('cascade')->onUpdate('cascade');
              
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
