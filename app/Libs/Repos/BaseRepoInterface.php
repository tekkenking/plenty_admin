<?php namespace App\Libs\Repos;

interface BaseRepoInterface {
	
	public function newModel( $info="" );
	
	public function findByID($id);
	
	public function getAll();
	
	public function insert( Array $fields );
	
	public function create( Array $cats );
	
	public function update( $id, Array $fields );
	
	public function remove($id);
	
	public function multiRemove(Array $ids);
}