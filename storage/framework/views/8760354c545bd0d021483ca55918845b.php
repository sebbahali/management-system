<?php if(@isset($data) and !@empty($data) and count($data)>0 ): ?>
<table id="example2" class="table table-bordered table-hover">
   <thead class="custom_thead">
      <th>   نوع الشفت</th>
      <th>  يبدأ من الساعة</th>
      <th>   ينتهي الساعة</th>
      <th>   عدد الساعات</th>
      <th>   حالة التفعيل</th>
      <th>  الاضافة بواسطة</th>
      <th>  التحديث بواسطة</th>
      <th></th>
   </thead>
   <tbody>
      <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
         <td><?php if($info->type==1): ?> صباحي <?php else: ?> مسائي  <?php endif; ?></td>
         <td> 
            <?php
            $time=date("h:i",strtotime($info->from_time));
            $newDateTime=date("A",strtotime($info->from_time));
            $newDateTimeType= (($newDateTime=='AM')?'صباحا ':'مساء'); 
            ?>
            <?php echo e($time); ?>

            <?php echo e($newDateTimeType); ?>   
         </td>
         <td>
            <?php
            $time=date("h:i",strtotime($info->to_time));
            $newDateTime=date("A",strtotime($info->to_time));
            $newDateTimeType= (($newDateTime=='AM')?'صباحا ':'مساء'); 
            ?>
            <?php echo e($time); ?>

            <?php echo e($newDateTimeType); ?>   
         </td>
         <td> <?php echo e($info->total_hour*1); ?> </td>
         <td <?php if($info->active==1): ?> class="bg-success" <?php else: ?> class="bg-danger"  <?php endif; ?>      > <?php if($info->active==1): ?> مفعل <?php else: ?> معطل <?php endif; ?></td>
         <td>
            <?php
            $dt=new DateTime($info->created_at);
            $date=$dt->format("Y-m-d");
            $time=$dt->format("h:i");
            $newDateTime=date("A",strtotime($info->created_at));
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
            $newDateTime=date("A",strtotime($info->updated_at));
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
            <a  href="<?php echo e(route('ShiftsTypes.edit',$info->id)); ?>" class="btn btn-success btn-sm">تعديل</a>
            <a  href="<?php echo e(route('ShiftsTypes.destroy',$info->id)); ?>" class="btn are_you_shur  btn-danger btn-sm">حذف</a>
         </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   </tbody>
</table>
<br>
<div class="col-md-12 text-center" id="ajax_pagination_in_search">
<?php echo e($data->links('pagination::bootstrap-5')); ?>

</div>
<?php else: ?>
<p class="bg-danger text-center"> عفوا لاتوجد بيانات لعرضها</p>
<?php endif; ?>
<?php /**PATH C:\Users\Timgad informatique\Desktop\atef soft\Laravel10_HRMS-86_last_branch_public\resources\views/admin/ShiftsTypes/ajax_search.blade.php ENDPATH**/ ?>