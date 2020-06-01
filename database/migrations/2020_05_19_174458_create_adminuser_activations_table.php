<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminuserActivationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adminuser_activations', function (Blueprint $table) {
            $table->increments('id');
            
            
            $table->integer('id_user')->unsigned();
            $table->string('token');
            $table->timestamp('create_at')->default(DB::raw('CURRENT_TIMESTAMP'));
      
        });
        Schema::create('adminuser_activations', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('admin_users')->onDelete('cascade');
        });

        Schema::table('admin_users', function(Blueprint $table){
            $table->boolean('is_activated')->default(0);
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adminuser_activations');
    }
}
