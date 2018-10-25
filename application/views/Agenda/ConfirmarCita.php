<body>
    <h2><?php $this->load->helper('url'); ?></h2>
    <?php
        if (isset($errorMessage)) {
            echo "<div class='message'>";
            echo $errorMessage;
            echo "</div>";
        }
    ?>
    <?php echo validation_errors(); ?>
    <h2>Cita:<?php echo $Cita->IdCitaServicio;?></h2>
    
  <?php echo form_open('Agenda_Controler/ConfirmarCita/'.$Cita->IdCitaServicio); ?>

    <!--Div Paciente-->
    <div>
        <label for="nombre">Nombre</label>
        <input type="text" name="Nombre" value="<?php echo $Paciente->Nombre; ?>"/>

        <label for="apellidos">Apellidos</label>
        <input type="text" name="Apellidos" value="<?php echo $Paciente->Apellidos; ?>"/><br/>
    </div>
    <!--Div Somatometria-->
    <div>
        <label for="peso">Peso</label>
        <input type="text" name="Peso"/>Kg.

        <label for="talla">Talla</label>
        <input type="text" name="Talla"/>mts.<br/>
        
    </div>  

    <button type="submit" name="action" value="confirmar">Confirmar</button>
    <button type="submit" name="action" value="cancelar">Cancelar</button>
   </form>
</body>