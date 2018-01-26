 
<?php $__env->startSection('title',"Danh sách sản phẩm"); ?> 
<?php $__env->startSection('content'); ?>
<section class="wrapper">
    <div class="panel panel-body">
        <section class="content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Danh sách sản phẩm thuộc loại 
                        <span style="color:blue"><?php echo e($type->name); ?></span>
                    </b>
                </div>
                <div class="panel-body">
                    <?php if(Session::has('message')): ?>
                    <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
                    <?php endif; ?>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Mô tả ngắn</th>
                                <th>Đơn giá</th>
                                <th>Đơn giá km</th>
                                <th>Hình</th>
                                <th>Tuỳ chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 1;?>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr id="sanpham-<?php echo e($t->id); ?>">
                                <td><?php echo e($stt++); ?></td>
                                <td class="name-<?php echo e($t->id); ?>"><?php echo e($t->name); ?></td>
                                <td><?=$t->summary?></td>
                                <td><?=number_format($t->price)?></td>
                                <td><?=number_format($t->promotion_price)?></td>
                                <td>
                                    <img src="admin/img/hinh_mon_an/<?php echo e($t->image); ?>" style="height:80px">
                                </td>
                                <td>
                                    <a style=" padding-bottom:10px" href="<?php echo e(route('editFood',$t->id)); ?>"><button class="btn btn-warning btn-sm" style="width:100%;">Edit</button></a>
                                    <br><br>
                                    <button class="btn btn-primary btn-sm btn-call-modal" data-id="<?php echo e($t->id); ?>">Delete</button>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo e($products->links()); ?>

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
        <button type="button" class="btn btn-success btnAccept">OK</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<div id="Message" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <p class="your-mess"></p>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
      </div>
    </div>
  </div>
</div>
<script>
    $(document).ready(function(){
        var id =''
        $('.btn-call-modal').click(function(){
            $('#myModal').modal('show')
            id = $(this).attr('data-id')
            var name = $('.name-'+id).text();
            $('.nameObj').html("<b>"+name+"</b>");
        })
        $('.btnAccept').click(function(){
            if(id!=''){
                $.ajax({
                    url:"<?php echo e(route('deleteFood')); ?>",
                    data:{
                        id:id
                    },
                    type:"GET",
                    success:function(data){
                        var mess = "";
                        $('#myModal').modal('hide')
                        if($.trim(data)=='success'){
                            mess = "Xoá thành công";
                            $('#sanpham-'+id).hide()
                        }
                        else mess = "Thất bại, vui lòng thử lại"
                        $('.your-mess').html(mess)
                        $('#Message').modal('show')  
                    } ,
                    error:function(){
                        console.log(1212)
                    } 
                }).done(function(){
                    console.log('done!')
                })
            }
        })
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>