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
عرض
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="col-12">
   <div class="card">
      <div class="card-header">
         <h3 class="card-title card_title_center">  بيانات  أنواع شفتات الموظفين 
            <a href="<?php echo e(route('ShiftsTypes.create')); ?>" class="btn btn-sm btn-warning">اضافة جديد</a>
         </h3>
      </div>
      <div class="row" style="padding: 5px;">
         <div class="col-md-3">
            <div class="form-group">
               <label> نوع الشفت </label>
               <select name="type_search" id="type_search" class="form-control">
                  <option value="all"> بحث بالكل</option>
                  <option  value="1">صباحي</option>
                  <option  value="2">مسائي</option>
               </select>
            </div>
         </div>
         <div class="col-md-3">
            <div class="form-group">
               <label>     من عدد ساعات</label>
               <input type="text" name="hour_from_range" id="hour_from_range" class="form-control" value="" oninput="this.value=this.value.replace(/[^0-9.]/g,'');" >
            </div>
         </div>
         <div class="col-md-3">
            <div class="form-group">
               <label>     الي عدد ساعات</label>
               <input type="text" name="hour_to_range" id="hour_to_range" class="form-control" value="" oninput="this.value=this.value.replace(/[^0-9.]/g,'');" >
            </div>
         </div>
      </div>
      <div class="card-body" id="ajax_responce_serachDiv">
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
<?php $__env->startSection('script'); ?>
<script>
   $(document).ready(function(){
   
      $(document).on('change','#type_search',function(e){
         ajax_search();
      });
      $(document).on('input','#hour_from_range',function(e){
         ajax_search();
      });
   
      $(document).on('input','#hour_to_range',function(e){
         ajax_search();
      });
   function ajax_search(){
   var type_search=$("#type_search").val();
   var hour_from_range=$("#hour_from_range").val();
   var hour_to_range=$("#hour_to_range").val();
   jQuery.ajax({
   url:'<?php echo e(route('ShiftsTypes.ajax_search')); ?>',
   type:'post',
   'dataType':'html',
   cache:false,
   data:{"_token":'<?php echo e(csrf_token()); ?>',type_search:type_search,hour_from_range:hour_from_range,hour_to_range:hour_to_range},
   success: function(data){
   $("#ajax_responce_serachDiv").html(data);
   },
   error:function(){
   alert("عفوا لقد حدث خطأ ");
   }
   
   });
}
   $(document).on('click','#ajax_pagination_in_search a',function(e){
   e.preventDefault();
   var type_search=$("#type_search").val();
   var hour_from_range=$("#hour_from_range").val();
   var hour_to_range=$("#hour_to_range").val();
   var linkurl=$(this).attr("href");
   jQuery.ajax({
   url:linkurl,
   type:'post',
   'dataType':'html',
   cache:false,
   data:{"_token":'<?php echo e(csrf_token()); ?>',type_search:type_search,hour_from_range:hour_from_range,hour_to_range:hour_to_range},
   success: function(data){
   $("#ajax_responce_serachDiv").html(data);
   },
   error:function(){
   alert("عفوا لقد حدث خطأ ");
   }
   
   });
   
   });
   
   
   
   
   
   });
   
   
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Timgad informatique\Desktop\atef soft\Laravel10_HRMS-86_last_branch_public\resources\views/admin/ShiftsTypes/index.blade.php ENDPATH**/ ?>