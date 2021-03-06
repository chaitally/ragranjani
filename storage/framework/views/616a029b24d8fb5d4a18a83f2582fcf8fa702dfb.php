<?php $__env->startSection('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">

                <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('banner.store')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                        <label class="col-md-1 control-label">Title</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="title" value="<?php echo e(old('title')); ?>">
                            <?php if($errors->has('title')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('title')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('slide') ? ' has-error' : ''); ?>">
                        <label class="col-md-1 control-label">Slide Image</label>
                        <div class="col-md-5">
                            <input type="file" class="" name="slide" />
                            <?php if($errors->has('slide')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('slide')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('caption') ? ' has-error' : ''); ?>">
                        <label class="col-md-1 control-label">Caption</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="caption" value="<?php echo e(old('caption')); ?>">
                            <?php if($errors->has('caption')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('caption')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('content') ? ' has-error' : ''); ?>">
                        <label class="col-md-1 control-label">Slide Content</label>
                        <div class="col-md-8">
                            <textarea class="form-control" name="content"><?php echo e(old('content')); ?></textarea>
                            <?php if($errors->has('content')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('content')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <input type="submit" name="submit" value="Submit" />
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>