<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		&times;
	</button>
	<h4 class="modal-title" id="myModalLabel">Add Filters to: {{$info->name}}</h4>
</div>

<div class="modal-body">

  {!!Form::open( ['route'=> ['filtersubcategory.filter.store', $info->id], 'role'=>'form', 'class'=>'form-horizontal', 'id'=>'saveform'])!!}

	  	<table class="table table-bordered table-striped">
	  		<tr>
	  			<th>Filter Name</th>
	  			<th>Sort Order</th>
	  			<th>Remove</th>
	  		</tr>

	  		<tbody class="filternameBody">
		  		<tr>
		  			<td>
		  				<input type="text" name="filter[name][0]" class="form-control" validate="required" placeholder="Filter name">
		  			</td>
		  			<td>
		  				<input type="text" name="filter[sortorder][0]" class="form-control" placeholder="Sort order">

		  			</td>
		  			<td>
		  				<button class="btn btn-danger removeFilter">
		  					<i class="fa fa-minus"></i>
		  				</button>
		  			</td>
		  		</tr>
			</tbody>
	  	</table>

 	<button class="btn btn-info addFilterBtn"><i class="fa fa-plus"></i></button>
  {!!Form::close()!!}

  <br>

	<div class="text-center ajax-loader hide">
	    <img src="{{asset('assets/bucketcodes/img/ajax-loader.gif')}}" alt="loading..."> 
	</div>
	<div id="entry-msg-error" class="entry-error"></div>


</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

	<button type="button" class="btn btn-success" id="submit-save"><i class="fa fa-check fa-lg"></i> Update</button>
</div>


 <script type="text/javascript">
 $(function(){
 	$('.addFilterBtn').click(function(e){
 		e.preventDefault();
 		var contentx, lastCount;


 		lastCount = $('.filternameBody').find('tr').get().length;

 		contentx = '<tr>';
	 	contentx +='<td><input type="text" name="filter[name]['+lastCount+']" class="form-control" validate="required" placeholder="Filter name"></td>';
		contentx +='<td><input type="text" name="filter[sortorder]['+lastCount+']" class="form-control" placeholder="Sort Order"></td>';
		contentx += '<td><button class="btn btn-danger removeFilter"><i class="fa fa-minus"></i></button></td>';
	 	contentx += '</tr>';

 		$('.filternameBody').append(contentx);

 	});

 	//Removing FilterName
 	$('.table').on('click', '.removeFilter', function(e){
 		e.preventDefault();
 		$(this).closest('tr').remove();
 	});

 	//Saving through Ajax

 	$("#submit-save").on("click", function(e){
		e.preventDefault();
		$('form#saveform').ajaxrequest({
            msgPlace: '.entry-error',
            validate: {etype: 'group'},
            ajaxloader: '.ajax-loader',
            pageReload : true,
		});
	});
 });
 </script>