<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title>Nota Medica</title>
		<link rel="stylesheet" href="css/formulario.css">
    </head>
    <body>
        <?php
        form_open('NotaMedica_Controller')
        ?>
        
        <Table>
            <tr>
                <td>Nombre Paciente:</td><td><input type="text" name="nombre" type="text" value=<?php echo $paciente->Nombre;?>/></td>
                <td>Sexo:</td><td>
                    <?php $opciones = array('F'=>'Femenino','M'=>'Masculino');
                    echo form_dropdown('sexo',$opciones);?></td>
            </tr>
            <tr>
                <td>Edad:</td><td>
                    //<?php ?>
                </td>
            </tr>
        </Table>
        <div class="contenedor_1">
	
	<!– Linea 2 —>
		<div style="width:  50px; height: 25px; border: 1px solid;" class="box_1"><b>Edad:</b></div>
		<div style="width:  50px; height: 15px; border: 1px solid;" class="box_1"><input style="width: 40px; height: 11px;" type="text"/></div>
		<div style="width:  50px; height: 25px; border: 1px solid;" class="box_1"><b>Años</b></div>
		<div style="width: 150px; height: 25px; border: 1px solid;" class="box_1"><b>Fecha de Nacimiento:</b></div>
		<div style="width: 100px; height: 15px; border: 1px solid;" class="box_1"><input style="width: 94px; height: 11px;" type="text"/></div>
		<div style="width: 100px; height: 25px; border: 1px solid;" class="box_1"><b>Originario de:</b></div>
		<div style="width: 119px; height: 25px; border: 1px solid;" class="box_1"><input style="width: 110px; height: 11px;" type="text"/></div>
		<br>
	<!– Linea 3 —>	
		<div style="width: 100px; height: 25px; border: 1px solid;" class="box_1"><b>Domicilio:</b></div>
		<div style="width: 300px; height: 25px; border: 1px solid;" class="box_1"><input style="width: 290px; height: 11px;" type="text"/></div>
		<div style="width: 100px; height: 25px; border: 1px solid;" class="box_1"><b>Estado Civil:</b></div>
		<div style="width: 125px; height: 25px; border: 1px solid;" class="box_1"><input style="width: 115px; height: 11px;" type="text"/></div>
		<br>
	<!– Linea 4 —>	
		<div style="width: 100px; height: 25px; border: 1px solid;" class="box_1"><b>Vive con:</b></div>
		<div style="width: 529px; height: 25px; border: 1px solid;" class="box_1"><input style="width: 520px; height: 11px;" type="text"/></div>
		
		<br>
	<!– Linea 5 —>	
		<div style="width:  90px; height: 25px; border: 1px solid;" class="box_1"><b>Escolaridad:</b></div>
		<div style="width: 125px; height: 25px; border: 1px solid;" class="box_1"><input style="width: 115px; height: 11px;" type="text"/></div>
		<div style="width:  70px; height: 25px; border: 1px solid;" class="box_1"><b>Religión:</b></div>
		<div style="width: 125px; height: 25px; border: 1px solid;" class="box_1"><input style="width: 119px; height: 11px;" type="text"/></div>
		<div style="width:  80px; height: 25px; border: 1px solid;" class="box_1"><b>Ocupación:</b></div>
		<div style="width: 131px; height: 25px; border: 1px solid;" class="box_1"><input style="width: 122px; height: 11px;" type="text"/></div>
		<br>
	<!– Linea 6 —>	
		<div style="width: 150px; height: 25px; border: 1px solid;" class="box_1"><b>Recursos Medicos:</b></div>
		<div style="width: 250px; height: 25px; border: 1px solid;" class="box_1"><input style="width: 240px; height: 11px;" type="text"/></div>
		<div style="width:  80px; height: 25px; border: 1px solid;" class="box_1"><b>Celular:</b></div>
		<div style="width: 145px; height: 25px; border: 1px solid;" class="box_1"><input style="width: 135px; height: 11px;" type="text"/></div>
        </div>
    </body>
</html>
