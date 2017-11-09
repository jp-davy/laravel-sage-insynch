<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SageIMItemWarehouse extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sage_im_item_warehouses';

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
     * A SageIMItemWarehouse record belongs to one parent SageCIItem
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sageCIItem()
    {
        return $this->belongsTo(\App\SageCIItem::class);
    }
}
