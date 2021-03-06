<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">
		<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
	</button>
	
	<h4 class="modal-title" id="myModalLabel">{!!$catedit!!}</h4>
</div>

<div class="modal-body">
		
		{!! Form::open( ['route'=>['catalogsettings.save.edit.category', $catid], 'role'=>'form', 'class'=>'form-horizontal', 'id'=>'savecategory']) !!}
		<div class="mesh-input-group">
			<input type="hidden" name="id" value={!!$catid!!}>
			<input type="text" class="form-control" value="{!!$catname!!}" name="name" id="category" validate="required" placeholder="Category name">
			<input type="number" class="form-control" value="{!!$catsortorder!!}" name="sortorder" id="sort_order" placeholder="Sort Order">
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
	<button type="button" id="submit-create-subcategory" class="btn btn-primary">Save changes</button>
</div>


<script type="text/javascript">
$(function(){

	$("#submit-create-subcategory").on("click", function(e){
		e.preventDefault();
		$('form#savecategory').ajaxrequest({
			msgPlace: '.entry-error',
			validate: {etype: 'group'},
			pageReload: true,
            ajaxloader: '.ajax-loader'
		});
	});

})
</script>