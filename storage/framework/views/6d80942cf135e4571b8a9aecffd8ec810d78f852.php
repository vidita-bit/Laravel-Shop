
<?php $__env->startSection('content'); ?>
<h2>Enter Your Email Address!</h2>
<div class="container">
<form method="POST" action= "<?php echo e(url('admin/resend')); ?>" >
<?php echo csrf_field(); ?>

                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php if(session()->has('msg')): ?>
                    <div class="alert alert-danger"><?php echo e(session()->get('msg')); ?></div>
                    <?php endif; ?>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Email" class="form-control border-input">
    </div>
    <div class="form-group">
        <button class="btn btn-primary" type="submit">Send Email</button>
    </div>
</form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Shop-master\resources\views/admin/users/resend.blade.php ENDPATH**/ ?>