<?php
if (isset($actualizarMina)) {
    $ID = '<p><input type="hidden" name="ID" value="' . $this->uri->segment(3) . '"></p>';
    $Nombre = $actualizarMina->Nombre;
    $Descripcion = $actualizarMina->Descripcion;
    $action = 'actualizar';
    $button = 'Actualizar';
} else {
    $ID = '';
    $Nombre = '';
    $Descripcion = '';
    $action = 'insertar';
    $button = 'Guardar';
}
?>
<div id="wrapper">
    <?php include('partials/admin_menu_view.php') ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Departamentos</h1>
                <?php if ($this->session->userdata('perfil') == 'Administrador') { ?>
                    <form action="<?php echo base_url(); ?>minas/<?php echo $action; ?>" method="post"
                          class="margin-bottom">
                        <?php echo $ID; ?>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label for="Nombre">Nombre:</label>
                                <input type="text" class="form-control" id="Nombre" name="Nombre"
                                       value="<?php echo $Nombre ?>"/>
                            </div>
                            <div class="col-sm-6">
                                <label for="Descripcion">Descripcion:</label>
                                <input type="text" class="form-control" id="Descripcion" name="Descripcion"
                                       value="<?php echo $Descripcion ?>"/>
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
                <?php } ?>
                <div class="divider"></div>
                <div class="col-lg-12 table-responsive">
                    <?php if (count($minasGuardadas) > 0): ?>
                        <table class="table table-striped table-condensed">
                            <thead>
                            <th>Departamentos</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <?php if ($this->session->userdata('perfil') == 'Administrador') { ?>
                            <th class="text-center">Editar</th>
                            <th class="text-center">Eliminar</th>
                            <?php } ?>
                            </thead>
                            <tbody>
                            <?php foreach ($minasGuardadas as $mina) : ?>
                            <tr>
                                <td><?php echo $mina->ID; ?></td>
                                <td><?php echo $mina->Nombre; ?></td>
                                <td><?php echo $mina->Descripcion; ?></td>
                                <?php if ($this->session->userdata('perfil') == 'Administrador') { ?>
                                    <td class="text-center"><a href="<?php echo base_url(); ?>minas/index/<?php echo $mina->ID; ?>"><i
                                                class="fa fa-pencil-square-o"></i></a></td>
                                    <td class="text-center"><a href="<?php echo base_url(); ?>minas/eliminar/<?php echo $mina->ID; ?>"><i
                                                class="fa fa-times"></i></a></td>
                                <?php } ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <h2>no hay departamentos registradas</h2>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>