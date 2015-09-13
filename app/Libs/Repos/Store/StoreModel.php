<?php namespace App\Libs\Repos\Store;

use App\Models\Store as Model;
use Hash, Auth;
use App\Libs\Repos\BaseRepoModel as BaseRepo;

class StoreModel extends BaseRepo implements StoreInterface
{
	
	public function boot()
	{
		return new Model;
	}
	
	public function create( Array $storeInfo )
	{
		$storeInfo['user_id'] = Auth::user()->id;
		$new = parent::create( $storeInfo );
		return $new;
	}
	
}