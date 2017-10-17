<div class="container">
    <?php if(!empty($success_msg)){ ?>
    <div class="col-xs-12">
        <div class="alert alert-success"><?php echo $success_msg; ?></div>
    </div>
    <?php }elseif(!empty($error_msg)){ ?>
    <div class="col-xs-12">
        <div class="alert alert-danger"><?php echo $error_msg; ?></div>
    </div>
    <?php } ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default ">
                <div class="panel-heading">Posts <a href="<?php echo site_url('posts/add/'); ?>" class="btn btn-xs btn-primary pull-right" >Agregar</a></div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="5%">ID</th>
                            <th width="30%">Titulo</th>
                            <th width="50%">Contenido</th>
                            <th width="15%">Opciones</th>
                        </tr>
                    </thead>
                    <tbody id="userData">
                        <?php if(!empty($posts)): foreach($posts as $post): ?>
                        <tr>
                            <td><?php echo '#'.$post['id']; ?></td>
                            <td><?php echo $post['title']; ?></td>
                            <td><?php echo (strlen($post['content'])>150)?substr($post['content'],0,150).'...':$post['content']; ?></td>
                            <td>
                                <a href="<?php echo site_url('posts/view/'.$post['id']); ?>" class="btn btn-xs btn-success">Ver</a>
                                <a href="<?php echo site_url('posts/edit/'.$post['id']); ?>" class="btn btn-xs btn-primary">Editar</a>
                                <a href="<?php echo site_url('posts/delete/'.$post['id']); ?>" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to delete?')">Eliminar</a>
                            </td>
                        </tr>
                        <?php endforeach; else: ?>
                        <tr><td colspan="4">Registro(s) no encontrados...</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
