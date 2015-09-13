<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">
		<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
	</button>
	
	<h4 class="modal-title" id="myModalLabel">{!!$addsubcat!!}</h4>
</div>

<div class="modal-body">
		
		<div class="alert alert-info">
			<h4>{!!$catname!!}</h4>
		</div>

		{!! Form::open( ['route'=>'catalog.category.save.subcategory', 'role'=>'form', 'class'=>'form-horizontal', 'id'=>'savesubcategory']) !!}
		<div class="mesh-input-group">

		<input type="hidden" name="category_id" value="{!!$catid!!}">

		<input type="text" class="form-control" name="name" id="subcategory" validate="required" placeholder="Sub Category name">

		<input type="text" class="form-control" name="title" id="subcategory_title" placeholder="Sub Category title [Optional]">		
		
		<input type="number" class="form-control" name="sortorder" id="sort_order" placeholder="Sort Order [Optional]">

		</div>
	{!! Form::close() !!}

	<br>
	<div class="text-center ajax-loader hide">
		<img src="{{asset('assets/bucketcodes/img/ajax-loader.gif')}}" alt="loading..."> 
	</div>
	<div id="entry-msg-error" class="entry-error"></div>
	

</div>

<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	<button type="button" id="save" class="btn btn-primary">Save</button>
</div>


<script type="text/javascript">
$(function(){

	$("#save").on("click", function(e){
		e.preventDefault();
		$('form#savesubcategory').ajaxrequest({
			msgPlace: '.entry-error',
			validate: {etype: 'group'},
			pageReload: true,
            ajaxloader: '.ajax-loader'
		});
	});

})
</script>