 
<?php $__env->startSection('title',$type->name); ?> 
<?php $__env->startSection('content'); ?>
<section class="wrapper">
    <div class="panel panel-body">
        <section class="content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Sửa thông tin loại <span style="color:blue"><?php echo e($type->name); ?></span></b>
                </div>
                <div class="panel-body">
                    <?php if(Session::has('message')): ?>
                    <div class="alert alert-danger"><?php echo e(Session::get('message')); ?></div>
                    <?php endif; ?>
                    <form action="<?php echo e(route('editType',$type->id)); ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <label class="col-sm-2">Tên:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" placeholder="Nhập tên loại" required value="<?php echo e($type->name); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Mô tả:</label>
                            <div class="col-sm-10">
                                <textarea name="description" class="form-control" id="desc" required><?=$type->description?></textarea>
                                <script>
                                    CKEDITOR.replace('desc')
                                </script>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <input type="file" name="image">
                                <img src="admin/img/hinh_loai_mon_an/<?php echo e($type->image); ?>" style="height:100px">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>