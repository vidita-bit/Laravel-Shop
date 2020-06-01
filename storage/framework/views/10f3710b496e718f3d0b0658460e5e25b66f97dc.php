<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo e(url('assets/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="<?php echo e(url('assets/css/heroic-features.css')); ?>" rel="stylesheet">

    
    <?php echo $__env->yieldContent('style'); ?>

</head>

<body>
<?php echo $__env->make('front.layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php echo $__env->yieldContent('content'); ?>


<!-- Bootstrap core JavaScript -->
<script src="<?php echo e(url('assets/vendor/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

<?php echo $__env->yieldContent('script'); ?>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\Shop-master\resources\views/front/layouts/master.blade.php ENDPATH**/ ?>