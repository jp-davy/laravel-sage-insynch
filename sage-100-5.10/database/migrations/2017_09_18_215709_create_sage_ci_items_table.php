<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSageCiItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sage_ci_items', function (Blueprint $table) {
            $table->string('item_code')->primary();
            $table->string('item_type')->nullable();
            $table->string('item_code_desc')->nullable();
            $table->string('extended_description_key')->nullable();
            $table->string('use_in_ar')->nullable();
            $table->string('use_in_so')->nullable();
            $table->string('use_in_po')->nullable();
            $table->string('use_in_bm')->nullable();
            $table->string('calculate_commission')->nullable();
            $table->string('drop_ship')->nullable();
            $table->string('ebm_enabled')->nullable();
            $table->string('allow_backorders')->nullable();
            $table->string('allow_returns')->nullable();
            $table->string('price_code')->nullable();
            $table->string('allow_trade_discount')->nullable();
            $table->string('print_receipt_labels')->nullable();
            $table->string('allocate_landed_cost')->nullable();
            $table->string('inactive_item')->nullable();
            $table->string('confirm_cost_inc_in_rcpt_of_goods')->nullable();
            $table->string('warranty_code')->nullable();
            $table->string('sales_unit_of_measure')->nullable();
            $table->string('purchase_unit_of_measure')->nullable();
            $table->string('standard_unit_of_measure')->nullable();
            $table->string('post_to_gl_by_division')->nullable();
            $table->string('sales_acct_key')->nullable();
            $table->string('cost_of_goods_sold_acct_key')->nullable();
            $table->string('inventory_acct_key')->nullable();
            $table->string('purchase_acct_key')->nullable();
            $table->string('manufacturing_cost_acct_key')->nullable();
            $table->string('tax_class')->nullable();
            $table->string('purchases_tax_class')->nullable();
            $table->string('product_line')->nullable();
            $table->string('product_type')->nullable();
            $table->string('valuation')->nullable();
            $table->string('default_warehouse_code')->nullable();
            $table->string('primary_ap_division_no')->nullable();
            $table->string('primary_vendor_no')->nullable();
            $table->string('image_file')->nullable();
            $table->string('last_sold_date')->nullable();
            $table->string('last_receipt_date')->nullable();
            $table->string('category_1')->nullable();
            $table->string('category_2')->nullable();
            $table->string('category_3')->nullable();
            $table->string('category_4')->nullable();
            $table->string('sales_promotion_code')->nullable();
            $table->string('sale_starting_date')->nullable();
            $table->string('sale_ending_date')->nullable();
            $table->string('sale_method')->nullable();
            $table->string('explode_kit_items')->nullable();
            $table->string('ship_weight')->nullable();
            $table->string('comment_text')->nullable();
            $table->string('restocking_method')->nullable();
            $table->string('next_lot_serial_no')->nullable();
            $table->string('inventory_cycle')->nullable();
            $table->string('routing_no')->nullable();
            $table->string('procurement_type')->nullable();
            $table->string('planner_code')->nullable();
            $table->string('buyer_code')->nullable();
            $table->string('low_level_code')->nullable();
            $table->string('planned_by_mrp')->nullable();
            $table->string('vendor_item_code')->nullable();
            $table->string('setup_charge')->nullable();
            $table->string('attachment_file_name')->nullable();
            $table->string('item_image_width_in_pixels')->nullable();
            $table->string('item_image_height_in_pixels')->nullable();
            $table->decimal('standard_unit_cost', 11, 3)->nullable();
            $table->decimal('standard_unit_price', 11, 3)->nullable();
            $table->decimal('last_total_unit_cost', 11, 3)->nullable();
            $table->decimal('average_unit_cost', 11, 3)->nullable();
            $table->decimal('sales_promotion_price', 11, 3)->nullable();
            $table->decimal('suggested_retail_price', 11, 3)->nullable();
            $table->decimal('sales_promotion_discount_percent', 12, 3)->nullable();
            $table->decimal('average_back_order_fill_days', 5, 0)->nullable();
            $table->decimal('last_allocated_unit_cost', 11, 3)->nullable();
            $table->decimal('commission_rate', 8, 3)->nullable();
            $table->decimal('base_comm_amt', 11, 2)->nullable();
            $table->decimal('purchase_um_conv_fctr', 12, 4)->nullable();
            $table->decimal('sales_um_conv_fctr', 12, 4)->nullable();
            $table->decimal('volume', 11, 4)->nullable();
            $table->decimal('restocking_charge', 11, 3)->nullable();
            $table->string('total_inventory_value')->nullable();
            $table->string('date_created')->nullable();
            $table->string('time_created')->nullable();
            $table->string('user_created_key')->nullable();
            $table->string('date_updated')->nullable();
            $table->string('time_updated')->nullable();
            $table->string('user_updated_key')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sage_ci_items');
    }
}
