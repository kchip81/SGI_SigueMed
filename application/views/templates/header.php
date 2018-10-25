
<!doctype html>
<html class="no-js" lang="">

<head>
    <!--Boilerplate -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
  
  <!--Validación de Sesión -->
  <?php
    $this->load->helper('url');
    $this->load->library('session');
  
    if ($this->session->has_userdata('logged_in')==FALSE) {
        
        echo $this->session->userdata('logged_in');
        redirect("Usuario_Login/LoginUsuario_Proceso");
    }
    else
    {
        echo $this->session->has_userdata('logged_in');
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

