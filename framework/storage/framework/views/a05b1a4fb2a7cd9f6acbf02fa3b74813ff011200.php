 <?php $__env->startSection('title',"Danh sách loại"); ?> <?php $__env->startSection('content'); ?>
<section class="wrapper">
    <div class="panel panel-body">
        <section class="content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Danh sách loại</b>
                </div>
                <div class="panel-body">
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
                                <td><?php echo e($t->name); ?></td>
                                <td><?php echo e($t->description); ?></td>
                                <td>
                                    <img src="admin/img/hinh_loai_mon_an/<?php echo e($t->image); ?>" style="height:80px">
                                </td>
                                <td>
                                    Edit | Delete
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>