<?php $__env->startSection('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container">
        <header class="page-header">
            <h1><?php echo e($banner->title); ?></h1>
        </header>
        <div class="row">
        	<div class="col-xs-9">
        		<img src="<?php echo e($banner->slide_img_path); ?>" alt="<?php echo e($banner->title); ?>" title="<?php echo e($banner->title); ?>" />
        	</div>
        </div>

		<div class="row form-group">
        	<div class="col-xs-9">
        		<div><strong>Caption</strong></div>
        		<?php echo e($banner->caption); ?>

        	</div>
        </div>

        <div class="row form-group">
        	<div class="col-xs-9">
        		<div><strong>Content</strong></div>
        		<?php echo $banner->content; ?>

        	</div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>