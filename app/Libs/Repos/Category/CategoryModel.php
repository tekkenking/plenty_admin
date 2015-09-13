<?php namespace App\Libs\Repos\Category;

use App\Models\Category as Model;
use App\Libs\Repos\BaseRepoModel as BaseRepo;

class CategoryModel extends BaseRepo implements CategoryInterface
{
	
	public function boot()
	{
		return new Model;
	}
	
	public function withSubcategories()
	{
		$model = Model::with(['subcategories' => function($q){
			$q->select('id', 'category_id', 'name', 'title', 'image', 'sortorder')
				->orderBy('sortorder', 'ASC');
		}])
		->select('id', 'name', 'title', 'image', 'sortorder')
		->orderBy('sortorder', 'ASC')
		->get();
		return $model;
	}
	
	public function subCategoriesByCategoryID($id)
	{
		$model = Model::find($id)->subcategories()->get();
		return $model;
	}
}