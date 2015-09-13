<?php

namespace App\Models;

use App\Models\Basemodel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Productimage extends Basemodel
{
    use SoftDeletes;
	
	/**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
	
	
	public function product()
	{
		return $this->belongsTo(Product::class);
	}
	
}
