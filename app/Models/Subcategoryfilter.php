<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategoryfilter extends Basemodel
{
    protected $table = 'subcategoryfilters';
		
	public function Subcategoryfiltergroup()
	{
		return $this->belongsTo( Subcategoryfiltergroup::class );
	}
}
