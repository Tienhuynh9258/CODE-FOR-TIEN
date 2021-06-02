<?php $__env->startPush('styles'); ?>
<style>

</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('title', 'eBookStore'); ?>
<?php $__env->startSection('nav'); ?>
    <?php echo $__env->make('layouts.partials.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('slider'); ?>
    <?php echo $__env->make('layouts.partials.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <h3 style='border-bottom:2px solid #636b6f' id='books-header'>All books</h3>
        <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($key%2==0): ?>
                <div class="row mt-5">
                    <div class="col-sm-6">
                        <div class="card shadow">
                            <div class="card-body">
                                <img class="card-img-top" src="<?php echo e($book->IMAGE); ?>" alt="Harry Potter" height='700' width='400'>
                                <h5 class="card-title mt-3"><strong><?php echo e($book->TITLE); ?></strong></h5>
                                <p class="card-text">Publisher: <?php echo e($book->PUBLISHER_NAME); ?></p>
                                <p class="card-text">Description: test</p>
                                <p class="card-text">Price: <strong><?php echo e($book->PRICE); ?></strong> VND</p>
                                <a href="#" class="btn btn-danger"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                            </div>
                        </div>
                    </div>
            <?php else: ?>
                    <div class="col-sm-6">
                        <div class="card shadow">
                            <div class="card-body">
                                <img class="card-img-top" src="<?php echo e($book->IMAGE); ?>" alt="Harry Potter" height='700' width='400'>
                                <h5 class="card-title mt-3"><strong><?php echo e($book->TITLE); ?></strong></h5>
                                <p class="card-text">Publisher: <?php echo e($book->PUBLISHER_NAME); ?></p>
                                <p class="card-text">Description: test</p>
                                <p class="card-text">Price: <strong><?php echo e($book->PRICE); ?></strong> VND</p>
                                <a href="#" class="btn btn-danger"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class='float-right mt-5'>
            <?php echo e($books->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
$(document).ready(function() {

});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new_ebookstore\resources\views/index.blade.php ENDPATH**/ ?>