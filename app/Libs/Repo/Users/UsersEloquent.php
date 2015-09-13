<?php namespace App\Libs\Repo\Users;

use App\Models\User as Model;
use Hash;

class UsersEloquent implements UsersInterface
{
	
	public function newModel()
	{
		return new Model;
	}
	
	public function apiAuth( $userAuth )
	{

		$user = Model::where( 'username', $userAuth['username'] )->first();
	

		if( $user !== null &&  Hash::check($userAuth['password'], $user->password) ){
			return $user;
		}else{
			return false;
		}
	}
	
}