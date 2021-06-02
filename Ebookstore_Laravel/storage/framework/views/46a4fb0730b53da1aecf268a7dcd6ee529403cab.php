<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        .slider-cap {
            font-size:30px;
        }

        .shop-now {
            width: 180px;
            height: 50px;
            border: 3px solid #fff;    
            background-color: rgba(255,255,255,0);
            color: #fff;
            font-size:15px;
        }

        .shop-now:hover {
            background-color: #3490dc;
            border: 3px solid #3490dc;    
        }

        #menu-list > li > a:hover {
            background-color: #3490dc;
            color: #fff;
        }

    </style>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body id='app'>
    <div class='container-fluid p-0'>
        <?php echo $__env->yieldContent('nav'); ?>
        <?php echo $__env->yieldContent('slider'); ?>
        <?php echo $__env->yieldContent('content'); ?>
        <?php echo $__env->make('layouts.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/app.js')); ?>"></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
    <!-- <script type="text/javascript">
        alert(1);
    </script> -->
</body>
</html><?php /**PATH C:\xampp\htdocs\new_ebookstore\resources\views/layouts/app.blade.php ENDPATH**/ ?>