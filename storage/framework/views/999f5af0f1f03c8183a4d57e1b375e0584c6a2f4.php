<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">CreatorShop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(url('/cart')); ?>"><i class="fa fa-shopping-cart"></i> Cart 
                    <?php if(Cart::Instance('default')->count()>0): ?>
                    <strong><?php echo e(Cart::Instance('default')->count()); ?></strong>
                    <?php endif; ?>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i> <?php echo e(auth()->check()?auth()->user()->name:'Account'); ?>

                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
                        <?php if(! auth()->check()): ?>
                        <a class="dropdown-item " href="<?php echo e(url('user/login')); ?>">Sign In</a>
                        <a class="dropdown-item" href="<?php echo e(url('users/register')); ?>">Sign Up</a>
                        
                        <?php else: ?>
                        <a class="dropdown-item" href="<?php echo e(url('user/profile')); ?>"><i class="fa fa-user"></i> Profile</a>
                        <hr>
                        <a class="dropdown-item" href="<?php echo e(url('user/logout')); ?>">Sign Out</a>
                        <?php endif; ?>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav><?php /**PATH C:\xampp\htdocs\Shop-master\resources\views/front/layouts/nav.blade.php ENDPATH**/ ?>