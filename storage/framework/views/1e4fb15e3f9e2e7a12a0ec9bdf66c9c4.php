<div class="content-wrapper">

    
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo $__env->yieldContent('contentheader'); ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><?php echo $__env->yieldContent('contentheaderactivelink'); ?></li>
              <li class="breadcrumb-item active"><?php echo $__env->yieldContent('contentheaderactive'); ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
     <div class="row" style="background-color: white;">
      <?php if(Session::has('error')): ?>
      <div class="alert alert-danger text-right" role="alert">
      <?php echo e(Session::get('error')); ?>  
      </div>
   <?php endif; ?>
   <?php if(Session::has('success')): ?>
   <div class="alert alert-success text-right" role="alert">
   <?php echo e(Session::get('success')); ?>  
   </div>
<?php endif; ?>

     <?php echo $__env->yieldContent('content'); ?>
      

     </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div><?php /**PATH C:\Users\Timgad informatique\Desktop\atef soft\Laravel10_HRMS-86_last_branch_public\resources\views/admin/includes/content.blade.php ENDPATH**/ ?>