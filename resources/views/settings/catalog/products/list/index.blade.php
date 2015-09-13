@extends('layouts.master')

@section('title', $title)
@section('page-header', $pageheader)

@section('content')

	<div class="row">
		<div class="col-md-12">
		
			<ul class="nav nav-tabs" role="tablist">
			  <li class="active"><a href="#">Avaliable Category</a></li>
			  <button class="btn btn-info pull-right" data-toggle="modal" data-target=".bs-modal-nm" data-href="{!!route('catalogsettings.form.create.category')!!}">Add Category
  </button>
			</ul>
			
            <div class="tab-content">
				<div id="item-list-category-tab" class="tab-pane active">
		            @include('settings.catalog.products.list.itemcategory')
		        </div>

            </div>
			
		</div>
	</div>

@endsection