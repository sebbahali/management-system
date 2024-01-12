<?php $__env->startSection('title'); ?>
السنوات المالية
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentheader'); ?>
قائمة الضبط
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentheaderactivelink'); ?>
<a href="<?php echo e(route('finance_calender.index')); ?>">  السنوات المالية</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentheaderactive'); ?>
عرض
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="col-12">
   <div class="card">
      <div class="card-header">
         <h3 class="card-title card_title_center">  بيانات السنوات المالية 
            <a href="<?php echo e(route('finance_calender.create')); ?>" class="btn btn-sm btn-warning">اضافة جديد</a>
         </h3>
      </div>
      <div class="card-body">

         <?php if(@isset($data) and !@empty($data) ): ?>
         <table id="example2" class="table table-bordered table-hover">
            <thead class="custom_thead">
               <th> كود السنة</th>
               <th> وصف السنة</th>
               <th>  تاريخ البداية</th>
               <th>  تاريخ النهاية</th>
               <th>  الاضافة بواسطة</th>
               <th>  التحديث بواسطة</th>
               <th></th>
            </thead>
            <tbody>
               <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <tr>
                  <td> <?php echo e($info->FINANCE_YR); ?> </td>
                  <td> <?php echo e($info->FINANCE_YR_DESC); ?> </td>
                  <td> <?php echo e($info->start_date); ?> </td>
                  <td> <?php echo e($info->end_date); ?> </td>
                  <td><?php echo e($info->added->name); ?> </td>
                  <td>
                     <?php if($info->updated_by>0): ?>
                  <?php echo e($info->updatedby->name); ?> 
                  <?php else: ?>
                  لايوجد
                  <?php endif; ?>
                  </td>
                  <td>
                     <?php if($info->is_open==0): ?>
                      <?php if($CheckDataOpenCounter==0): ?>
                     <a  href="<?php echo e(route('finance_calender.do_open',$info->id)); ?>" class="btn btn-primary btn-sm">فتح</a>
                    <?php endif; ?>
                     <a  href="<?php echo e(route('finance_calender.edit',$info->id)); ?>" class="btn btn-success btn-sm">تعديل</a>
                     <a  href="<?php echo e(route('finance_calender.delete',$info->id)); ?>" class="btn are_you_shur  btn-danger btn-sm">حذف</a>
                     <button class="btn btn-sm btn-info show_year_monthes" data-id="<?php echo e($info->id); ?>"  >عرض الشهور</button>
                     <?php else: ?>
                     سنة مالية مفتوحه
                     <?php endif; ?>
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

<div class="modal fade " id="show_year_monthesModal" >
   <div class="modal-dialog modal-xl">
     <div class="modal-content bg-info">
       <div class="modal-header">
         <h4 class="modal-title">عرض الشهور  للسنة المالية</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span></button>
       </div>
       <div class="modal-body" id="show_year_monthesModalBody">
  
       </div>
       <div class="modal-footer justify-content-between">
         <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
         <button type="button" class="btn btn-outline-light">Save changes</button>
       </div>
     </div>
     <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
 </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
   $(document).ready(function(){
      $(document).on('click','.show_year_monthes',function(){
    var id=$(this).data('id');
    jQuery.ajax({
   url:'<?php echo e(route('finance_calender.show_year_monthes')); ?>',
   type:'post',
   'dataType':'html',
   cache:false,
   data:{ "_token":'<?php echo e(csrf_token()); ?>','id':id },
   success:function(data){
   $("#show_year_monthesModalBody").html(data);
   $("#show_year_monthesModal").modal("show");
   },
   error:function(){
   
   }
   
    });
   
   
      });
   });
   
   
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Timgad informatique\Desktop\atef soft\Laravel10_HRMS-86_last_branch_public\resources\views/admin/Finance_calender/index.blade.php ENDPATH**/ ?>