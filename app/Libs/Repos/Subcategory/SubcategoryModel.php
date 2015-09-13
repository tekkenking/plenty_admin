<?php namespace App\Libs\Repos\Subcategory;

use App\Models\Subcategory as Model;
use App\Libs\Repos\BaseRepoModel as BaseRepo;

class SubcategoryModel extends BaseRepo implements SubcategoryInterface
{
	
	public function boot()
	{
		return new Model;
	}
	
	
}