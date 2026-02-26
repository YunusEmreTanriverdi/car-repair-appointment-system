<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM İSLEMLERİNİ OGREN</title>
</head>
<body>
    
<form action="<?php echo e(route('sonuc')); ?>" method="post">
    <?php echo csrf_field(); ?> 
    <textarea name="metin" id="" style="width:300px; height:200px;"></textarea>
    <input type="submit" value="gonder" name="ilet">
</form>
</body>
</html><?php /**PATH C:\xampp\htdocs\Staj-Projesi\resources\views/form.blade.php ENDPATH**/ ?>