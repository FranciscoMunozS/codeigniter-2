<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url("/products"); ?>">CodeIgniter</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <?php if(!$this->session->userdata('isUserLoggedIn')) : ?>
                <li><a href="<?php echo base_url(); ?>users/login">Iniciar sesión</a></li>
                <li><a href="<?php echo base_url(); ?>users/registration">Registrarse</a></li>
              <?php endif; ?>
              <?php if($this->session->userdata('isUserLoggedIn')) : ?>
                <li><a href="<?php echo base_url(); ?>products/add">Ingresar producto</a></li>
                <li><a href="<?php echo base_url(); ?>users/account"><?php echo !empty($user['email'])?$user['email']: ''; ?></a></li>
                <li><a href="<?php echo base_url(); ?>users/logout">Cerrar sesión</a></li>
              <?php endif; ?>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </div>
    </nav>
