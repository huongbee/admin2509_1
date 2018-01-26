 <?php $__env->startSection('title',"Thêm món ăn mới"); ?> <?php $__env->startSection('content'); ?>
<section class="wrapper">
    <div class="panel panel-body">
        <section class="content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Thêm món ăn mới</b>
                </div>
                <div class="panel-body">
                    <?php if(Session::has('message')): ?>
                    <div class="alert alert-danger"><?php echo e(Session::get('message')); ?></div>
                    <?php endif; ?>
                    <form action="<?php echo e(route('addFood')); ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <label class="col-sm-2">Tên:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" placeholder="Nhập tên món ăn" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Chọn loại:</label>
                            <div class="col-sm-10">
                                <select name="type" class="form-control">
                                    <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($t->id); ?>"><?php echo e($t->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Mô tả ngắn:</label>
                            <div class="col-sm-10">
                                <textarea rows="5" class="form-control" name="summary" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Mô tả:</label>
                            <div class="col-sm-10">
                                <textarea name="detail" class="form-control" id="desc" required></textarea>
                                <script>
                                    CKEDITOR.replace('desc')
                                </script>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Đơn giá:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="price" placeholder="Nhập giá món ăn" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Đơn giá khuyến mãi:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="promotion_price" placeholder="Nhập giá khuyến mãi" value="0" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Khuyến mãi kèm theo:</label>
                            <div class="col-sm-10">
                                <select name="promotion" class="form-control">
                                    <option value="khăn lạnh">Khăn lạnh</option>
                                    <option value="nước ngọt">Nước ngọt</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Đơn vị tính:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="unit" placeholder="Nhập đơn vị tính" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Trong ngày:</label>
                            <div class="col-sm-10">
                                <input type="checkbox" name="today" value='1' required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <input type="file" name="image" required>
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