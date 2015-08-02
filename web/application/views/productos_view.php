<?php
if(isset($actualizarProducto)){
    $ID = '<p><input type="hidden" name="ID" value="'.$this->uri->segment(3).'"></p>';
    $Clave = $actualizarProducto->Clave;
    $Descripcion = $actualizarProducto->Descripcion;
    $Stock = $actualizarProducto->Stock;
    $action = 'actualizar';
    $button = 'Actualizar';
}else{
    $ID = '';
    $Clave = '';
    $Descripcion='';
    $Stock = '';
    $action = 'insertar';
    $button = 'Guardar';
}
?>
    <div id="wrapper">
        <?php include('partials/admin_menu_view.php') ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Productos</h1>
                    <div class="divider"></div>
                    <?php if($this->session->userdata('perfil')=='Administrador' || $this->session->userdata('perfil') == 'Compras'){?>
                        <?php echo form_open("productos/$action", 'method="post" class="margin-bottom"'); ?>
                            <?php echo $ID; ?>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="Clave">Clave:</label>
                                    <input type="text"  class="form-control" id="Clave" name="Clave" value="<?php echo $Clave?>"/>
                                </div>
                                <div class="col-sm-6">
                                    <label for="Descripcion">Descripcion:</label>
                                    <input type="text" class="form-control" id="Descripcion" name="Descripcion" value="<?php echo $Descripcion?>"/>
                                </div>
                                    <?php if($ID!=''){?>
                                    <div class="col-sm-6">
                                    <label for="Stock">Stock:</label>
                                    <input type="hidden" class="form-control" id="Stock" name="Stock" value="<?php echo $Stock?>"/><?php echo $Stock ?>
                                </div>
                                <?php } ?>
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
                            if ($actualizar) {
                                ?><span id="actualizadoCorrectamente"><?= $actualizar ?></span>
                                <?php
                            }
                            ?>
                        <?php echo form_close(); ?>
                    <?php } ?>
                    <div class="divider"></div>
                    <div class="col-lg-12 table-responsive">
                        <?php if(count($productosGuardadas)>0):?>
                            <?php if(isset($links)): ?>
                                <div class="pull-right"><?php echo $links; ?></div>
                            <?php  endif;?>
                        <table class="table table-striped table-condensed">
                            <thead>
                            <th>Producto</th>
                            <th>Clave</th>
                            <th>Descripción</th>
                            <th>Stock</th>
                            <?php if($this->session->userdata('perfil')=='Administrador' || $this->session->userdata('perfil') == 'Compras'){?>
                            <th class="text-center">Editar</th>
                            <?php if ($this->session->userdata('perfil') == 'Administrador'){?>
                            <th class="text-center">Eliminar</th>
                            <?php } } ?>
                            </thead>
                            <tbody>
                            <?php foreach($productosGuardadas as $producto) : ?>
                                <tr>
                                    <td><?php echo $producto->ID; ?></td>
                                    <td><?php echo $producto->Clave; ?></td>
                                    <td><?php echo $producto->Descripcion; ?></td>
                                    <td><?php echo $producto->Stock; ?></td>
                                    <?php if($this->session->userdata('perfil')=='Administrador' || $this->session->userdata('perfil') == 'Compras'){?>
                                        <td class="text-center"><a href="<?php echo base_url(); ?>productos/index/<?php echo $producto->ID; ?>"><i class="fa fa-pencil-square-o"></i></a></td>
                                    <?php if ($this->session->userdata('perfil') == 'Administrador'){?>
                                        <td class="text-center"><a href="<?php echo base_url(); ?>productos/eliminar/<?php echo $producto->ID; ?>"><i class="fa fa-times"></i></a></td>
                                    <?php } } ?>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php else :?>
                            <h2>no hay productos registrados</h2>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>