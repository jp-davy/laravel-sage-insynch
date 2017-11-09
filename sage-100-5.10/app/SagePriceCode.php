<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SagePriceCode extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sage_price_codes';

    /**
	 * primaryKey 
	 * 
	 * @var integer
	 */
	protected $primaryKey = null;

	/**
	 * Indicates if the IDs are auto-incrementing.
	 *
	 * @var bool
	 */
	public $incrementing = false;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * All this method will do is simply return a 
     * proper price code record whether it's a customer 
     * specific price code record, or a price level specific
     * 
     * @param  string $item_code            Item Code (Part Numer)
     * @param  string $customer_no          Customer's Number
     * @param  string $customer_price_level Customer's Price Level Code
     * @return object $price                Eloquent SagePriceCode model
     */
    public static function getPriceCodeRecord($item_code, $customer_no, $customer_price_level) 
    {
        /* 
         * The logic to parse the price 
         * resides in the controller or another method
        */ 

        /* First check for a customer 
         * specific price (i.e. do they get a 
         * special price different from everyone else?)
        */
        $price = (new static)->where(
            [
                'price_code_record'=>'1', 
                'item_code'=>$item_code, 
                'customer_no'=>$customer_no
            ]
        )->first();

        if($price) return $price;

        /* Then check for a price code level  
         * specific price
        */
        $price = (new static)->where(
            [
                'price_code_record'=>'2',
                'item_code'=>$item_code, 
                'customer_price_level'=>$customer_price_level
            ]
        )->first();

        if($price) return $price;
        else return null;
    }

    /**
     * Determine if there is any quantity based pricing
     * and then send the proper values to be applied
     * using the given pricing method
     * 
     * @param  string $item_code            Item Code (Part Numer)
     * @param  string $customer_no          Customer's Number
     * @param  string $customer_price_level Customer's Price Level Code
     * @return array  $price                Eloquent SagePriceCode model
     */
    public static function parsePriceCodeRecord($price_code_record, $ci_item_record, $quantity = null) 
    {
        /*
         * We need to determine if there are any 
         * BreakQty values here for Volume based pricing
         */ 
        
        if(!$quantity) $quantity = 1;

        if($quantity <= $price_code_record->break_quantity_1) 
            $price_code_value = $price_code_record->discount_markup_1;
        elseif($quantity <= $price_code_record->break_quantity_2) 
            $price_code_value = $price_code_record->discount_markup_2;
        elseif($quantity <= $price_code_record->break_quantity_3) 
            $price_code_value = $price_code_record->discount_markup_3;
        elseif($quantity <= $price_code_record->break_quantity_4) 
            $price_code_value = $price_code_record->discount_markup_4;
        elseif($quantity <= $price_code_record->break_quantity_5) 
            $price_code_value = $price_code_record->discount_markup_5;

        $price = (new static)->applyPricingMethod(
            $price_code_record->pricing_method, 
            $price_code_value, 
            $ci_item_record->standard_unit_price
        );

        return $price;
    }

    /**
     * Apply the given pricing method to the value/unit price
     * 
     * @param  [type] $pricing_method [description]
     * @param  [type] $value          [description]
     * @param  [type] $stdPrice       [description]
     * @return [type]                 [description]
     */
    public function applyPricingMethod($pricing_method, $value, $stdPrice) 
    {
        /* 
         * O = Override, replaces the standard_unit_price (standard_unit_price is from SageCIItem object)
         * C = Cost Markup Dollar Amt (on standard_unit_price from SageCIItem object)
         * M = Cost Markup Percent  (on standard_unit_price from SageCIItem object)
         * D = Discount Percentage (on standard_unit_price from SageCIItem object)
         * P = Price Discount Amt (on standard_unit_price from SageCIItem object)
        */
        if($pricing_method == "O") $price = $value;
        elseif($pricing_method == "C") $price = $stdPrice + $value;
        elseif($pricing_method == "M") $price = $stdPrice * (1+($value/100));
        elseif($pricing_method == "D") $price = $stdPrice - ($stdPrice * ($value/100));
        elseif($pricing_method == "P") $price = $stdPrice - $value;

        return $price;
    }
}
