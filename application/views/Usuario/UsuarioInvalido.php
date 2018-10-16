<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <div>Usuario Incorrecto</div>
        <?php
        echo "el usuario -", $Usuario_Id, "- no está registrado en nuestra base de datos. Favor de verificar"
                
        ?>
        <p><a href="<?php echo site_url('Usuario/Login'); ?>">Regresar</a></p>
    </body>
</html>
