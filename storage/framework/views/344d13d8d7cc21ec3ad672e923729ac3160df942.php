<?php $__env->startSection('content'); ?>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	      <h1>
	        Slides
	        <a href="<?php echo e(route('admin.banner.create')); ?>" class="btn btn-primary">Add New</a> 
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li class="active">Banners</li>
	      </ol>
	    </section>

	    <!-- Main content -->
	    <section class="content">
	    	<div class="row">
	    		<div class="col-xs-12">

	    		</div>
	    	</div>
	    </section>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>