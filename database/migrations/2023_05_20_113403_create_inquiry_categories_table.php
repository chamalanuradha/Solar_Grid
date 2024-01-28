<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateInquiryCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiry_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });


        $data = [
            [ 'name' => 'NPU/PVDB' ],
            [ 'name' => 'SIT( Secondary Injection Test)' ],
            [ 'name' => 'PQT( Power Quality Test)' ],
            [ 'name' => 'Grid connection approval' ],
            [ 'name' => 'Other' ],
        ];

        DB::table('inquiry_categories')->insert($data);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inquiry_categories');
    }
}
