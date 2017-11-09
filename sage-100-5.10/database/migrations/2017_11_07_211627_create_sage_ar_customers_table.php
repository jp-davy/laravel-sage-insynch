<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSageARCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sage_ar_customers', function (Blueprint $table) {
            $table->integer('ar_division_no')->unsigned()->length(2);
            $table->string('customer_no', 20);
            $table->string('customer_name', 30);
            $table->string('address_line_1', 30)->nullable();
            $table->string('address_line_2', 30)->nullable();
            $table->string('address_line_3', 30)->nullable();
            $table->string('city', 20)->nullable();
            $table->string('state', 2)->nullable();
            $table->string('zip_code', 12)->nullable();
            $table->string('country_code', 3)->nullable();
            $table->string('telephone_no', 17)->nullable();
            $table->string('telephone_ext', 5)->nullable();
            $table->string('fax_no', 17)->nullable();
            $table->string('email_address', 50)->nullable();
            $table->string('url_address', 50)->nullable();
            $table->string('ebm_enabled', 1)->nullable();
            $table->string('ebm_consumer_user_id',15)->nullable();
            $table->string('batch_fax', 1)->nullable();
            $table->string('default_credit_card_pmt_type', 5)->nullable();
            $table->string('contact_code', 1)->nullable();
            $table->string('ship_method', 15)->nullable();
            $table->string('tax_schedule', 9)->nullable();
            $table->string('tax_exempt_no', 15)->nullable();
            $table->integer('terms_code')->unsigned()->length(2)->default(00);
            $table->integer('salesperson_division_no')->unsigned()->length(2)->default(00);
            $table->string('salesperson_no', 4)->nullable();
            $table->integer('salesperson_division_no_2')->unsigned()->length(2)->default(00);
            $table->string('salesperson_no_2', 4)->nullable();
            $table->integer('salesperson_division_no_3')->unsigned()->length(2)->default(00);
            $table->string('salesperson_no_3', 4)->nullable();
            $table->integer('salesperson_division_no_4')->unsigned()->length(2)->default(00);
            $table->string('salesperson_no_4', 4)->nullable();
            $table->integer('salesperson_division_no_5')->unsigned()->length(2)->default(00);
            $table->string('salesperson_no_5', 4)->nullable();
            $table->string('comment', 30)->nullable();
            $table->string('sort_field', 10)->nullable();
            $table->string('temporary_customer', 1)->nullable();
            $table->string('customer_status', 1)->nullable();
            $table->string('inactive_reason_code', 5)->nullable();
            $table->string('open_item_customer', 1)->nullable();
            $table->string('residential_address', 1)->nullable();
            $table->string('statement_cycle', 1)->nullable();
            $table->string('print_dunning_message', 1)->nullable();
            $table->string('customer_type', 4)->nullable();
            $table->string('price_level', 1)->nullable();
            $table->string('date_last_activity', 8)->nullable();
            $table->string('date_last_payment', 8)->nullable();
            $table->string('date_last_statement', 8)->nullable();
            $table->string('date_last_finance_chrg', 8)->nullable();
            $table->string('date_last_aging', 8)->nullable();
            $table->string('default_item_code', 30)->nullable();
            $table->string('default_cost_code', 9)->nullable();
            $table->string('default_cost_type', 1)->nullable();
            $table->string('credit_hold', 1)->nullable();
            $table->string('primary_ship_to_code', 4)->nullable();
            $table->string('date_established', 8)->nullable();
            $table->string('credit_card_guid', 32)->nullable();
            $table->string('default_payment_type', 5)->nullable();
            $table->string('email_statements', 1)->nullable();
            $table->integer('number_of_inv_to_use_in_calc')->length(2)->unsigned()->nullable();
            $table->integer('avg_days_payment_invoice')->length(3)->unsigned()->nullable();
            $table->integer('avg_days_over_due')->length(3)->unsigned()->nullable();
            $table->decimal('customer_discount_rate', 13, 3)->nullable();
            $table->decimal('service_charge_rate', 13, 3)->nullable();
            $table->decimal('credit_limit', 14, 2)->nullable();
            $table->decimal('last_payment_amt', 14, 2)->nullable();
            $table->decimal('highest_stmnt_balance', 14, 2)->nullable();
            $table->decimal('unpaid_service_chrg', 14, 2)->nullable();
            $table->decimal('balance_forward', 14, 2)->nullable();
            $table->decimal('current_balance', 14, 2)->nullable();
            $table->decimal('aging_category_1', 14, 2)->nullable();
            $table->decimal('aging_category_2', 14, 2)->nullable();
            $table->decimal('aging_category_3', 14, 2)->nullable();
            $table->decimal('aging_category_4', 14, 2)->nullable();
            $table->decimal('open_order_amt', 14, 2)->nullable();
            $table->decimal('retention_current', 14, 2)->nullable();
            $table->decimal('retention_aging_1', 14, 2)->nullable();
            $table->decimal('retention_aging_2', 14, 2)->nullable();
            $table->decimal('retention_aging_3', 14, 2)->nullable();
            $table->decimal('retention_aging_4', 14, 2)->nullable();
            $table->decimal('split_comm_rate_2', 9, 3)->nullable();
            $table->decimal('split_comm_rate_3', 9, 3)->nullable();
            $table->decimal('split_comm_rate_4', 9, 3)->nullable();
            $table->decimal('split_comm_rate_5', 9, 3)->nullable();
            $table->string('date_created', 8)->nullable();
            $table->string('time_created', 8)->nullable();
            $table->string('user_created_key', 10)->nullable();
            $table->string('date_updated', 8)->nullable();
            $table->string('time_updated', 8)->nullable();
            $table->integer('user_updated_key')->unsigned()->length(10)->default(0000000000);
            $table->string('use_sage_cloud_for_inv_printing', 1)->nullable();

            $table->unique([
                    'ar_division_no',
                    'customer_no'
                ], 'primary_key');

            $table->index([
                    'customer_name',
                    'ar_division_no',
                    'customer_no'
                ], 'name_index');

            $table->index([
                'sort_field',
                'ar_division_No',
                'customer_No'
            ], 'sort_index');

            $table->index([
                'ar_division_No',
                'salesperson_no',
                'customer_no'
            ], 'salesperson_index');

        });
        
        DB::statement('ALTER TABLE sage_ar_customers CHANGE ar_division_no ar_division_no INT(2) UNSIGNED ZEROFILL NOT NULL');
        DB::statement('ALTER TABLE sage_ar_customers CHANGE terms_code terms_code INT(2) UNSIGNED ZEROFILL DEFAULT 00');
        DB::statement('ALTER TABLE sage_ar_customers CHANGE salesperson_division_no salesperson_division_no INT(2) UNSIGNED ZEROFILL DEFAULT 00');
        DB::statement('ALTER TABLE sage_ar_customers CHANGE salesperson_division_no_2 salesperson_division_no_2 INT(2) UNSIGNED ZEROFILL DEFAULT 00');
        DB::statement('ALTER TABLE sage_ar_customers CHANGE salesperson_division_no_3 salesperson_division_no_3 INT(2) UNSIGNED ZEROFILL DEFAULT 00');
        DB::statement('ALTER TABLE sage_ar_customers CHANGE salesperson_division_no_4 salesperson_division_no_4 INT(2) UNSIGNED ZEROFILL DEFAULT 00');
        DB::statement('ALTER TABLE sage_ar_customers CHANGE salesperson_division_no_5 salesperson_division_no_5 INT(2) UNSIGNED ZEROFILL DEFAULT 00');
        DB::statement('ALTER TABLE sage_ar_customers CHANGE user_updated_key user_updated_key INT(10) UNSIGNED ZEROFILL DEFAULT 0000000000');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sage_ar_customers');
    }
}
