<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('name')->nullable();
            $table->string('pv_system_size')->nullable();
            $table->string('inverter_combination')->nullable();
            $table->boolean('is_indoor')->nullable();
            $table->string('color')->nullable();
            $table->double('maximum_space_available')->nullable();
            $table->string('dnsp')->nullable();
            $table->string('sld_file')->nullable();
            $table->string('other_document')->nullable();
            $table->boolean('is_in_house')->nullable();
            $table->date('test_date')->nullable();
            $table->string('site_contact')->nullable();
            $table->string('site_address')->nullable();
            $table->string('message')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('inquiry_categories')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inquiries');
    }
}
