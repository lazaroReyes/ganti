<?php
if (isset($actualizarUsuario)) {
    $ID = '<p><input type="hidden" name="ID" value="' . $this->uri->segment(3) . '"></p>';
    $perfil = $actualizarUsuario->perfil;
    $username = $actualizarUsuario->username;
    $password = $actualizarUsuario->password;
    $action = 'actualizar';
    $button = 'Actualizar';
} else {
    $ID = '';
    $perfil = '';
    $username = '';
    $password = '';
    $action = 'insertar';
    $button = 'Guardar';
}
?>
<div id="wrapper">
    <?php include('partials/admin_menu_view.php') ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Usuarios</h1>
                <?php if ($this->session->userdata('perfil') == 'Administrador') { ?>
                    <form action="<?php echo base_url(); ?>usuarios/<?php echo $action; ?>" method="post"
                          class="margin-bottom">
                        <?php echo $ID; ?>
                        <div class="form-group"
                            <div class="col-sm-4">
                                <label for="username">Correo:</label>
                                <input type="text" class="form-control" id="username" name="username"
                                       value="<?php echo $username ?>"/>
                            </div>
                        <div class="col-sm-4">
                            <label for="perfil">Perfil:</label>
                            <select class="form-control" id="perfil" name="perfil">
                                <?php switch ($perfil) {
                                    case 'Administrador': ?>
                                        <option value="Administrador">Administrador</option>
                                        <option value="Compras">Compras</option>
                                        <option value="Usuario">Usuario</option>
                                        <?php break;
                                    case 'Compras': ?>
                                        <option value="Compras">Compras</option>
                                        <option value="Usuario">Usuario</option>
                                        <option value="Administrador">Administrador</option>
                                        <?php break;
                                    case 'Usuario': ?>
                                        <option value="Usuario">Usuario</option>
                                        <option value="Administrador">Administrador</option>
                                        <option value="Compras">Compras</option>
                                        <?php break;
                                    default: ?>
                                        <option value="Administrador">Administrador</option>
                                        <option value="Compras">Compras</option>
                                        <option value="Usuario">Usuario</option>
                                        <?php
                                } ?>
                            </select>
                        </div>
                            <div class="col-sm-4">
                                <label for="password">password:</label>
                                <input type="password" class="form-control" id="password" name="password"
                                       value="<?php echo $password ?>"/>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3">
                                <input type="submit" class="btn red-submit" name="guardar"
                                       value="<?php echo $button ?>"/>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <?php
                        $actualizar = $this->session->flashdata('actualizado');
                        if ($actualizar) { ?>
                            <span id="actualizadoCorrectamente"><?= $actualizar ?></span>
                        <?php } ?>
                    </form>
                <div class="divider"></div>
                <div class="col-lg-12 table-responsive">
                    <?php if (count($usuariosGuardadas) > 0): ?>
                        <table class="table table-striped table-condensed">
                            <thead>
                            <th>Usuario</th>
                            <th>Correo</th>
                            <th>perfil</th>
                            <th class="text-center">Editar</th>
                            <th class="text-center">Eliminar</th>
                            </thead>
                            <tbody>
                            <?php foreach ($usuariosGuardadas as $usuario) : ?>
                            <tr>
                                <td><?php echo $usuario->ID; ?></td>
                                <td><?php echo $usuario->username; ?></td>
                                <td><?php echo $usuario->perfil; ?></td>
                                <td class="text-center"><a href="<?php echo base_url(); ?>usuarios/index/<?php echo $usuario->ID; ?>"><i
                                                class="fa fa-pencil-square-o"></i></a></td>
                                <td class="text-center"><a href="<?php echo base_url(); ?>usuarios/eliminar/<?php echo $usuario->ID; ?>"><i
                                                class="fa fa-times"></i></a></td>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <h2>no hay usuarios registradas</h2>
                    <?php endif; ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>