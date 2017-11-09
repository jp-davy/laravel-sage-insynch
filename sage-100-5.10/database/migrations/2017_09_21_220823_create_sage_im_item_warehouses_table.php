<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSageIMItemWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sage_im_item_warehouses', function (Blueprint $table) {
            $table->string('item_code')->nullable();
            $table->string('warehouse_code')->nullable();
            $table->string('bin_location')->nullable();
            $table->string('reorder_method')->nullable();
            $table->decimal('economic_order_qty', 14, 8)->nullable();
            $table->decimal('reorder_point_qty', 14, 8)->nullable();
            $table->decimal('minimum_order_qty', 14, 8)->nullable();
            $table->decimal('maximum_on_hand_qty', 14, 8)->nullable();
            $table->decimal('quantity_on_hand', 14, 8)->nullable();
            $table->decimal('quantity_on_purchase_order', 14, 8)->nullable();
            $table->decimal('quantity_on_sales_order', 14, 8)->nullable();
            $table->decimal('quantity_on_back_order', 14, 8)->nullable();
            $table->decimal('average_cost', 14, 8)->nullable();
            $table->decimal('quantity_on_work_order', 14, 8)->nullable();
            $table->decimal('quantity_required_for_wo', 14, 8)->nullable();
            $table->decimal('quantity_in_shipping', 14, 8)->nullable();
            $table->string('total_warehouse_value')->nullable();
            $table->decimal('cost_calc_qty_committed', 14, 8)->nullable();
            $table->decimal('cost_calc_cost_committed', 14, 8)->nullable();
            $table->string('date_created')->nullable();
            $table->string('time_created')->nullable();
            $table->string('user_created_key')->nullable();
            $table->string('date_updated')->nullable();
            $table->string('time_updated')->nullable();
            $table->string('user_updated_key')->nullable();
            
            $table->unique(['item_code', 'warehouse_code']);
            $table->index(['warehouse_code', 'bin_location', 'item_code']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sage_item_warehouses');
    }
}
