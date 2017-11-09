<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SageCIItem extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sage_ci_items';

    /**
	 * primaryKey 
	 * 
	 * @var integer
	 * @access protected
	 */
	protected $primaryKey = 'item_code';

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
     * A SageCIItem has many records in SageIMItemWarehouses
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sageIMItemWarehouses()
    {
        return $this->hasMany(\App\SageIMItemWarehouses::class);
    }
}
