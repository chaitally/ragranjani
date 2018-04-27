<!DOCTYPE html>
  <html  lang="<?php echo e(app()->getLocale()); ?>">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title><?php echo $__env->yieldContent('title'); ?></title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>" />
      <link rel="stylesheet" href="<?php echo e(asset('AdminLTE/dist/css/AdminLTE.min.css')); ?>" />
      <link rel="stylesheet" href="<?php echo e(asset('AdminLTE/dist/css/skins/_all-skins.min.css')); ?>" />
      <link rel="stylesheet" href="<?php echo e(asset('AdminLTE/bower_components/font-awesome/css/font-awesome.min.css')); ?>" />

      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body  class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper" style="height: auto; min-height: 100%;">
          <?php echo $__env->make('admin.partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php echo $__env->make('admin.partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php echo $__env->yieldContent('content'); ?>
      </div>
      <script src="<?php echo e(asset('js/jquery-3.3.1.min.js')); ?>"></script>
      <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
      <script src="<?php echo e(asset('AdminLTE/dist/js/adminlte.min.js')); ?>"></script>
      <?php echo $__env->yieldContent('scripts'); ?>
    </body>
</html>