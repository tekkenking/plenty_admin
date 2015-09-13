<?php namespace App\Libs\Repos\SubcategoryFilter;

use App\Models\Subcategoryfilter as Model;
use App\Libs\Repos\BaseRepoModel as BaseRepo;

class SubcategoryFilterModel extends BaseRepo implements SubcategoryFilterInterface
{
	
	public function boot()
	{
		return new Model;
	}
	
	
}