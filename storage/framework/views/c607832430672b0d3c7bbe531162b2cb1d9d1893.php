<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/cropper-master/dist/cropper.css')); ?>">
<script src="<?php echo e(asset('js/tinymce/jquery.tinymce.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/tinymce/tinymce.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/cropper-master/dist/cropper.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<!-- Content Wrapper. Contains page content -->
<div id="page-banner-edit" class="content-wrapper">
    <div class="container">
		<header class="page-header">
            <h1>Edit Banner Slide</h1>
        </header>

        <form method="post" action="<?php echo e(url('admin/banner/'. $banner->slug .'/edit')); ?>"  enctype="multipart/form-data" >
        	<?php echo csrf_field(); ?>

        	<div class="row">
        		<div class="col-xs-9">
        			<div class="form-group">
	        			<div><label>Title</label></div>
	        			<div><input type="text" class="form-control" name="title" value="<?php echo e($banner->title); ?>" /></div>
        			</div>
        		</div>
        	</div>
       
       		<div class="row form-group">
	        	<div class="col-xs-9">
	        		<div class="form-group">
		        		<div><label>Slide Image</label></div>
		        		<div id="slide-img-wrapper" style="position:relative">
                  <?php if($banner->slide_img_path): ?>
		        			<img id="slide-img" src="<?php echo e($banner->slide_img_path); ?>" title="<?php echo e($banner->title); ?>" alt="<?php echo e($banner->title); ?>" /> 
		        			<span id="slide-img-delete" style="position:absolute; right:0;top:0;"><i class="fa fa-times"></i></span>
                  <span id="slide-img-edit" data-toggle="modal" data-target="#cropper-modal"><i class="fa fa-pencil"></i></span>
                  <?php endif; ?>
		        		</div>
                <input type="hidden" id="hasImgSet" name="hasImgSet" value="<?php echo e(($banner->slide_img_path) ?'y' :'n'); ?>" />
                  <div><input type="file" id="slide-img-upload" class="" name="slide" onchange="readURL(this)" /></div>
		        	</div>
	        	</div>
	        </div>


			<div class="row form-group">
	        	<div class="col-xs-9">
	        		<div class="form-group">
		        		<div><label>Caption</label></div>
		        		<div><input type="text" class="form-control" name="caption" value="<?php echo e($banner->caption); ?>" /></div>
		        	</div>
	        	</div>
	        </div>

	        <div class="row form-group">
	        	<div class="col-xs-9">
	        		<div><strong>Content</strong></div>
	        		<textarea class="form-control editor" name="content" id="content" rows="10" cols="50"><?php echo e($banner->content); ?></textarea>
	        	</div>
	        </div>

	        <div class="row form-group">
	        	<div class="col-xs-9">
	        		<input type='submit' name="submit" value="Submit" />
	        	</div>
	        </div>

    	</form>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="cropper-modal" tabindex="-1" role="dialog" aria-labelledby="cropper-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body clearfix">
          <div class="col-md-9">
            <div id="canvas"><img id="img-to-crop" src="<?php echo e($banner->slide_img_path); ?>" /></div>
          </div>
          <div class="col-md-3">
            <div class="preview"></div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btn-crop" class="btn btn-primary">Crop</button>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea.editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern codesample",
      "fullpage toc tinymcespellchecker imagetools help"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic strikethrough | alignleft aligncenter alignright alignjustify | ltr rtl | bullist numlist outdent indent removeformat formatselect| link image media | emoticons charmap | code codesample | forecolor backcolor",
    
    relative_urls: false,
    remove_script_host: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinymce.activeEditor.windowManager.open({
        file: cmsURL,
        title: 'File manager',
        width: 900,
        height: 450,
        resizable: 'yes'
      }, {
        setUrl: function (url) {
          win.document.getElementById(field_name).value = url;
        }
      });
    }
  };


  tinymce.init(editor_config);
 
</script>

<script>
  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#slide-img')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
  }
</script>
<script>
  $('#cropper-modal').on('shown.bs.modal', function() {
    $image = $('#img-to-crop');
    $preview = $('.preview');
    $preview.css("overflow", "hidden").css("width", "200").css("height", "200");
   

    $image.cropper({
        aspectRatio: 16 / 9,
        preview:'.preview',
        crop: function(event) {
          console.log(event.detail.x);
          console.log(event.detail.y);
          console.log(event.detail.width);
          console.log(event.detail.height);
          console.log(event.detail.rotate);
          console.log(event.detail.scaleX);
          console.log(event.detail.scaleY);
        }
      });

      var cropper = $image.data('cropper');

      $('#btn-crop').click(function(){
        alert('crop button clicked');
        cropper.getCroppedCanvas().toBlob(function(blob){
          alert('cropped canvas ');
          var formData = new FormData();
          alert('after formData');
          formData.append('croppedImage', blob);

          $.ajax('/', {
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function () {
              //console.log('Upload success');
              alert("upload success");
            },
            error: function () {
              console.log('Upload error');
            }
          });

          
        });
      });
  });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>