<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstimatesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('estimates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('project_id');
            $table->integer('time');
            $table->integer('price_per_hour');
            $table->integer('equipment_cost')->nullable();
            $table->text('sub_contractors')->nullable();
            $table->text('sub_contractors_cost')->nullable();
            //$table->text('sub_contractors')->nullable();
            $table->integer('similar_projects');
            $table->integer('rating');
            $table->integer('currency_id');
            $table->float('estimate', 15, 2);
            $table->date('start');
            $table->date('end');
            $table->timestamps();
             $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('project_id')
                    ->references('id')->on('projects')
                    ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('estimates');
    }

}
