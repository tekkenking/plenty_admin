<?php

namespace App\Models;

use App\Models\Basemodel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Basemodel
{
	use SoftDeletes;
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'name', 'state', 'city', 'country_id', 'logo'];
	
	
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
	
    //
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	
	public function country()
	{
		return $this->belongsTo(Country::class);
	}
	
	public function products()
	{
		return $this->belongsTo(Product::class);
	}
}
