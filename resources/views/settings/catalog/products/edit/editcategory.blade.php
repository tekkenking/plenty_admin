<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		&times;
	</button>
	<h4 class="modal-title" id="myModalLabel">Update Category</h4>
</div>

<div class="modal-body">

	{{Form::open( ['route'=>['bucket.settings.catalog.products.save.editcategory', $categoryInfo->id], 'role'=>'form', 'class'=>'form-horizontal', 'id'=>'updateform'])}}
		<input type="text" class="form-control" name="name" placeholder="{{$categoryInfo->name}}" />

	{{Form::close()}}

	<div class="text-center ajax-loader hide">
    <img src="{{asset('img/ajax-loader.gif')}}" alt="loading..."> 
</div>
<div id="entry-msg-error" class="entry-error"></div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

    <button type="button" class="btn btn-primary" id="submit-changes"> Save Changes</button>
</div>

<script type="text/javascript">
$(function(){

	$("#submit-changes").on("click", function(e){
		e.preventDefault();
		$('form#updateform').ajaxrequest({
            msgPlace: '.entry-error',
            validate: {etype: 'group'},
            ajaxloader: '.ajax-loader'
		});
	});

})
</script>