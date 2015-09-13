<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests\RequestCreateItemCategory as CRequest;
use App\Http\Requests\RequestEditItemCategory as ERequest;
use App\Http\Requests\RequestCreateItemSubcategory as CsRequest;
use App\Http\Requests\RequestEditItemSubcategory as EsRequest;
use App\Libs\Repos\Category\CategoryModel as Category;
use App\Libs\Repos\Subcategory\SubcategoryModel as Subcategory;

use Illuminate\Http\Request;

use Ajaxalert;

class CatalogSettingsController extends SecureBaseController
{
	
	public function __construct( Category $category, Subcategory $subcategory )
	{
		parent::__construct();
		$this->category = $category;
		$this->subcategory = $subcategory;
	}
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
		
		$data['menucategories'] = $this->category->withSubcategories();
		$data['pageheader'] = 'Category & Subcategory Setup';
		$data['title'] = 'Cat - Setup';
		return view('settings.catalog.products.list.index', $data);
    }
	
	public function formCreateCategory()
	{
		$data['addcat'] = 'Add Category';
		return view('modals.catalog.category.create', $data);
	}
	
	public function saveCreateCategory( CRequest $request )
	{
		$req = $request->only('name', 'title', 'sortorder');
		$this->category->insert($req);
		$data = Ajaxalert::success()->message('Created Successfully')->get();
		
		return $data;
	}
	
	public function formEditCategory($id)
	{
		$cat = $this->category->findByID($id);
		$data['catname'] = $cat->name;
		$data['catsortorder'] = $cat->sortorder;
		$data['catedit'] = "Update Category";
		$data['catid'] = $id;
		return view('modals.catalog.category.edit', $data);
	}
	
	public function saveEditCreateCategory( ERequest $request, $id )
	{
		$this->category->update($id, $request->only('name', 'sortorder'));
		return Ajaxalert::success('Updated successfully')->get();
	}
	
	public function deleteCategory($id)
	{
		dd('nt');
		$cat = $this->category->remove($id);
		return Ajaxalert::success('Deleted successfully')->get();
	}
	
	public function getSubcategory($categoryid)
	{
		$cat = $this->category->findByID($categoryid);
		$data['addsubcat'] = 'Add Subcategory';
		$data['catname'] = $cat->name;
		$data['catid']	= $cat->id;
		return view('modals.catalog.subcategory.create', $data);
	}
	
	public function saveSubcategory(CsRequest $request)
	{
		$this->subcategory->insert($request->only('category_id', 'name', 'title', 'sortorder'));
		return Ajaxalert::created()->get();
	}
	
	public function getUpdateSubcategory($id)
	{
		$subcat = $this->subcategory->findByID($id);
		$data['subcat'] = $subcat;
		$data['subcatedit'] = 'Update Subcategory';
		return view('modals.catalog.subcategory.edit', $data);
	}
	
	public function postUpdateSubcategory(EsRequest $request)
	{
		$this->subcategory->update($request->id, $request->only('name', 'title', 'sortorder'));
		return Ajaxalert::success('Updated successfully')->get();
	}
	
	public function deleteSubCategory($id)
	{
		$cat = $this->subcategory->remove($id);
		return Ajaxalert::success('Deleted successfully')->get();
	}

	public function removeSubCategories(Request $request)
	{
		dd($request->all());
	}
}
