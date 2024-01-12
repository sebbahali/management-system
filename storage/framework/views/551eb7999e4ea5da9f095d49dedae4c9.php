<?php $__env->startSection('title'); ?>
الرئيسية
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentheader'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentheaderactivelink'); ?>
<a href="<?php echo e(route('admin.dashboard')); ?>">   الرئيسية</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentheaderactive'); ?>
عرض
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div style="
 background-image: url(<?php echo e(asset('assets/admin/dist/img/Management.jpg')); ?>);
 width: 100%;
min-height: 600px;
background-size: cover; ">

</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Timgad informatique\Desktop\atef soft\Laravel10_HRMS-86_last_branch_public\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>