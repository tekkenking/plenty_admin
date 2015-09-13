<?php namespace App\Libs\Repos\Store;

Interface StoreInterface
{
	public function boot();
	
	public function create( Array $storeInfo );
}