<table class="table table-bordered">
  	<tr>
  		<th><a href="#">Filter Group</a></th>
  		<th><a href="#">Sort Order</a></th>
  	</tr>

  	@if( !empty($info) )

  		@foreach( $info as $fgroup )
		  	<tr>
		  		<td>
					<div class="panel-group" id="accordion_{!!$fgroup->id!!}">
				  	<div class="panel panel-default">
						<div class="panel-heading">
					  		<h4 class="panel-title text-left">
					       		<span class="label label-warning filters-count">
					       			{!!count($fgroup->Subcategoryfilters)!!}
					       		</span>
					       		&nbsp;
					            <a href="#collapse_{{$fgroup->id}}" data-parent="#accordion_{!!$fgroup->id!!}" data-toggle="collapse" aria-expanded="false" class="accordion-name">
					                 {{$fgroup->name}}
					            </a>

								<div class="dropdown pull-right">
								  	<button class="btn btn-default btn-xs dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								    	Actions
								    	<span class="caret"></span>
								  	</button>
								  	<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
								    	<li>
								    		<a href="#" data-href="{!!route('filtersubcategory.filter.create', ['id'=>$fgroup->id])!!}" data-target=".bs-modal-nm" data-toggle="modal" >
								    			<i class="fa fa-plus text-success"></i> Add
								    		</a>
								    	</li>								    	
								    	<li>
								    		<a href="#" data-href="{!!route('filtersubcategory.group.edit', ['id'=>$fgroup->id])!!}" data-target=".bs-modal-nm" data-toggle="modal" >
								    			<i class="fa fa-pencil text-primary"></i> Edit
								    		</a>
								    	</li>
								    	<li>
								    		<a href="#" data-deleteurl="{!!route('filtersubcategory.group.delete', ['id' => $fgroup->id])!!}" class="delete-sfiltergroup">
								    			<i class="fa fa-trash text-danger"></i> Delete
								    		</a>
								    	</li>
								  	</ul>
								</div>



					        </h4>
					    </div>

					    <div class="panel-collapse collapse" id="collapse_{{$fgroup->id}}" aria-expanded="false" style="">
					        <div class="panel-body">
					           	<table class="table table-bordered">
					           		
				           			<tr>
				           				<th>Filter Name</th>
				           				<th>Sort Order</th>
				           				<th>Actions</th>
				           			</tr>
					           		
				           			@if( !empty($fgroup->Subcategoryfilters) )
				           			@foreach( $fgroup->Subcategoryfilters as $filter )
					           			<tr>
					           				<td class="sfilter-name">{{$filter->name}}</td>
					           				<td>{{$filter->sortorder}}</td>
					           				<td>
												<div class="dropdown">
												  	<button class="btn btn-default btn-xs dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
												    	Actions
												    	<span class="caret"></span>
												  	</button>
												  	<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
												    	<li>
												    		<a href="#" data-href="{!!route('filtersubcategory.filter.edit', ['id' => $filter->id])!!}" data-target=".bs-modal-nm" data-toggle="modal" >
												    			<i class="fa fa-pencil text-primary"></i> Edit
												    		</a>
												    	</li>
												    	<li>
												    		<a href="#" data-deleteurl="{!!route('filtersubcategory.filter.delete', ['id' => $filter->id])!!}" class="delete-sfilter" class="delete-sfilter">
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
		  		<td>{{$fgroup->sortorder}}</td>
		  	</tr>
  		@endforeach
  	@endif  	
</table>

<script type="text/javascript">
	$(function(){
		//Delete Category
		$(this).on('click', ".delete-sfiltergroup", function(e){
			e.preventDefault();
			var cnt = Number($(this).closest('tr').find('td .filters-count').text());

			if( cnt > 0 ){
				$.bootstrapGrowl("Can't delete, because it has Filter(s)",{
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
		$(this).on('click', ".delete-sfilter", function(e){
			e.preventDefault();
			$(this).deleteThis({
				targetParent : 'tr',
				targetName : 'td.sfilter-name'
			});
		});
	});
</script>