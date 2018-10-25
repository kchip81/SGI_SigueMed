<!doctype html>
<html class="no-js" lang="">

<head>  
  <!--Validación de Sesión -->
  <?php
       if ($this->session->has_userdata('usuario')==TRUE) 
        {

            $this->session->unset_userdata('logged_in');
        }
        /*
        else
        {
            redirect
         */
    
    ?>
  
  <!------ Bootstrap ---------->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
  
  <!-- Encabezado  -->
  <title>Clinica SigueMed</title>
</head>

    <body>
        <?php
            if (isset($logout_message)) {
                echo "<div class='message'>";
                echo $logout_message;
                echo "</div>";
            }
        ?>
        <?php
            if (isset($message_display)) {
                echo "<div class='message'>";
                echo $message_display;
                echo "</div>";
            }
        ?>
        <div id="main">
            <div id="login" style='width:auto;'>
                <h2>Sistema de Gestión Integral - SigueMed</h2>
                <hr/>
                <?php echo form_open('Usuario_Login/LoginUsuario'); ?>
                <?php
                    echo "<div class='error_msg'>";
                    if (isset($error_message)) {
                    echo $error_message;
                    }
                    echo validation_errors();
                    echo "</div>";
                ?>
                
                <form class="login-form">

                        <label for="usuario" class="text-uppercase">Usuario:</label>
                        <input type="text" name="username" id="usuario" class="form-control" placeholder="username">


                      <label for="password" class="text-uppercase">Contraseña:</label>
                      <input type="password" name="password" id="password" class="form-control" placeholder="*********">


                        <input type="submit" value=" Login " name="submit"/><br />


                </form>
                
                   
                <?php echo form_close(); ?>
            </div>
        </div>
        
    </body>



