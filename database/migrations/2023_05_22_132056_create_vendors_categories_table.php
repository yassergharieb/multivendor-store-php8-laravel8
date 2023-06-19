<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        // Schema::dropIfExists('vendors_categories');
        // Schema::create('vendors_categories', function (Blueprint $table) {
      

        //     // $table->foreignId('category_id')->constrained()->onDelete('set null');
        //     $table->foreignId('vendor_id')->constrained()->cascadeOnDelete();


         
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendors_categories');
    }
}
