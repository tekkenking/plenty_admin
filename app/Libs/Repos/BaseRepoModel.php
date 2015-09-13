<?php namespace App\Libs\Repos;

class BaseRepoModel implements BaseRepoInterface
{
	
	private $model;
	
	public function __construct()
	{
		$this->model = $this->boot();
	}

	
	public function newModel( $info="" )
	{
		if( $info === "" )
		{
			return new $this->model();
		}else{
			return new $this->model( $info );
		}
	}
	
	public function findByID($id)
	{
		return $this->model->find($id);
	}
	
	public function getAll()
	{
		return $this->model->all();
	}
	
	public function insert( Array $fields )
	{
		$new = $this->newModel();
		$status = $this->fieldsIterator($new, $fields)
						->save();
		return $status;
	}
	
	public function create( Array $cats )
	{
		$models = $this->model->create( $cats );
		return $models;
	}
	
	public function update( $id, Array $fields )
	{
		$model = $this->findByID($id);
		$status = $this->fieldsIterator( $model, $fields)
						->save();
		return $status;
	}
	
	public function remove($id)
	{
		$model = $this->findByID($id);
		$model->delete();
		return $model;
	}
	
	public function multiRemove(Array $ids)
	{
		return $this->model->destroy($ids);
	}
	
	/**  **/
	
	protected function fieldsIterator( $model, Array $fields)
	{
		foreach( $fields as $field => $value )
		{
			$model->$field = $value;
		}
		
		return $model;
	}
	
}