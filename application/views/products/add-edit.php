<div class="container">
  <div class="col-xs-12">
    <?php
      if(!empty($success_msg)){
        echo '<div class="alert alert-success">'.$success_msg.'</div>';
      }elseif(!empty($error_msg)){
        echo '<div class="alert alert-danger">'.$error_msg.'</div>';
      }
    ?>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="panel panel-default">
        <div class="panel-heading"><?php echo $action; ?>Productos <a href="<?php echo site_url('products/'); ?>" class="pull-right">Volver</a></div>
        <div class="panel-body">
          <form class="form" action="" method="post">
            <div class="form-group">
              <label for="brand">Marca</label>
              <input type="text" class="form-control" placeholder="Marca" name="brand" value="<?php echo !empty($product['brand'])?$product['brand']:''; ?>">
              <?php echo form_error('brand', '<p class="help-block text-danger">','</p>'); ?>
            </div>
            <div class="form-group">
              <label for="model">Modelo</label>
              <input type="text" placeholder="Modelo" name="model" class="form-control" value="<?php echo !empty($product['model'])?$product['model']:'';  ?>">
              <?php echo form_error('model', '<p class="help-block text-danger">','</p>'); ?>
            </div>
            <div class="form-group">
              <label for="serial">Numero de serie</label>
              <input type="text" placeholder="Numero de serie" name="serial" class="form-control" value="<?php echo !empty($product['serial'])?$product['serial']:'';  ?>">
              <?php echo form_error('serial', '<p class="help-block text-danger">','</p>'); ?>
            </div>
            <div class="form-group">
              <label for="description">Descripción</label>
              <textarea name="description" placeholder="Descripción del producto" class="form-control"><?php echo !empty($product['description'])?$product['description']:''; ?></textarea>
              <?php echo form_error('description','<p class="text-danger">','</p>'); ?>
            </div>
            <input type="submit" name="productSubmit" value="Ingresar" class="btn btn-primary">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
