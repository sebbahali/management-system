<?php $__env->startSection('title'); ?>
الفروع
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentheader'); ?>
قائمة الضبط
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentheaderactivelink'); ?>
<a href="<?php echo e(route('branches.index')); ?>">   الفروع</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentheaderactive'); ?>
عرض
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="col-12">
   <div class="card">
      <div class="card-header">
         <h3 class="card-title card_title_center">  بيانات  الفروع 
            <a href="<?php echo e(route('branches.create')); ?>" class="btn btn-sm btn-warning">اضافة جديد</a>
         </h3>
      </div>
      <div class="card-body">
         <?php if(@isset($data) and !@empty($data) ): ?>
         <table id="example2" class="table table-bordered table-hover">
            <thead class="custom_thead">
               <th>  كود الفرع</th>
               <th>  الاسم</th>
               <th>   العنوان</th>
               <th>   الهاتف</th>
               <th>   الايميل</th>
               <th>   حالة التفعيل</th>
               <th>  الاضافة بواسطة</th>
               <th>  التحديث بواسطة</th>
               <th></th>
            </thead>
            <tbody>
               <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <tr>
                  <td> <?php echo e($info->id); ?> </td>
                  <td> <?php echo e($info->name); ?> </td>
                  <td> <?php echo e($info->address); ?> </td>
                  <td> <?php echo e($info->phones); ?> </td>
                  <td> <?php echo e($info->email); ?> </td>
                  <td <?php if($info->active==1): ?> class="bg-success" <?php else: ?> class="bg-danger"  <?php endif; ?>      > <?php if($info->active==1): ?> مفعل <?php else: ?> معطل <?php endif; ?></td>
                  <td><?php echo e($info->added->name); ?> </td>
                  <td>
                     <?php if($info->updated_by>0): ?>
                     <?php echo e($info->updatedby->name); ?> 
                     <?php else: ?>
                     لايوجد
                     <?php endif; ?>
                  </td>
                  <td>
                     <a  href="<?php echo e(route('branches.edit',$info->id)); ?>" class="btn btn-success btn-sm">تعديل</a>
                     <a  href="<?php echo e(route('branches.destroy',$info->id)); ?>" class="btn are_you_shur  btn-danger btn-sm">حذف</a>
                  </td>
               </tr>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
         </table>
         <?php else: ?>
         <p class="bg-danger text-center"> عفوا لاتوجد بيانات لعرضها</p>
         <?php endif; ?>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Timgad informatique\Desktop\atef soft\Laravel10_HRMS-86_last_branch_public\resources\views/admin/Branches/index.blade.php ENDPATH**/ ?>