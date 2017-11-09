<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSagePriceCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sage_price_codes', function (Blueprint $table) {
            $table->string('price_code_record', 1)->nullable();
            $table->string('price_code', 4)->nullable();
            $table->string('item_code', 30)->nullable();
            $table->string('customer_price_level', 1)->nullable();
            $table->string('ar_division_no', 2)->nullable();
            $table->string('customer_no', 20)->nullable();
            $table->string('price_code_desc')->nullable();
            $table->string('pricing_method',1)->nullable();
            $table->integer('break_quantity_1')->unsigned()->nullable();
            $table->integer('break_quantity_2')->unsigned()->nullable();
            $table->integer('break_quantity_3')->unsigned()->nullable();
            $table->integer('break_quantity_4')->unsigned()->nullable();
            $table->integer('break_quantity_5')->unsigned()->nullable();
            $table->decimal('discount_markup_1', 14, 8)->nullable();
            $table->decimal('discount_markup_2', 14, 8)->nullable();
            $table->decimal('discount_markup_3', 14, 8)->nullable();
            $table->decimal('discount_markup_4', 14, 8)->nullable();
            $table->decimal('discount_markup_5', 14, 8)->nullable();
            $table->string('date_created')->nullable();
            $table->string('time_created')->nullable();
            $table->string('user_created_key')->nullable();
            $table->string('date_updated')->nullable();
            $table->string('time_updated', 14, 8)->nullable();
            $table->string('user_updated_key', 14, 8)->nullable();

            $table->unique([
                    'price_code_record',
                    'price_code',
                    'item_code',
                    'customer_price_level',
                    'ar_division_no',
                    'customer_no'
                ], 'primary_key');

            $table->index([
                    'item_code',
                    'price_code_record',
                    'price_code',
                    'customer_price_level',
                    'ar_division_no',
                    'customer_no'
                ], 'item_index');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sage_price_codes');
    }
}
