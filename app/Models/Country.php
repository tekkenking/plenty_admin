<?php

# app/Models/Country.php

namespace App\Models;

use App\Models\Basemodel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Basemodel
{
	protected $cast = [];
	
	public $timestamps = false;
	
	
	public function stores()
	{
		return $this->hasMany(Store::class);
	}
	
}