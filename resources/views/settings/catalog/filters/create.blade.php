<div class="panel panel-default">
  <div class="panel-heading">
    <h2 class="panel-title">
    	<i class="fa fa-pencil fa-lg"></i> 
    	Add Filter For: {!!$info->name!!}
    </h2>
  </div>
  <div class="panel-body">
  {!!Form::open( ['route'=> 'filtersubcategory.store', 'role'=>'form', 'class'=>'form-horizontal', 'id'=>'saveform'])!!}
  	  <div class="form-group">
	    <label for="filtergroup_name" class="col-sm-4 control-label">Filter group name</label>
	    <div class="col-sm-8">
	      <input type="text" class="form-control" id="filtergroup_name" name="filtergroup[name]" validate="required" placeholder="Filter Group Name">
	    </div>
	  </div>

  	  <div class="form-group">
	    <label for="filtergroup_sortorder" class="col-sm-4 control-label">Sort Order</label>
	    <div class="col-sm-8">
	      <input type="text" class="form-control" id="filtergroup_sortorder" name="filtergroup[sortorder]" placeholder="Sort Order">
	    </div>

	    <input type="hidden" name="filtergroup[subcategory_id]" value="{!!$info->id!!}">
	  </div>

	  <hr>

	  <table class="table table-bordered table-striped">
	  	<thead>
	  		<tr>
	  			<th>Filter Name</th>
	  			<th>Sort Order</th>
	  			<th>Remove</th>
	  		</tr>
	  	</thead>
	  	<tbody class="filternameBody">
	  		<tr>
	  			<td>
	  				<input type="text" name="filter[name][0]" class="form-control" validate="required" placeholder="Filter name">
	  			</td>
	  			<td>
	  				<input type="text" name="filter[sortorder][0]" class="form-control" placeholder="Sort Order">
	  			</td>
	  			<td></td>
	  		</tr>
	  	</tbody>
	  </table>

 	<button class="pull-right btn btn-info addFilterBtn"><i class="fa fa-plus"></i></button>

	<button type="submit" class="btn btn-success" id="submit-save">
		<i class="fa fa-check fa-lg"></i> Save
	</button>
  {!!Form::close()!!}

  <br>

	<div class="text-center ajax-loader hide">
	    <img src="{{asset('assets/bucketcodes/img/ajax-loader.gif')}}" alt="loading...">
	</div>
	<div id="entry-msg-error" class="entry-error"></div>


  </div>
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
            clearfields : true,
		});
	});
 });
 </script>