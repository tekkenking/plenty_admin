<?php namespace App\Libs\Repo\Users;

Interface UsersInterface
{
	
	public function newModel();
	
	public function apiAuth( $userAuth );
	
}