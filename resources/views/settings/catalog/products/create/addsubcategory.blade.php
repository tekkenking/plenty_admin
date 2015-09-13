<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		&times;
	</button>
	<h4 class="modal-title" id="myModalLabel">Add Subcategory</h4>
</div>

<div class="modal-body">

	<h2 class="callout callout-info"> {{$info->name}} </h2>

	{{Form::open( ['route'=>'menusubcategory.store', 'role'=>'form', 'class'=>'form-horizontal', 'id'=>'saveform'])}}

		<input type="text" class="form-control" name="name" placeholder="Enter subcategory" validate='required'>

		<input type="text" class="form-control" name="link" placeholder="Enter link text [Optional]">

		<input type="text" class="form-control" name="description" placeholder="Enter description [Optional]">

		<input type="hidden" name="menusubcategoryheader_id" value="{{$info->id}}">

	{{Form::close()}}

	<div class="text-center ajax-loader hide">
	    <img src="{{asset('img/ajax-loader.gif')}}" alt="loading..."> 
	</div>
	<br>
	<div id="entry-msg-error" class="error-msg"></div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

    <button type="button" class="btn btn-primary" id="submit-create-subcategory"> Save Subcategory Header</button>
</div>

<script type="text/javascript">
$(function(){

	$("#submit-create-subcategory").on("click", function(e){
		e.preventDefault();
		$('form#saveform').ajaxrequest({
			msgPlace: '.error-msg',
			validate: {etype: 'group'},
			redirectDelay: 500,
            ajaxloader: '.ajax-loader'
		});
	});

})
</script>