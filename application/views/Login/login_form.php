<!doctype html>
<html class="no-js" lang="">

<head>  
  <!--Validación de Sesión -->
  <?php
    $this->load->helper('url');
    $this->load->library('session');
    echo 'Hola';
    if ($this->session->has_userdata('logged_in')==TRUE) {
        
        $this->session->unset_userdata('logged_in');
    }
    
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
                <?php echo form_open('Usuario_Login/LoginUsuario_Proceso'); ?>
                <?php
                    echo "<div class='error_msg'>";
                    if (isset($error_message)) {
                    echo $error_message;
                    }
                    echo validation_errors();
                    echo "</div>";
                ?>
                
                    <section class="login-block">
                        <div class="container">
                            <div class="row">
                                    <div class="col-md-4 login-sec">
                                        <h2 class="text-center">Login Now</h2>
                                        <form class="login-form">
                                            <div class="form-group">
                                                
                                                <label for="usuario" class="text-uppercase">Usuario:</label>
                                                <input type="text" name="username" id="usuario" class="form-control" placeholder="username">

                                            </div>
                                            <div class="form-group">

                                              <label for="password" class="text-uppercase">Contraseña:</label>
                                              <input type="password" name="password" id="password" class="form-control" placeholder="*********">
                                              
                                            </div>

                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input">
                                                    <small>Recordarme</small>
                                                </label>
                                                <input type="submit" value=" Login " name="submit"/><br />
                                            </div>

                                        </form>
                   
                                    </div>
                                    <div class="col-md-8 banner-sec">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                     <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                      </ol>
                                <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                          <img class="d-block img-fluid" src="https://static.pexels.com/photos/33972/pexels-photo.jpg" alt="First slide">
                          <div class="carousel-caption d-none d-md-block">
                            <div class="banner-text">
                                <p>This is Heaven</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                            </div>	
                      </div>
                        </div>
                        <div class="carousel-item">
                          <img class="d-block img-fluid" src="https://images.pexels.com/photos/7097/people-coffee-tea-meeting.jpg" alt="First slide">
                          <div class="carousel-caption d-none d-md-block">
                            <div class="banner-text">
                                <h2>This is Heaven</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                            </div>	
                        </div>
                        </div>
                        <div class="carousel-item">
                          <img class="d-block img-fluid" src="https://images.pexels.com/photos/872957/pexels-photo-872957.jpeg" alt="First slide">
                          <div class="carousel-caption d-none d-md-block">
                            <div class="banner-text">
                                <h2>This is Heaven</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                            </div>	
                        </div>
                      </div>
                                </div>	   

                                    </div>
                            </div>
                    </div>
                    </section>
                <?php echo form_close(); ?>
            </div>
        </div>
        
    </body>



