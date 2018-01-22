 <?php $__env->startSection('title',"Danh sách loại"); ?> <?php $__env->startSection('content'); ?>
<section class="wrapper">
    <div class="panel panel-body">
        <section class="content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Danh sách loại</b>
                </div>
                <div class="panel-body">
                    <?php if(Session::has('message')): ?>
                    <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
                    <?php endif; ?>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên loại</th>
                                <th>Mô tả</th>
                                <th>Hình</th>
                                <th>Tuỳ chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 1;?>
                            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($stt++); ?></td>
                                <td class="name-<?php echo e($t->id); ?>"><?php echo e($t->name); ?></td>
                                <td><?=$t->description?></td>
                                <td>
                                    <img src="admin/img/hinh_loai_mon_an/<?php echo e($t->image); ?>" style="height:80px">
                                </td>
                                <td>
                                    <a style=" padding-bottom:10px" href="<?php echo e(route('editType',$t->id)); ?>"><button class="btn btn-warning btn-sm" style="width:100%;">Edit</button></a>
                                    <br><br>
                                    <button class="btn btn-primary btn-sm btn-call-modal" data-id="<?php echo e($t->id); ?>">Delete</button>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo e($types->links()); ?>

                </div>
            </div>
        </section>
    </div>
</section>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <p>Bạn có chắc chắn xoá <span class="nameObj">...</span> không?</p>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-success">OK</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<script>
    $(document).ready(function(){
        $('.btn-call-modal').click(function(){
            $('#myModal').modal('show')
            var id = $(this).attr('data-id')
            var name = $('.name-'+id).text();
            $('.nameObj').html("<b>"+name+"</b>");
            
        })
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>