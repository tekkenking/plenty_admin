<?php namespace App\Libs\Repos\User;

use App\Models\User as Model;
use Hash, Auth;
use App\Libs\Repos\BaseRepoModel as BaseRepo;

class UserModel extends BaseRepo implements UserInterface
{
	
	public function boot()
	{
		return new Model;
	}

	public function register($userinfo, $confirmuser)
	{

		$newuser = $this->create($userinfo);

		$dataArr = [
					'user_id' => $newuser->id, 
					'confirmation_code'=> app('phew')->random('numbers', '6')
				];

		$code = $confirmuser->newModel( $dataArr );

		$newuser->confirmuser()->save($code);

		return $newuser;
	}

	public function getMyStore()
	{
		$store = Auth::user()->myStore();
		

		if( $store !== null )
		{
			$store = $store->with('country')->first();
			return $store;
		}else{
			return false;
		}
				

	}
}