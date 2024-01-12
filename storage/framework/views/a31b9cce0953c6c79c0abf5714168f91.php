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
تعديل
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="col-12">
   <div class="card">
      <div class="card-header">
         <h3 class="card-title card_title_center">  تعديل بيانات فرع
         </h3>
      </div>
      <div class="card-body">
         <form action="<?php echo e(route('branches.update',$data['id'])); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="form-group">
               <div class="col-md-12">
                  <div class="form-group">
                     <label>   اسم الفرع</label>
                     <input type="text" name="name" id="name" class="form-control" value="<?php echo e(old('name',$data['name'])); ?>" >
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
            </div>
            <div class="col-md-12">
               <div class="form-group">
                  <label>   عنوان الفرع</label>
                  <input type="text" name="address" id="address" class="form-control" value="<?php echo e(old('address',$data['address'])); ?>" >
                  <?php $__errorArgs = ['address'];
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
                  <label>   هاتف الفرع</label>
                  <input type="text" name="phones" id="phones" class="form-control" value="<?php echo e(old('phones',$data['phones'])); ?>" >
                  <?php $__errorArgs = ['phones'];
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
                  <label>   ايميل الفرع</label>
                  <input type="email" name="email" id="email" class="form-control" value="<?php echo e(old('email',$data['email'])); ?>" >
                  <?php $__errorArgs = ['email'];
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
                  <select name="active" id="active" class="form-control">
                  <option <?php echo e(old('active',$data['active'])==1 ? 'selected':''); ?>  value="1">مفعل</option>
                  <option <?php echo e(old('active',$data['active'])==0 ? 'selected':''); ?>   value="0">معطل</option>
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
                  <button class="btn btn-sm btn-success" type="submit" name="submit">تعديل الفرع </button>
                  <a href="<?php echo e(route('branches.index')); ?>" class="btn btn-danger btn-sm">الغاء</a>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Timgad informatique\Desktop\atef soft\Laravel10_HRMS-86_last_branch_public\resources\views/admin/Branches/edit.blade.php ENDPATH**/ ?>