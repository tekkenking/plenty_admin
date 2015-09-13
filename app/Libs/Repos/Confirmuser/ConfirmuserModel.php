<?php namespace App\Libs\Repos\Confirmuser;

use App\Models\Confirmuser as Model;
use App\Libs\Repos\BaseRepoModel as BaseRepo;

class ConfirmuserModel extends BaseRepo implements ConfirmuserInterface
{

	public function boot()
	{
		return new Model;
	}

}