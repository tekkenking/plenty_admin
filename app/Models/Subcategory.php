<?php

# App\Models\SubCategory;

namespace App\Models;

use App\Models\Basemodel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Basemodel
{
	
	use SoftDeletes;
	
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
	
	protected $table = 'subcategories';
	
    //
	public function Category()
	{
		return $this->belongsTo( Category::class );
	}
	
	public function Subcategoryfiltergroups()
	{
		return $this->hasMany( Subcategoryfiltergroup::class );
	}
}
