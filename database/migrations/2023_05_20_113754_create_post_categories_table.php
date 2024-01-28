<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePostCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        $data = [
            ['name' => 'Basics'],
            ['name' => 'Installation Guides'],
            ['name' => 'Panel Technologies'],
            ['name' => 'Inverters and Converters'],
            ['name' => 'Battery Storage'],
            ['name' => 'System Design'],
            ['name' => 'Financing and Incentives'],
            ['name' => 'Maintenance and Troubleshooting'],
            ['name' => 'Efficiency Tips'],
            ['name' => 'Industry News and Updates'],
            ['name' => 'Case Studies and Success Stories'],
            ['name' => 'Environmental Benefits'],
            ['name' => 'Residential Applications'],
            ['name' => 'Commercial Applications'],
            ['name' => 'Industrial Applications'],
        ];

        DB::table('post_categories')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_categories');
    }
}
