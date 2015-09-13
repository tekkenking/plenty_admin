<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">
		<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
	</button>
	
	<h4 class="modal-title" id="myModalLabel">{!!$subcatedit!!}</h4>
</div>

<div class="modal-body">
		
	{!! Form::open( ['route'=>'catalog.category.post.update.subcategory', 'role'=>'form', 'class'=>'form-horizontal', 'id'=>'savecategory']) !!}
		<div class="mesh-input-group">
			<input type="hidden" name="id" value={!!$subcat->id!!}>
			<input type="text" class="form-control" value="{!!$subcat->name!!}" name="name" id="subcategory" validate="required" placeholder="Sub Category name">
			<input type="text" class="form-control" value="{!!$subcat->title!!}" name="title" id="subcategorytitle" placeholder="Sub Category title">
			<input type="number" class="form-control" value="{!!$subcat->sortorder!!}" name="sortorder" id="sort_order" placeholder="Sort Order">
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
	<button type="button" id="save" class="btn btn-primary">Save changes</button>
</div>


<script type="text/javascript">
$(function(){

	$("#save").on("click", function(e){
		e.preventDefault();
		$('form#savecategory').ajaxrequest({
			msgPlace: '.entry-error',
			validate: {etype: 'group'},
			pageReload: true,
			ajaxType : 'PUT',
            ajaxloader: '.ajax-loader'
		});
	});

})
</script>