<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="panel panel-default">
        <div class="panel-heading"><h2 class="text-center">Inicio de sesión</h2></div>
        <div class="panel-body">
          <?php
          if(!empty($success_msg)){
            echo '<p class="statusMsg">'.$success_msg.'</p>';
          }elseif(!empty($error_msg)){
            echo '<p class="statusMsg">'.$error_msg.'</p>';
          }
          ?>
          <form action="" method="post">
            <div class="form-group has-feedback">
              <input type="email" class="form-control" name="email" placeholder="Correo electronico" required="" value="">
              <?php echo form_error('email','<span class="help-block">','</span>'); ?>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="password" placeholder="Contraseña" required="">
              <?php echo form_error('password','<span class="help-block">','</span>'); ?>
            </div>
            <div class="form-group">
              <input type="submit" name="loginSubmit" class="btn btn-block btn-primary" value="Iniciar sesión"/>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
