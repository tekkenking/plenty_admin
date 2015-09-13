<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin', 'namespace' => 'Admin'], function(){
	
	
	Route::get('/', [
		'uses'	=>	'FrontController@index',
		'as'	=>	'front.index'
	]);
	
	Route::group(['prefix' => 'catalog'], function(){

		Route::get('/', [
			'uses'	=>	'CatalogSettingsController@index',
			'as'	=>	'catalogsettings.index'
		]);

		Route::group(['prefix' => 'itemcategory'], function(){
			
			Route::get('formcreate', [
				'uses'	=>	'CatalogSettingsController@formCreateCategory',
				'as'	=>	'catalogsettings.form.create.category'
			]);
			
			Route::post('save', [
				'uses'	=>	'CatalogSettingsController@saveCreateCategory',
				'as'	=>	'catalogsettings.save.category'
			]);	
			
			Route::get('edit/{id}', [
				'uses'	=>	'CatalogSettingsController@formEditCategory',
				'as'	=>	'catalogsettings.form.edit.category'
			]);
			
			Route::post('saveedit/{id}', [
				'uses'	=>	'CatalogSettingsController@saveEditCreateCategory',
				'as'	=>	'catalogsettings.save.edit.category'
			]);

			Route::delete('delete/{id}', [
				'uses'	=>	'CatalogSettingsController@deleteCategory',
				'as'	=>	'catalogsettings.delete.category'
			]);

			Route::group(['prefix' => '{categoryid}/subcategory'], function(){
				Route::get('/', [
					'uses'	=>	'CatalogSettingsController@getSubcategory',
					'as'	=>	'catalog.category.get.subcategory'
				]);

				Route::post('save', [
					'uses'	=>	'CatalogSettingsController@saveSubcategory',
					'as'	=>	'catalog.category.save.subcategory'
				]);
			});

			Route::get('edit/subcategory/{id}', [
				'uses'	=>	'CatalogSettingsController@getUpdateSubcategory',
				'as'	=>	'catalog.category.get.update.subcategory'
			]);			

			Route::put('edit/subcategory', [
				'uses'	=>	'CatalogSettingsController@postUpdateSubcategory',
				'as'	=>	'catalog.category.post.update.subcategory'
			]);

			Route::delete('delete/subcategory/{id}', [
				'uses'	=>	'CatalogSettingsController@deleteSubCategory',
				'as'	=>	'catalog.category.delete.subcategory'
			]);			

			Route::post('remove/subcategories', [
				'uses'	=>	'CatalogSettingsController@removeSubCategories',
				'as'	=>	'catalog.category.remove.subcategories'
			]);

		});

		Route::group(['prefix' => 'filtersubcategory'], function(){
			Route::get('show/{id}', [
				'uses'	=>	'FilterSubcategoryController@show',
				'as'	=>	'filtersubcategory.show'
			]);			

			Route::get('create/{id}', [
				'uses'	=>	'FilterSubcategoryController@create',
				'as'	=>	'filtersubcategory.create'
			]);

			Route::post('store', [
				'uses'	=>	'FilterSubcategoryController@store',
				'as'	=>	'filtersubcategory.store'
			]);				

			Route::get('fgroupedit/{id}', [
				'uses'	=>	'FilterSubcategoryController@groupEdit',
				'as'	=>	'filtersubcategory.group.edit'
			]);			

			Route::put('fgroupupdate/{id}', [
				'uses'	=>	'FilterSubcategoryController@groupUpdate',
				'as'	=>	'filtersubcategory.group.update'
			]);

			Route::delete('fgroupupdate/{id}', [
				'uses'	=>	'FilterSubcategoryController@filtergroupDestroy',
				'as'	=>	'filtersubcategory.group.delete'
			]);			

			Route::get('fedit/{id}', [
				'uses'	=>	'FilterSubcategoryController@filterEdit',
				'as'	=>	'filtersubcategory.filter.edit'
			]);	

			Route::get('fcreate/{id}', [
				'uses'	=>	'FilterSubcategoryController@filterCreate',
				'as'	=>	'filtersubcategory.filter.create'
			]);			

			Route::post('fstore/{id}', [
				'uses'	=>	'FilterSubcategoryController@filterStore',
				'as'	=>	'filtersubcategory.filter.store'
			]);	

			Route::put('fupdate/{id}', [
				'uses'	=>	'FilterSubcategoryController@filterUpdate',
				'as'	=>	'filtersubcategory.filter.update'
			]);

			Route::delete('fdelete/{id}', [
				'uses'	=>	'FilterSubcategoryController@filterDestroy',
				'as'	=>	'filtersubcategory.filter.delete'
			]);	
		});

	});
	
	/*Route::get('catalogeditcategory/{categoryid}', [
		'uses'	=>	'CatalogSettingsController@editCategory',
		'as'	=>	'settings.catalog.products.edit.editcategory'
	]);*/

	
});
