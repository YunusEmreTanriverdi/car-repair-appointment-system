<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM İSLEMLERİNİ OGREN</title>
</head>
<body>
    
<form action="{{ route('sonuc') }}" method="post">
    @csrf 
    <textarea name="metin" id="" style="width:300px; height:200px;"></textarea>
    <input type="submit" value="gonder" name="ilet">
</form>
</body>
</html>