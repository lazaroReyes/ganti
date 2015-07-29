<?php
if(isset($actualizarProveedor)){
    $ID = '<p><input type="hidden" name="ID" value="'.$this->uri->segment(3).'"></p>';
    $RFC = $actualizarProveedor->RFC;
    $Nombre = $actualizarProveedor->Nombre;
    $action = 'actualizar';
    $button = 'Actualizar';
}else{
    $ID = '';
    $RFC = '';
    $Nombre='';
    $action = 'insertar';
    $button = 'Guardar';
}
?>
    <div id="wrapper">
        <?php include('partials/admin_menu_view.php') ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Proveedores</h1>
                    <div class="divider"></div>
                    <?php if($this->session->userdata('perfil')=='Administrador' || $this->session->userdata('perfil') == 'Compras'){?>
                            <?php echo form_open("proveedores/$action", 'method="post" class="margin-bottom"'); ?>
                            <?php echo $ID; ?>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="RFC">RFC:</label>
                                    <input type="text" class="form-control" id="RFC" name="RFC" value="<?php echo $RFC?>"/>
                                </div>
                                <div class="col-sm-6">
                                    <label for="Nombre">Nombre:</label>
                                    <input type="text" class="form-control" id="Nombre" name="Nombre" value="<?php echo $Nombre?>"/>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <input type="submit" class="btn red-submit" name="guardar" value="<?php echo $button?>" />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <?php
                            $actualizar = $this->session->flashdata('actualizado');
                            if ($actualizar) { ?>
                                <span id="actualizadoCorrectamente"><?= $actualizar ?></span>
                                <?php } ?>
                        <?php echo form_close(); ?>
                    <?php } ?>
                    <div class="divider"></div>
                    <div class="col-lg-12 table-responsive">
                        <?php if(count($proveedoresGuardadas)>0):?>
                        <table class="table table-striped table-condensed">
                            <thead>
                            <th>Proveedor</th>
                            <th>RFC</th>
                            <th>Nombre</th>
                            <?php if($this->session->userdata('perfil')=='Administrador'){?>
                            <th class="text-center">Editar</th>
                            <th class="text-center">Eliminar</th>
                            <?php } ?>
                            </thead>
                            <tbody>
                            <?php foreach($proveedoresGuardadas as $proveedor) : ?>
                                <tr>
                                    <td><?php echo $proveedor->ID; ?></td>
                                    <td><?php echo $proveedor->RFC; ?></td>
                                    <td><?php echo $proveedor->Nombre; ?></td>
                                <?php if($this->session->userdata('perfil')=='Administrador'){?>
                                    <td class="text-center"><a href="<?php echo base_url(); ?>proveedores/index/<?php echo $proveedor->ID; ?>"><i class="fa fa-pencil-square-o"></i></a></td>
                                    <td class="text-center"><a href="<?php echo base_url(); ?>proveedores/eliminar/<?php echo $proveedor->ID; ?>"><i class="fa fa-times"></i></a></td>
                                <?php } ?>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php else :?>
                            <h2>no hay proveedores registrados</h2>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>