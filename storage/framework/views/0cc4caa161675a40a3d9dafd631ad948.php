<?php $__env->startSection('title'); ?>
الشفتات
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentheader'); ?>
قائمة الضبط
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentheaderactivelink'); ?>
<a href="<?php echo e(route('ShiftsTypes.index')); ?>">   الشفتات</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentheaderactive'); ?>
اضافة
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="col-12">
   <div class="card">
      <div class="card-header">
         <h3 class="card-title card_title_center">  اضافة  شفت جديد
         </h3>
      </div>
      <div class="card-body">
         <form action="<?php echo e(route('ShiftsTypes.store')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="col-md-12">
               <div class="form-group">
                  <label> نوع الشفت </label>
                  <select name="type" id="type" class="form-control">
                     <option value="">اختر النوع</option>
                     <option <?php if(old('type')==1): ?> selected <?php endif; ?> value="1">صباحي</option>
                     <option <?php if(old('type')==2): ?> selected <?php endif; ?> value="2">مسائي</option>
                     <option <?php if(old('type')==3): ?> selected <?php endif; ?> value="3"> يوم كامل</option>
                  </select>
                  <?php $__errorArgs = ['type'];
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
            <div class="form-group">
               <div class="col-md-12">
                  <div class="form-group">
                     <label>   يبدأ من الساعة </label>
                     <input type="time" name="from_time" id="from_time" class="form-control" value="<?php echo e(old('from_time')); ?>" >
                     <?php $__errorArgs = ['from_time'];
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
            </div>
            <div class="form-group">
               <div class="col-md-12">
                  <div class="form-group">
                     <label>   ينتهي  الساعة </label>
                     <input type="time" name="to_time" id="to_time" class="form-control" value="<?php echo e(old('to_time')); ?>" >
                     <?php $__errorArgs = ['to_time'];
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
            </div>
            <div class="col-md-12">
               <div class="form-group">
                  <label>    عدد الساعات</label>
                  <input type="text" name="total_hour" id="total_hour" class="form-control" value="<?php echo e(old('total_hour')); ?>" oninput="this.value=this.value.replace(/[^0-9.]/g,'');" >
                  <?php $__errorArgs = ['total_hour'];
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
                  <button class="btn btn-sm btn-success" type="submit" name="submit">اضف الشفت </button>
                  <a href="<?php echo e(route('ShiftsTypes.index')); ?>" class="btn btn-danger btn-sm">الغاء</a>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Timgad informatique\Desktop\atef soft\Laravel10_HRMS-86_last_branch_public\resources\views/admin/ShiftsTypes/create.blade.php ENDPATH**/ ?>