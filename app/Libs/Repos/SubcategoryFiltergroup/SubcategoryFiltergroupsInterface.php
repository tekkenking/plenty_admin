<?php namespace App\Libs\Repos\SubcategoryFiltergroup;

Interface SubcategoryFiltergroupsInterface
{
	public function boot();
	
	public function saveRelated($model, Array $sFiltersModels);
}