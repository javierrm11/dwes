<?php
    $enlace = "<a href='f2.php?del = upload/1222.png'>DEL</a>"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" src="" alt="" name="file">

        <input type="submit" value="Enviar" name="submit">
    </form>
    <h2>Listado de imagenes</h2>
    
</body>
</html>