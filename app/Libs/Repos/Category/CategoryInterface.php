<?php namespace App\Libs\Repos\Category;

Interface CategoryInterface
{
	
	public function boot();
	
	public function withSubcategories();
	
	public function subCategoriesByCategoryID($id);

}