<?php $__env->startSection('title'); ?>
بيانات الموظفين
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentheader'); ?>
قائمة الضبط
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentheaderactivelink'); ?>
<a href="<?php echo e(route('Employees.index')); ?>">     الموظفين</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentheaderactive'); ?>
عرض
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="col-12">
   <div class="card">
      <div class="card-header">
         <h3 class="card-title card_title_center">  بيانات  الموظفين 
            <a href="<?php echo e(route('Employees.create')); ?>" class="btn btn-sm btn-success">اضافة جديد</a>
         </h3>
      </div>
      <div class="card-body" id="ajax_responce_serachDiv">
         <?php if(@isset($data) and !@empty($data) and count($data)>0 ): ?>
         <table id="example2" class="table table-bordered table-hover">
            <thead class="custom_thead">
               <th>    اسم الديانة</th>
               <th>   حالة التفعيل</th>
               <th>  الاضافة بواسطة</th>
               <th>  التحديث بواسطة</th>
               <th></th>
            </thead>
            <tbody>
               <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <tr>
                  <td><?php echo e($info->name); ?></td>
                  <td <?php if($info->active==1): ?> class="bg-success" <?php else: ?> class="bg-danger"  <?php endif; ?> > <?php if($info->active==1): ?> مفعل <?php else: ?> معطل <?php endif; ?></td>
                  <td>
                     <?php
                     $dt=new DateTime($info->created_at);
                     $date=$dt->format("Y-m-d");
                     $time=$dt->format("h:i");
                     $newDateTime=date("a",strtotime($info->created_at));
                     $newDateTimeType= (($newDateTime=='AM')?'صباحا ':'مساء'); 
                     ?>
                     <?php echo e($date); ?> <br>
                     <?php echo e($time); ?>

                     <?php echo e($newDateTimeType); ?>  <br>
                     <?php echo e($info->added->name); ?> 
                  </td>
                  <td>
                     <?php if($info->updated_by>0): ?>
                     <?php
                     $dt=new DateTime($info->updated_at);
                     $date=$dt->format("Y-m-d");
                     $time=$dt->format("h:i");
                     $newDateTime=date("a",strtotime($info->updated_at));
                     $newDateTimeType= (($newDateTime=='AM')?'صباحا ':'مساء'); 
                     ?>
                     <?php echo e($date); ?>  <br>
                     <?php echo e($time); ?>

                     <?php echo e($newDateTimeType); ?>  <br>
                     <?php echo e($info->updatedby->name); ?> 
                     <?php else: ?>
                     لايوجد
                     <?php endif; ?>
                  </td>
                  <td>
                     <a  href="<?php echo e(route('Religions.edit',$info->id)); ?>" class="btn btn-success btn-sm">تعديل</a>
                     <a  href="<?php echo e(route('Religions.destroy',$info->id)); ?>" class="btn are_you_shur  btn-danger btn-sm">حذف</a>
                  </td>
               </tr>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
         </table>
         <br>
         <div class="col-md-12 text-center">
            <?php echo e($data->links('pagination::bootstrap-5')); ?>

         </div>
         <?php else: ?>
         <p class="bg-danger text-center"> عفوا لاتوجد بيانات لعرضها</p>
         <?php endif; ?>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Timgad informatique\Desktop\atef soft\Laravel10_HRMS-86_last_branch_public\resources\views/admin/Employees/index.blade.php ENDPATH**/ ?>