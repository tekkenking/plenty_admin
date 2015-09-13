<?php

namespace App\Models;

use App\Models\Basemodel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Basemodel
{
    use SoftDeletes;
	
	/**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
	
	public function store()
	{
		$this->belongsTo(Store::class);
	}
	
	public function productimages()
	{
		$this->hasMany(Productimage::class);
	}
}
