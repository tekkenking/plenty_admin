<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		&times;
	</button>
	<h4 class="modal-title" id="myModalLabel">Add category</h4>
</div>

<div class="modal-body">
	{{Form::open( ['route'=>'bucket.settings.catalog.products.save.itemcategory', 'files' => true, 'role'=>'form', 'class'=>'form-horizontal', 'id'=>'getcreateform'])}}

	  	<div class="form-group">
		    <label for="categoryinput" class="col-sm-6 control-label">Enter category name</label>
		    <div class="col-sm-12">
		      <input type="text" class="form-control" name="name" id="categoryinput" validate="required">
		    </div>
  		</div>

		<div class="dropzone" id="target-drop-zone">
			<div class="dropzone-previews"></div>
			<div class="fallback">
			  <!-- this is the fallback if JS isn't working -->
			  <input name="file" type="file" multiple />
			</div>
		</div>

	{{Form::close()}}

	<div class="text-center ajax-loader hide">
    <img src="{{asset('img/ajax-loader.gif')}}" alt="loading..."> 
</div>
<div id="entry-msg-error" class="entry-error"></div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

    <button type="button" class="btn btn-primary" id="submit-create-category"> Save category</button>
</div>

<script type="text/javascript">
$(function(){
 new Dropzone("#target-drop-zone", {


    //prevents Dropzone from uploading dropped files immediately
    autoProcessQueue: false,
    uploadMultiple: false,
    parallelUploads: 25,
    maxFiles: 1,
    acceptedFiles: '.jpg, .jpeg, .png, .gif',
    addRemoveLinks: true,
    previewsContainer: ".dropzone-previews",
    url: $('#getcreateform').prop('action'),


    // The setting up of the dropzone
    init: function() {
      var myDropzone = this;

      // Here's the change from enyo's tutorial...

      $("#submit-create-category").on('click',function(e) {
        e.preventDefault();
        e.stopPropagation();


        if (myDropzone.getQueuedFiles().length > 0) {  
        	//_debug($('form#getcreateform').validater());

        	if($('form#getcreateform').validater() === ''){
		        myDropzone.on('sending', function(file, xhr, formData){
		        	formData.append("name", $("input[name='name']").val());
		        });
		        myDropzone.processQueue();
			}

        }else{
	            $('form#getcreateform').ajaxrequest({
	                msgPlace: '.entry-error',
	                validate: {etype: 'group'},
	                ajaxloader: '.ajax-loader'
	            });
        }

      });

    }



  });

})
</script>