<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Studio | Starter Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="assets/css/vendor.min.css" rel="stylesheet" />
    <link href="assets/css/app.min.css" rel="stylesheet" />

</head>
<body>

<div id="app" class="app">
    <?php echo $__env->make('includes._header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('includes._navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div id="content" class="app-content">
       <?php echo $__env->yieldContent('content'); ?>
    </div>

    <?php echo $__env->make('includes._footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<script src="assets/js/vendor.min.js" type="text/javascript"></script>
<script src="assets/js/app.min.js" type="text/javascript"></script>

</body>
</html>
<?php /**PATH /Users/jobayer/Herd/Abc/php-mvc/resources/views/layouts/app.blade.php ENDPATH**/ ?>