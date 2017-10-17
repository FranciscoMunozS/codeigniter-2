<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-default">
        <div class="panel-heading"><h2>Registro de usuario</h2></div>
        <div class="panel-body">
          <form action="" method="post">
            <div class="form-group">
              <input type="text" class="form-control" name="name" placeholder="Nombre" required="" value="<?php echo !empty($user['name'])?$user['name']:''; ?>">
              <?php echo form_error('name','<span class="help-block">','</span>'); ?>
            </div>
            <div class="form-group">
              <input type="email" class="form-control" name="email" placeholder="Correo electronico" required="" value="<?php echo !empty($user['email'])?$user['email']:''; ?>">
              <?php echo form_error('email','<span class="help-block">','</span>'); ?>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="phone" placeholder="Numero de telefono" value="<?php echo !empty($user['phone'])?$user['phone']:''; ?>">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="password" placeholder="Contraseña" required="">
              <?php echo form_error('password','<span class="help-block">','</span>'); ?>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="conf_password" placeholder="Confirmar contraseña" required="">
              <?php echo form_error('conf_password','<span class="help-block">','</span>'); ?>
            </div>
            <div class="form-group">
              <?php
                if(!empty($user['gender']) && $user['gender'] == 'Female'){
                    $fcheck = 'checked="checked"';
                    $mcheck = '';
                }else{
                    $mcheck = 'checked="checked"';
                    $fcheck = '';
                }
              ?>
              <div class="radio">
                <label>
                <input type="radio" name="gender" value="male" <?php echo $mcheck; ?>>
                Masculino
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="gender" value="femal" <?php echo $fcheck; ?>>
                  Femenino
                </label>
              </div>
            </div>
            <div class="form-group">
              <input type="submit" name="regisSubmit" class="btn btn-primary" value="Ingresar datos"/>
            </div>
          </form>
        </div>
        <div class="panel-footer">
          <p class="footInfo">Ya tiene una cuenta? <a href="<?php echo base_url(); ?>users/login">Iniciar sesión</a></p>
        </div>
      </div>
    </div>
  </div>
</div>
