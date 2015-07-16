<?php
if (isset($actualizarMaquina)) {
    $ID = '<p><input type="hidden" name="ID" value="' . $this->uri->segment(3) . '"></p>';
    $Descripcion = $actualizarMaquina->Descripcion;
    $action = 'actualizar';
    $button = 'Actualizar';
} else {
    $ID = '';
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
                <h1 class="page-header">Maquinas</h1>

                <div class="divider"></div>
                <?php if ($this->session->userdata('perfil') == 'Administrador') { ?>
                    <form action="<?php echo base_url(); ?>maquinas/<?php echo $action; ?>" method="post" class="margin-bottom">
                        <?php echo $ID; ?>
                        <div class="form-group">
                            <label for="Descripcion">Descripcion:</label>
                            <input type="text" class="form-control" id="Descripcion" name="Descripcion"
                                   value="<?php echo $Descripcion ?>"/>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn red-submit" name="guardar" value="<?php echo $button ?>"/>
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
                    <?php if (count($maquinasGuardadas) > 0): ?>
                        <table class="table table-striped table-condensed">
                            <thead>
                            <th>Maquina</th>
                            <th>Descripción</th>
                            <?php if ($this->session->userdata('perfil') == 'Administrador') { ?>
                            <th class="text-center">Editar</th>
                            <th class="text-center">Eliminar</th>
                            <?php } ?>
                            </thead>
                            <tbody>
                            <?php foreach ($maquinasGuardadas as $maquina) : ?>
                                <tr>
                                    <td><?php echo $maquina->ID; ?></td>
                                    <td><?php echo $maquina->Descripcion; ?></td>
                                    <?php if ($this->session->userdata('perfil') == 'Administrador') { ?>
                                        <td class="text-center">
                                            <a href="<?php echo base_url(); ?>maquinas/index/<?php echo $maquina->ID; ?>"><i
                                                    class="fa fa-pencil-square-o"></i></a></td>
                                        <td class="text-center">
                                            <a href="<?php echo base_url(); ?>maquinas/eliminar/<?php echo $maquina->ID; ?>"><i
                                                    class="fa fa-times"></i></a></td>
                                    <?php } ?>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <h2>no hay maquinas registradas</h2>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>