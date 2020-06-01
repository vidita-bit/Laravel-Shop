<?php $__env->startSection('content'); ?>

<!-- Page Content -->
<div class="container">

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
        <h5 class="display-3"><strong>Welcome,</strong></h5>
        <p class="display-4"><strong>SALE UPTO 50%</strong></p>
        <p class="display-4">&nbsp;</p>
        <a href="#" class="btn btn-warning btn-lg float-right">SHOP NOW!</a>
    </header>

    
    


<!-- /.container -->

<?php if(session()->has('msg')): ?>
<div class="alert alert-success">
<?php echo e(session()->get('msg')); ?>

</div>
<?php endif; ?>

<!-- Page Features -->
<div class="row text-center">

<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


<div class="col-lg-3 col-md-6 mb-4">
    <div class="card">
        <img class="card-img-top image-thumnail" src="<?php echo e(url('/uploads').'/'.$product->image); ?>" alt="<?php echo e($product->image); ?>">
        <div class="card-body">
            <h5 class="card-title"><?php echo e($product->name); ?></h5>
            <p class="card-text"><?php echo e($product->description); ?></p>
        </div>
        <div class="card-footer">
            <strong>Rs. <?php echo e($product->price); ?></strong> &nbsp;
            <form action="<?php echo e(route('cart')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                <input type="hidden" name="name" value="<?php echo e($product->name); ?>">
                <input type="hidden" name="price" value="<?php echo e($product->price); ?>">
            <button  type="submit" class="btn btn-primary btn-outline-dark"><i class="fa fa-cart-plus "></i> Add To
                Cart</button>
            </form>
        </div>
    </div>
</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>
<!-- /.row -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Shop-master\resources\views/front/index.blade.php ENDPATH**/ ?>