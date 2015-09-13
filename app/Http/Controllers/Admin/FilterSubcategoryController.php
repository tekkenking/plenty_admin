<?php

namespace App\Http\Controllers\Admin;

use App\Libs\Repos\Subcategory\SubcategoryModel as Subcategory;
use App\Libs\Repos\SubcategoryFiltergroup\SubcategoryFiltergroupsModel;
use App\Libs\Repos\SubcategoryFilter\SubcategoryFilterModel;

use Illuminate\Http\Request;

//use App\Http\Requests;

use Ajaxalert;

class FilterSubcategoryController extends SecureBaseController
{
	public function __construct( 	Subcategory $subcategory, 
									SubcategoryFiltergroupsModel $sFiltergroup, 
									SubcategoryFilterModel $sFilter )
	{
		parent::__construct();
		$this->subcategory = $subcategory;
		$this->sFiltergroup = $sFiltergroup;
		$this->sFilter = $sFilter;
	}


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
		$model = $this->sFiltergroup->create($request->get('filtergroup'));
		
		$filterArr = $request->get('filter');
		$sFilter = [];
		foreach( $filterArr['name'] as $key => $value ){
			$sortorder = $filterArr['sortorder'][$key];
			if( empty($sortorder) ){ $sortorder = 0; }
			$sFilter[] = $this->sFilter->newModel(['name' => $value, 'sortorder' => (int)$sortorder]);
			$sortorder='';
		}
		
		$this->sFiltergroup->saveRelated($model, $sFilter);
        
		return Ajaxalert::created()->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id, Request $request)
    {
		$subcat = 	$this->subcategory->findByID($id);
		$cat 	= 	$subcat->category;
		
		$data['subcat'] = $subcat;
		$data['cat']	= $cat;
		$data['title'] = 'Filter for ' . $subcat->name;
		$data['pageheader'] = "Filter = {$cat->name} :: {$subcat->name}";
		
		
		$filtergroup = $subcat->Subcategoryfiltergroups()
						->with(['Subcategoryfilters' => function($q){
							$q->orderBy('sortorder', 'ASC');
						}])
						->orderBy('sortorder', 'ASC')
						->get();
						
		$dex['info'] = $filtergroup;
		$data['tab_content'] = view('settings.catalog.filters.show', $dex)->render();
		
		if($request->ajax() === true){return $data['tab_content'];}
		
		return view('settings.catalog.filters.index', $data);
    }
	
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($id)
    {
		$data['info'] = $this->subcategory->findByID($id);
        return view('settings.catalog.filters.create', $data);
    }
	
	public function groupEdit($id)
	{
		$data['info'] = $this->sFiltergroup->findByID($id);
		return view('settings.catalog.filters.edit_filtergroup', $data);
	}	
	
	public function groupUpdate(Request $request, $id)
	{
		$this->sFiltergroup->update($id, $request->only('name', 'sortorder'));
		return Ajaxalert::success('Updated successfully')->get();
	}
	
	/** Param : filtergroup id **/
	public function filterCreate($id)
	{
		$data['info'] = $this->sFiltergroup->findByID($id);
		return view('settings.catalog.filters.add_filters', $data);
	}
	
	/** Param : filtergroup id **/
	public function filterStore(Request $request, $id)
	{
		$model = $this->sFiltergroup->findByID($id);
		
		$filterArr = $request->get('filter');
		$sFilter = [];
		foreach( $filterArr['name'] as $key => $value ){
			$sortorder = $filterArr['sortorder'][$key];
			if( empty($sortorder) ){ $sortorder = 0; }
			$sFilter[] = $this->sFilter->newModel(['name' => $value, 'sortorder' => (int)$sortorder]);
			$sortorder='';
		}
		
		$this->sFiltergroup->saveRelated($model, $sFilter);
        
		return Ajaxalert::created()->get();
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function filterEdit($id)
    {
		$data['info'] = $this->sFilter->findByID($id);
		return view('settings.catalog.filters.edit_filters', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function filterUpdate(Request $request, $id)
    {
		$this->sFilter->update($id, $request->only('name', 'sortorder'));
		return Ajaxalert::success('Updated successfully')->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function filtergroupDestroy($id)
    {
		$cat = $this->sFiltergroup->remove($id);
		return Ajaxalert::success('Deleted successfully')->get();
    }   

	public function filterDestroy($id)
    {
		$cat = $this->sFilter->remove($id);
		return Ajaxalert::success('Deleted successfully')->get();
    }
}
