<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a class="active" href="./">
                    <i class="fa fa-dashboard"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('addType')); ?>" >
                    <i class="fa fa-map-marker"></i>
                    <span>Thêm loại sản phẩm</span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('list_type')); ?>" >
                    <i class="fa fa-map-marker"></i>
                    <span>Danh sách loại</span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('addFood')); ?>" >
                    <i class="fa fa-map-marker"></i>
                    <span>Thêm sản phẩm</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class=" fa fa-envelope"></i>
                    <span>Danh sách SP theo loại</span>
                </a>
                <ul class="sub">
                    <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a  href="<?php echo e(route('list_product',$t->id)); ?>"><?php echo e($t->name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>