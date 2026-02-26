<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arac projesi</title>
    <style>
    form {
        font-family: Arial, sans-serif;
        width: 400px;
        margin: 30px auto;
    }

    label {
        display: inline-block;
        width: 140px;
        text-align: right;
        margin-right: 10px;
        vertical-align: top;
    }

    input[type="text"] {
        width: 220px;
        padding: 5px;
        margin-bottom: 8px;
    }

    textarea {
        width: 370px;
        padding: 5px;
    }

    input[type="submit"] {
        margin-left: 150px; /* işte bu satırla hizalanır */
        padding: 6px 12px;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>


</head>
<body>
    
<form action="<?php echo e(route('araclar.store')); ?>" method="POST">
    <?php echo csrf_field(); ?> 
    <label for="">Ad Soyad:</label>
    <input type="text" name="adSoyad" placeholder="Ad Soyad"><br>

    <label for="">Araç Markası:</label>
    <input type="text" name="marka" placeholder="Araç Markası"><br>

    <label for="">Araç Modeli:</label>
    <input type="text" name="model" placeholder="Araç Modeli"> <br>

    <label for="">Araç üretim Yılı:</label>
    <input type="text" name="yil" placeholder="Araç üretim yılı"> <br>

   
    
    <input type="submit" value="gonder" name="ilet">
</form>
</body>
</html><?php /**PATH C:\xampp\htdocs\Staj-Projesi\resources\views/aracProjesi_view.blade.php ENDPATH**/ ?>