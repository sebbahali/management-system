<?php $__env->startSection('title'); ?>
الضبط العام للنظام
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentheader'); ?>
قائمة الضبط
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentheaderactivelink'); ?>
<a href="<?php echo e(route('admin_panel_settings.edit')); ?>"> تعديل الضبط العام</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentheaderactive'); ?>
تعديل
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="card">
   <div class="card-header">
      <h3 class="card-title card_title_center">  تحديث بيانات الضبط العام للنظام </h3>
   </div>
   <div class="card-body">
      <?php if(@isset($data) and !@empty($data)): ?>
      <form action="<?php echo e(route('admin_panel_settings.update')); ?>" >
         <div class="row">
            <?php echo csrf_field(); ?>
            <div class="col-md-12">
               <div class="form-group">
                  <label>اسم الشركة</label>
                  <input type="text" name="company_name" id="company_name" class="form-control" value="<?php echo e(old('company_name',$data['company_name'])); ?>"    >
                  <?php $__errorArgs = ['company_name'];
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
                  <label>هاتف الشركة</label>
                  <input type="text" name="phones" id="phones" class="form-control" value="<?php echo e(old('phones',$data['phones'])); ?>" placeholder="ادخل اسم الشركة">
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
                  <label> عنوان الشركة	</label>
                  <input type="text" name="address" id="address" class="form-control" value="<?php echo e(old('address',$data['address'])); ?>" placeholder="ادخل عنوان الشركة">
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
                  <label>بريد الشركة	</label>
                  <input type="text" name="email" id="email" class="form-control" value="<?php echo e(old('email',$data['email'])); ?>" placeholder="ادخل بريد الشركة">
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
                  <label>بعد كم دقيقة نحسب تاخير حضور	 	 	</label>
                  <input type="text" name="after_miniute_calculate_delay" id="after_miniute_calculate_delay" class="form-control" value="<?php echo e(old('after_miniute_calculate_delay',$data['after_miniute_calculate_delay'])); ?>" oninput="this.value=this.value.replace(/[^0-9.]/g,'');" >
                  <?php $__errorArgs = ['after_miniute_calculate_delay'];
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
                  <label>بعد كم دقيقة نحسب انصراف مبكر	 	</label>
                  <input type="text" name="after_miniute_calculate_early_departure" id="after_miniute_calculate_early_departure" class="form-control" value="<?php echo e(old('after_miniute_calculate_early_departure',$data['after_miniute_calculate_early_departure'])); ?>" oninput="this.value=this.value.replace(/[^0-9.]/g,'');" >
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
                  <label>بعد كم دقيقه مجموع الانصراف المبكر او الحضور المتأخر نحصم ربع يوم	 	</label>
                  <input type="text" name="after_miniute_quarterday" id="after_miniute_quarterday" class="form-control" value="<?php echo e(old('after_miniute_quarterday',$data['after_miniute_quarterday'])); ?>" oninput="this.value=this.value.replace(/[^0-9.]/g,'');" >
                  <?php $__errorArgs = ['after_miniute_quarterday'];
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
                  <label> بعد كم مرة تأخير او انصارف مبكر نخصم نص يوم	  	</label>
                  <input type="text" name="after_time_half_daycut" id="after_time_half_daycut" class="form-control" value="<?php echo e(old('after_time_half_daycut',$data['after_time_half_daycut'])); ?>" oninput="this.value=this.value.replace(/[^0-9.]/g,'');" >
                  <?php $__errorArgs = ['after_time_half_daycut'];
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
                  <label> نخصم بعد كم مره تاخير او انصارف مبكر يوم كامل	  	</label>
                  <input type="text" name="after_time_allday_daycut" id="after_time_allday_daycut" class="form-control" value="<?php echo e(old('after_time_allday_daycut',$data['after_time_allday_daycut'])); ?>" oninput="this.value=this.value.replace(/[^0-9.]/g,'');" >
                  <?php $__errorArgs = ['after_time_allday_daycut'];
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
                  <label> رصيد اجازات الموظف الشهري	  	</label>
                  <input type="text" name="monthly_vacation_balance" id="monthly_vacation_balance" class="form-control" value="<?php echo e(old('monthly_vacation_balance',$data['monthly_vacation_balance'])); ?>" oninput="this.value=this.value.replace(/[^0-9.]/g,'');" >
                  <?php $__errorArgs = ['monthly_vacation_balance'];
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
                  <label> بعد كم يوم ينزل للموظف رصيد اجازات	  	</label>
                  <input type="text" name="after_days_begin_vacation" id="after_days_begin_vacation" class="form-control" value="<?php echo e(old('after_days_begin_vacation',$data['after_days_begin_vacation'])); ?>" oninput="this.value=this.value.replace(/[^0-9.]/g,'');" >
                  <?php $__errorArgs = ['after_days_begin_vacation'];
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
                  <label> الرصيد الاولي المرحل عند تفعيل الاجازات للموظف مثل نزول عشرة ايام ونص بعد سته شهور للموظف	   	</label>
                  <input type="text" name="first_balance_begin_vacation" id="first_balance_begin_vacation" class="form-control" value="<?php echo e(old('first_balance_begin_vacation',$data['first_balance_begin_vacation'])); ?>" oninput="this.value=this.value.replace(/[^0-9.]/g,'');" >
                  <?php $__errorArgs = ['first_balance_begin_vacation'];
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
                  <label> الرصيد الاولي المرحل عند تفعيل الاجازات للموظف مثل نزول عشرة ايام ونص بعد سته شهور للموظف	   	</label>
                  <input type="text" name="sanctions_value_first_abcence" id="sanctions_value_first_abcence" class="form-control" value="<?php echo e(old('sanctions_value_first_abcence',$data['sanctions_value_first_abcence'])); ?>" oninput="this.value=this.value.replace(/[^0-9.]/g,'');" >
                  <?php $__errorArgs = ['sanctions_value_first_abcence'];
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
                  <label> قيمة خصم الايام بعد ثاني مرة غياب بدون اذن	  	</label>
                  <input type="text" name="sanctions_value_second_abcence" id="sanctions_value_second_abcence" class="form-control" value="<?php echo e(old('sanctions_value_second_abcence',$data['sanctions_value_second_abcence'])); ?>" oninput="this.value=this.value.replace(/[^0-9.]/g,'');" >
                  <?php $__errorArgs = ['sanctions_value_second_abcence'];
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
                  <label> قيمة خصم الايام بعد ثالث مرة غياب بدون اذن	  	</label>
                  <input type="text" name="sanctions_value_thaird_abcence" id="sanctions_value_thaird_abcence" class="form-control" value="<?php echo e(old('sanctions_value_thaird_abcence',$data['sanctions_value_thaird_abcence'])); ?>" oninput="this.value=this.value.replace(/[^0-9.]/g,'');" >
                  <?php $__errorArgs = ['sanctions_value_thaird_abcence'];
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
                  <label> قيمة خصم الايام بعد رابع مرة غياب بدون اذن	  	</label>
                  <input type="text" name="sanctions_value_forth_abcence" id="sanctions_value_forth_abcence" class="form-control" value="<?php echo e(old('sanctions_value_forth_abcence',$data['sanctions_value_forth_abcence'])); ?>" oninput="this.value=this.value.replace(/[^0-9.]/g,'');" >
                  <?php $__errorArgs = ['sanctions_value_forth_abcence'];
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
            <div class="col-md-12 text-center">
               <div class="form-group">
                  <button type="submit" class="btn btn-success ">تحديث</button>
               </div>
            </div>
         </div>
      </form>
      <?php else: ?>
      <p class="bg-danger text-center"> عفوا لاتوجد بيانات لعرضها</p>
      <?php endif; ?>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Timgad informatique\Desktop\atef soft\Laravel10_HRMS-86_last_branch_public\resources\views/admin/Admin_panel_setting/edit.blade.php ENDPATH**/ ?>