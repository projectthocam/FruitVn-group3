<div class="category-tab">
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indexCategory => $categoryItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="<?php echo e($indexCategory == 0 ?'active' : ''); ?>">
                <a href="#category_tab_<?php echo e($categoryItem->id); ?>" data-toggle="tab"><?php echo e($categoryItem->name); ?></a>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>



    <div class="tab-content">

        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indexCategoryProduct => $categoryItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="tab-pane fade <?php echo e($indexCategoryProduct == 0 ? 'active in' : ''); ?> " id="category_tab_<?php echo e($categoryItem->id); ?>" >
            <?php $__currentLoopData = $categoryItem->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <a href="<?php echo e(route('productDetail',['id' => $item->id]));?>">
                            <img src="<?php echo e($item->feature_image_path); ?>" alt="" />
                            </a>
                            <h2><?php echo e(number_format($item->Unit_price)); ?> VNĐ</h2>
                            <p><?php echo e($item->name); ?></p>

                        </div>

                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




    </div>
</div><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/DoAn/resources/views/fontend/components/category_tab.blade.php ENDPATH**/ ?>
