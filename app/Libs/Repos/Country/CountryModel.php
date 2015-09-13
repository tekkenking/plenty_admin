<?php namespace App\Libs\Repos\Country;

use App\Models\Country as Model;
use Hash;
use App\Libs\Repos\BaseRepoModel as BaseRepo;

class CountryModel extends BaseRepo implements CountryInterface
{
	
	public function boot()
	{
		return new Model;
	}
	
}