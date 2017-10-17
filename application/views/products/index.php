<div class="container">
  <?php if(!empty($success_msg)){ ?>
  <div class="col-xs-12">
    <div class="alert aler-success"><?php echo $success_msg; ?></div>
  </div>
  <?php }elseif(!empty($error_msg)) { ?>
    <div class="col-xs-12">
      <div class="alert alert-danger"><?php echo $error_msg; ?></div>
    </div>
  <?php } ?>
  <div class="row">
    <div class="col-xs-12">
      <div class="panel panel-default">
        <div class="panel-heading">Productos <a href="<?php echo site_url('products/add/'); ?>" class="btn btn-xs btn-primary pull-right">Agregar</a></div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th width="10%">ID</th>
              <th width="15%">Marca</th>
              <th width="20%">Modelo</th>
              <th width="15%">Numero de serie</th>
              <th width="25%">Descripción</th>
              <th width="15%">Acciones</th>
            </tr>
          </thead>
          <tbody id="userData">
            <?php if (!empty($products)): foreach($products as $product): ?>
            <tr>
              <td><?php echo '#'.$product['id']; ?></td>
              <td><?php echo $product['brand']; ?></td>
              <td><?php echo $product['model']; ?></td>
              <td><?php echo $product['serial']; ?></td>
              <td><?php echo (strlen($product['description'])>150)?substr($product['description'],0,150).'...':$product['description']; ?></td>
              <td>
                  <a href="<?php echo site_url('products/view/'.$product['id']); ?>" class="btn btn-xs btn-success">Ver</a>
                  <a href="<?php echo site_url('products/edit/'.$product['id']); ?>" class="btn btn-xs btn-primary">Editar</a>
                  <a href="<?php echo site_url('products/delete/'.$product['id']); ?>" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to delete?')">Eliminar</a>
              </td>
            </tr>
            <?php endforeach; else: ?>
            <tr><td colspan="5">Registro(s) no encontrados...</td></tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
