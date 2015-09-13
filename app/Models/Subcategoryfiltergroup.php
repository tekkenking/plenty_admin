<?php

namespace App\Models;


class Subcategoryfiltergroup extends Basemodel
{
    protected $table = 'subcategoryfiltergroups';
	
	public function Subcategory()
	{
		return $this->belongsTo( Subcategory::class );
	}
	
	public function Subcategoryfilters()
	{
		return $this->hasMany( Subcategoryfilter::class );
	}
}
