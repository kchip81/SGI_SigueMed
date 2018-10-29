

<body>
    <h2>SOMATOMETRIA</h2>

    <?php $this->load->helper('url'); ?>
    <?php
        if (isset($errorMessage)) {
            echo "<div class='message'>";
            echo $errorMessage;
            echo "</div>";
        }
    ?>
    <?php echo validation_errors(); ?>
    
    <h3>CITA SERVICIO: <?php echo $Cita->DescripcionServicio;?> DIA: <?php echo $Cita->DiaCita;?> HORA: <?php echo $Cita->HoraCita;?></h3>
    <h3>PACIENTE: <?php echo $Paciente->Nombre.' '.$Paciente->Apellidos; ?></h3>

   <?php echo form_open('NotaMedica_Controller/RegistrarSomatometria/'.$Cita->IdCitaServicio); ?>

    <!--Div Somatometria-->
    <div>
        <label for="Peso">Peso</label>
        <input type="text" name="Peso" id="Peso"/>Kg.

        <label for="Talla">Talla</label>
        <input type="text" name="Talla" id="Talla"/>mts.
        
        <label for="TA">T/A</label>
        <input type="text" name="TA" id="TA"/>Mm/Hg.
        
        <label for="Temperatura">T</label>
        <input type="text" name="Temperatura" id="Temperatura"/>°C.
        
        <label for="FC">F/C</label>
        <input type="text" name="FC" id="FC"/>L/m.
        
        <label for="FR">F/R</label>
        <input type="text" name="FR" id="FR"/>R/m.
        
        <input type="submit" name="submit" value="Registrar Datos"/>        
    </div>
    </form>
</body>

