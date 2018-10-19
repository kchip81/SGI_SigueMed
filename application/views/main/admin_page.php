<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php
    $this->load->helper('url');
    if (isset($this->session->userdata['logged_in'])) 
    {
        $username = ($this->session->userdata['logged_in']['username']);
        $perfil = ($this->session->userdata['logged_in']['IdPerfil']);
    } 
    else 
        {
            redirect("Usuario_Login/login");
        }
    ?>
    <head>
        <title>Admin Page</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div id="profile">
        <?php
        echo "Hello <b id='welcome'><i>" . $username . "</i> !</b>";
        echo "<br/>";
        echo "<br/>";
        echo "Welcome to Admin Page";
        echo "<br/>";
        echo "<br/>";
        echo "Your Username is " . $username;
        echo "<br/>";
        echo "Your perfil is " . $perfil;
        echo "<br/>";
       
        ?>
        <b id="logout"><a href="logout">Logout</a></b>
        </div>
        <br/>
    </body>
</html>