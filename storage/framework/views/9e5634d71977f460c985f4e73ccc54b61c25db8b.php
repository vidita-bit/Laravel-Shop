<?php $__env->startSection('content'); ?>
<div class="container">
        <?php if(session()->has('msg')): ?>
            <div class="alert alert-success">
                <?php echo e(session()->get('msg')); ?>

            </div>
        <?php endif; ?>
<h2>Profile</h2>
<hr>
<h3>User Details</h3>

<table class="table table-bordered">
    <thead>
        <tr>
            <th colspan="2">User Details <a href="" class="pull-right"><i class="fa fa-cogs"></i>Edit User</a></th>
        </tr>
    </thead>
    <tr>
        <th>ID</th>
        <td><?php echo e($user->id); ?></td>
    </tr>
    <tr>
        <th>Name</th>
        <td><?php echo e($user->name); ?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?php echo e($user->email); ?></td>
    </tr>
    <tr>
        <th>Registerd at</th>
        <td><?php echo e($user->created_at); ?></td>
    </tr>
</table>


<div class="card">
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th colspan="7">Orders</th>
                                    </tr>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $user->order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td><?php echo e($order->id); ?></td>
                                        <td>
                                            <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <table class="table">
                                                    <tr>
                                                        <td><?php echo e($item->name); ?></td>
                                                    </tr>
                                                </table>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>

                                        <td>
                                            <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <table class="table">
                                                    <tr>
                                                        <td><?php echo e($item->quantity); ?></td>
                                                    </tr>
                                                </table>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>

                                        <td>
                                            <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <table class="table">
                                                    <tr>
                                                        <td>$<?php echo e($item->price); ?></td>
                                                    </tr>
                                                </table>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td>
                                            <?php if($order->status): ?>
                                            <span class="label label-success">Confirmed</span>
                                            <?php else: ?>
                                            <span class="label label-warning">Pending</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(url('/user/order').'/'.$order->id); ?>" class="btn btn-outline-dark btn-sm">Details</a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                        <?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Shop-master\resources\views/front/profile/index.blade.php ENDPATH**/ ?>