
<body>
    
    <?php $this->load->helper('url'); ?>
    <?php
        if (isset($errorMessage)) {
            echo "<div class='message'>";
            echo $errorMessage;
            echo "</div>";
        }
    ?>
    <?php echo validation_errors(); ?>
    
    <?php echo form_open('NotaMedica_Controller/ElaborarNotaMedica/'.$NotaMedica->IdNotaMedica); ?>
    
     <div>
        <label for="Nombre">Nombre</label>
        <input type="text" name="Nombre" id="Nombre" value="<?php echo $Paciente->Nombre; ?>"/>

        <label for="Apellidos">Apellidos</label>
        <input type="text" name="Apellidos" id="Apellidos" value="<?php echo $Paciente->Apellidos; ?>"/><br/>
        
        <label for="Edad">Edad</label>
        <input type="text" name="Edad" id ="Edad" value="<?php 
         
            $edad = (time()-strtotime($Paciente->FechaNacimiento))/ (60*60*24*365.35); 
            echo floor($edad) ?>"/>
        
        <label for="FechaNacimiento">Fecha Nacimiento</label>
        <input type="text" name="FechaNacimiento" id="FechaNacimiento" value="<?php echo $Paciente->FechaNacimiento; ?>"/><br/>
        
        <label for="calle">Calle</label>
        <input type="text" name="Calle" value="<?php echo $Paciente->Calle; ?>"/>
        
        <label for="colonia">Colonia</label>
        <input type="text" name="Colonia" value="<?php echo $Paciente->Colonia; ?>"/>
        
        <label for="cp">Código Postal</label>
        <input type="text" name="CP" value="<?php echo $Paciente->CP; ?>"/><br/>
        
        <label for="EstadoCivil">Estado Civil:</label>
        <input type="text" name="EstadoCivil" value="<?php echo $Paciente->EstadoCivil; ?>"/>
        
        <label for="ViveCon">Vive con:</label>
        <input type="text" name="ViveCon" value="<?php echo $Paciente->ViveCon; ?>"/>
        
        <label for="Escolaridad">Escolaridad</label>
        <input type="text" name="Escolaridad" value="<?php echo $Paciente->Escolaridad; ?>"/><br/>
        
        <label for="IdServiciosMedicos">Recursos Medicos</label>
        <input type="text" name="IdServiciosMedicos" value=""/>
        
        <label for="Celular">Celular:</label>
        <input type="text" name="Celular" value="<?php echo $Paciente->NumCelular; ?>"/>
        
    </div>
    
    <!--Div Somatometria-->
    <div>
        
    </div>
    
    <!--Div Antecedentes -->
    
    <div>
         <?php
    
    if ($Antecedentes!=FALSE)
    {
        foreach ($Antecedentes as $AntecedenteNota)
        {
            echo "<label for='Antecendete".$AntecedenteNota['IdAntecedente']."'>".$AntecedenteNota['DescripcionAntecedente']."</label></br>";
            echo "<input type='text' name='Antecedente".$AntecedenteNota['IdAntecedente']." id='Antecedente".$AntecedenteNota['IdAntecedente']."' value='".$AntecedenteNota['DescripcionAntecedenteNotaMedica']."'/></br>";

            // put your code here
        }
    }
    else
    {
        echo "No carga antecedentes";
        echo $NotaMedica->IdNotaMedica;
        echo count($Antecedentes);
    }
    
    ?>
    </div>
    
    <!--Div Botones-->
    <div>
        <button type="submit" name="action" value="guardar">Guardar</button>
        <button type="submit" name="action" value="cancelar">Cancelar</button>
    </div>
   
    
    </form>
</body>

