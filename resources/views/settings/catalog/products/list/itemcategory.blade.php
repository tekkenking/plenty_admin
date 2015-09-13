@if( !empty($menucategories) && $menucategories !== null)

	<table class="table table-bordered">
		<tr>
			<th>Categories & Subcategories</th>
			<th>Sort order</th>
		</tr>
	
		@foreach( $menucategories as $menucategory )
		
		<tr>
			<td>
			
				<div class="panel-group" id="accordion_{!!$menucategory->id!!}">
				  <div class="panel panel-default">
					<div class="panel-heading">
					  <h4 class="panel-title text-left">
						<button data-href="{!! route('catalogsettings.form.edit.category', ['id' => $menucategory->id]) !!}" data-target=".bs-modal-sm" data-toggle="modal" class="btn btn-sm btn-default">
							Edit
						</button>
						<a data-toggle="collapse" data-parent="#accordion_{!!$menucategory->id!!}" href="#collapse_{!!$menucategory->id!!}">
						{!! $menucategory->name !!}
						</a>
						<span class="label label-warning count-subcategory"> 
							{!! count($menucategory->subcategories) !!} 
						</span>
						<button data-deleteurl="{!! route('catalogsettings.delete.category', ['id' => $menucategory->id]) !!}" class="btn btn-danger btn-sm pull-right delete-category">
							<i class="fa fa-trash"></i> Del
						</button>
					  </h4>
					</div>
					<div id="collapse_{!!$menucategory->id!!}" class="panel-collapse collapse delete-wrapper">
						<div class="panel-body">

						<div class="btn-group pull-right">
						  <button data-href="{!!route('catalog.category.get.subcategory', ['categoryid' => $menucategory->id])!!}" data-target=".bs-modal-sm" data-toggle="modal" class="btn btn-success btn-sm" type="button"><i class="fa fa-plus"></i> Add</button>
						  <button class="btn btn-danger btn-sm bulk-delete" type="button"><i class="fa fa-trash"></i> Delete</button>
						</div>
						<br><br>
					  
						<table class="table table-bordered">
							<tr>
								<th><input type="checkbox" class="multiple-checkbox default_checkbox"></th>
								<th>Subcategories</th>
								<th>Sort order</th>
								<th>Action</th>
							</tr>
							
							@if( !empty($menucategory->subcategories) )
							@foreach( $menucategory->subcategories as $subcategory )
							<tr>
								<td><input type="checkbox"  value="{!!$subcategory->id!!}"></td>
								<td class="subcategory-name">{!! $subcategory->name !!}</td>
								<td>{!! $subcategory->sortorder !!}</td>
								<td>
									<div class="dropdown">
									  	<button class="btn btn-default btn-xs dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									    	Actions
									    	<span class="caret"></span>
									  	</button>
									  	<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
									    	<li>
									    		<a href="{!!route('filtersubcategory.show', ['id'=>$subcategory->id])!!}">
									    			<i class="fa fa-filter text-success"></i> Filter
									    		</a>
									    	</li>
									    	<li>
									    		<a href="#" data-href="{!!route('catalog.category.get.update.subcategory', ['id'=>$subcategory->id])!!}" data-target=".bs-modal-nm" data-toggle="modal" >
									    			<i class="fa fa-pencil text-primary"></i> Edit
									    		</a>
									    	</li>
									    	<li>
									    		<a href="#" data-deleteurl="{!!route('catalog.category.delete.subcategory', ['id'=>$subcategory->id])!!}" class="delete-subcategory">
									    			<i class="fa fa-trash text-danger"></i> Delete
									    		</a>
									    	</li>
									  	</ul>
									</div>
								</td>
							</tr>
							@endforeach
							@endif
						</table>
					  </div>
					</div>
				  </div>
				</div>
			
			</td>
			<td>{!! $menucategory->sortorder !!}</td>
		</tr>

		@endforeach
	</table>  

@endif

<script type="text/javascript">
	$(function(){
		//Delete Category
		$(this).on('click', ".delete-category", function(e){
			e.preventDefault();
			var cnt = Number($(this).closest('tr').find('td .count-subcategory').text());

			if( cnt > 0 ){
				$.bootstrapGrowl("Can't delete, because it has subcategory(s)",{
					type : 'danger',
					width: 'auto'
				});
				return false;
			}
			$(this).deleteThis({
				targetParent : 'tr',
				targetName : 'td [data-parent="#accordion"]'
			});
		});

		//Delete Subcategory
		$(this).on('click', ".delete-subcategory", function(e){
			e.preventDefault();
			$(this).deleteThis({
				targetParent : 'tr',
				targetName : 'td.subcategory-name'
			});
		});

		//Multiple checkbox and delete
		$('.bulk-delete').deleteThem({
			url : "{!!route('catalog.category.remove.subcategories')!!}",
			targetParent : '.delete-wrapper'
		});
	});
</script>