<?php

# App\Models\Category

namespace App\Models;

use App\Models\Basemodel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Basemodel
{
	public $timestamps = false;
	
	use SoftDeletes;
	
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
	
    //
	public function SubCategories()
	{
		return $this->hasMany( SubCategory::class );
	}
	
}
