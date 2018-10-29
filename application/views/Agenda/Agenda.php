<body>
    
    <?php
        if (isset($errorMessage)) {
            echo "<div class='message'>";
            echo $errorMessage;
            echo "</div>";
        }
    ?>
    
    <table>
        <tr>
            <th>Hora</th>
            <th>Paciente</th>
            <th>Servicio</th>
            <th>Nota Medica</th>
            <th>Estatus</th>
        </tr>
        <?php
        
            if ($this->session->has_userdata('logged_in'))
            {
                $SessionData = $this->session->userdata('logged_in');
                echo '<h1>Si hay datos </h1>';
                echo '<h2>'.$this->session->userdata('IdPerfil').'</h2>';
            }
            else
            {
                echo '<h1>Datos Borrados</h1>';
            }
            

            foreach($Citas as $Cita_item)
            {
                echo "<tr>";
                echo "<td>".date('H:i',strtotime($Cita_item['HoraCita']))."</td>";
                echo "<td>".$Cita_item['Nombre'].' '.$Cita_item['Apellidos']."</td>";
                echo "<td>".$Cita_item['DescripcionServicio']."</td>";
                echo "<td>".$Cita_item['IdNotaMedica']."</td>";
                echo "<td>"; 
                    if ($Cita_item['IdStatusCita'] == AGENDADA)
                    {
                        echo  "<a href=".site_url('Agenda/ConfirmarCita/'.$Cita_item['IdCitaServicio']).">".$Cita_item['DescripcionEstatusCita']."</a>";

                    }
                    else
                    {
                        if($Cita_item['IdStatusCita']== CONFIRMADA)
                        {
                            echo "<a href=".site_url('NotaMedica/Registrar/'.$Cita_item['IdCitaServicio']).">".$Cita_item['DescripcionEstatusCita']."</a>";
                        }
                        else
                        {

                        echo $Cita_item['DescripcionEstatusCita'];
                        }
                    }
                echo "</td>";
                 
                if($Cita_item['IdStatusCita']== REGISTRADA)
                {
                    
                    //$this->load->model('Servicio_Model');
                    if ($this->session->userdata('IdPerfil')== MEDICO) //Administrador
                    {
                        echo "<td>";
                        echo "<a href=".site_url('NotaMedica/ElaborarNota/'.$Cita_item['IdCitaServicio']).">Crear Nota</a>";
                        echo "</td>";
                    }
                   
                }
               
                echo "</tr>";
            }
        ?>
        
    </table>
</body>