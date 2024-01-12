<?php $__env->startSection('title'); ?>
المناسبات الرسمية
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentheader'); ?>
قائمة الضبط
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentheaderactivelink'); ?>
<a href="<?php echo e(route('occasions.index')); ?>">   المناسبات</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentheaderactive'); ?>
اضافة
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="col-12">
   <div class="card">
      <div class="card-header">
         <h3 class="card-title card_title_center">  اضافة  مناسبات رسمية
         </h3>
      </div>
      <div class="card-body">
         <form action="<?php echo e(route('occasions.store')); ?>" method="post">
            <?php echo csrf_field(); ?>
      
            <div class="col-md-12">
               <div class="form-group">
                  <label>     اسم المناسبة الرسمية</label>
                  <input  type="text" name="name" id="name" class="form-control" value="<?php echo e(old('name')); ?>"  >
                  <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <span class="text-danger"><?php echo e($message); ?></span> 
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
               </div>
            </div>
           

            <div class="col-md-12">
               <div class="form-group">
                  <label>       تبدأ من تاريخ </label>
                  <input  type="date" name="from_date" id="from_date" class="form-control" value="<?php echo e(old('from_date')); ?>"  >
                  <?php $__errorArgs = ['from_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <span class="text-danger"><?php echo e($message); ?></span> 
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
               </div>
            </div>
    
            <div class="col-md-12">
               <div class="form-group">
                  <label>       تنتهي  الي تاريخ </label>
                  <input  type="date" name="to_date" id="to_date" class="form-control" value="<?php echo e(old('to_date')); ?>"  >
                  <?php $__errorArgs = ['to_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <span class="text-danger"><?php echo e($message); ?></span> 
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
               </div>
            </div>

            <div class="col-md-12">
               <div class="form-group">
                  <label>       عدد الايام</label>
                  <input  type="text" name="days_counter" id="days_counter" oninput="this.value=this.value.replace(/[^0-9.]/g,'');"  class="form-control" value="<?php echo e(old('days_counter')); ?>"  >
                  <?php $__errorArgs = ['days_counter'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <span class="text-danger"><?php echo e($message); ?></span> 
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
               </div>
            </div>


            <div class="col-md-12">
               <div class="form-group">
                  <label> حالة التفعيل</label>
                  <select  name="active" id="active" class="form-control">
                  <option   <?php if(old('active')==1): ?> selected <?php endif; ?>  value="1">مفعل</option>
                  <option <?php if(old('active')==0 and old('active')!=''): ?> selected <?php endif; ?> value="0">معطل</option>
                  </select>
                  <?php $__errorArgs = ['active'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <span class="text-danger"><?php echo e($message); ?></span> 
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
               </div>
            </div>
            <div class="col-md-12">
               <div class="form-group text-center">
                  <button class="btn btn-sm btn-success" type="submit" name="submit">اضف المناسبة </button>
                  <a href="<?php echo e(route('occasions.index')); ?>" class="btn btn-danger btn-sm">الغاء</a>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Timgad informatique\Desktop\atef soft\Laravel10_HRMS-86_last_branch_public\resources\views/admin/Occasions/create.blade.php ENDPATH**/ ?>