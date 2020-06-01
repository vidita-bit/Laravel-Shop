<?php $__env->startSection('content'); ?>
<div class="container">

    <div class="row">

        <div class="col-md-12" id="register">

            <div class="card col-md-8">
                <div class="card-body">

                    <h2 class="card-title">Login</h2>
                    <hr>
                    <?php if($errors->any()): ?>
                        <div class="alert alert-warning">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <?php if(session()->has('msg')): ?>
                        <div class="alert alert-warning">
                            <li><?php echo e(session()->get('msg')); ?></li>
                        </div>
                    <?php endif; ?>
                    

                    <form action="<?php echo e(url('/user/login')); ?>" method="post">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" name="email" placeholder="Email" id="email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" placeholder="Password" id="password"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-outline-info col-md-2"> Login</button>
                        </div>
                        
                    <div class="form-group">
                        <a href="<?php echo e(url('/password/reset')); ?>">Forgot Password</a>
                    </div>

                    </form>

                </div>
            </div>


        </div>

    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Shop-master\resources\views/front/sessions/index.blade.php ENDPATH**/ ?>