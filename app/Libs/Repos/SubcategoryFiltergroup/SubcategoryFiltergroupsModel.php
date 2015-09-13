<?php namespace App\Libs\Repos\SubcategoryFiltergroup;

use App\Models\Subcategoryfiltergroup as Model;
use App\Libs\Repos\BaseRepoModel as BaseRepo;

class SubcategoryFiltergroupsModel extends BaseRepo implements SubcategoryFiltergroupsInterface
{
	
	public function boot()
	{
		return new Model;
	}
	
	public function saveRelated($model, Array $sFiltersModels)
	{
		return $model->Subcategoryfilters()->saveMany($sFiltersModels);
	}
	
}