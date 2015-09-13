<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		&times;
	</button>
	<h4 class="modal-title" id="myModalLabel">Add Subcategory Header</h4>
</div>

<div class="modal-body">

	<h2 class="callout callout-info"> {{$categoryInfo->name}} </h2>

	<em class="muted"> Separate list with comma or enter key </em>
	{{Form::open( ['route'=>'menusubcategoryheader.store', 'role'=>'form', 'class'=>'form-horizontal', 'id'=>'saveform'])}}

		<input type="text" class="form-control tm-input tm-input-warning" name="name" placeholder="Enter subcategory headers">
		<input type="hidden" name="categoryid" value="{{$categoryInfo->id}}">

	{{Form::close()}}

	<div class="text-center ajax-loader hide">
    <img src="{{asset('img/ajax-loader.gif')}}" alt="loading..."> 
</div>
<div id="entry-msg-error" class="error-msg"></div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

    <button type="button" class="btn btn-primary" id="submit-create-subcategory-header"> Save Subcategory Header</button>
</div>

<script type="text/javascript">
$(function(){

	$("#submit-create-subcategory-header").on("click", function(e){
		e.preventDefault();
		$('form#saveform').ajaxrequest({
			msgPlace: '.error-msg',
			redirectDelay: 500,
            ajaxloader: '.ajax-loader'
		});
	});

	$(".tm-input").tagsManager({
		tagCloseIcon : '<i class="fa fa-times"></i>',
		maxTags : 3,
		delimiters: [9, 13]
	});
})
</script>