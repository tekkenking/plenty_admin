<?php

# app/Models/Confirmuser.php

namespace App\Models;

use App\Models\Basemodel;
use Illuminate\Database\Eloquent\SoftDeletes;

final class Confirmuser extends Basemodel
{
	
	use SoftDeletes;
	
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
	
	protected $cast = [
		'confirmed' => 'boolean'
	];

	public function user()
	{
		return $this->belongsTo( User::class );
	}

}