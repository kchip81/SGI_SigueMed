<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

        <?php echo "Tablero Principal"?>
        
        <h2><?php echo $title; ?></h2>

        <?php foreach ($funciones as $funciones_item): ?>

        <h3><?php echo $funciones_item['IdFuncion']; ?></h3>
       
        <p><a href="<?php echo site_url('/'.$funciones_item['IdFuncion']); ?>"><?php echo $funciones_item['IdFuncion'];?></a></p>

<?php endforeach; ?>
    