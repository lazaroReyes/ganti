<?php
if(isset($actualizarUso)){
    $ID = '<p><input type="hidden" name="ID" value="'.$this->uri->segment(3).'"></p>';
    $IDMina = $actualizarUso->IDMina;
    $IDProducto = $actualizarUso->IDProducto;
    $Cantidad = $actualizarUso->Cantidad;
    $IDUsuario = $actualizarUso->IDUsuario;
    $RecibidoPor = $actualizarUso->RecibidoPor;
    $Fecha = $actualizarUso->Fecha;
    $action = 'actualizar';
    $button = 'Actualizar';
}else{
    $ID = '';
    $IDMina = '';
    $IDProducto = '';
    $Cantidad = '';
    $IDUsuario = '';
    $RecibidoPor = '';
    $Fecha = '';
    $action = 'insertar';
    $button = 'Guardar';
}
?>
    <div id="wrapper">
        <?php include('partials/admin_menu_view.php'); ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Usos del Inventario</h1>
                    <div class="divider"></div>
                    <?php if($this->session->userdata('perfil')=='Administrador' || $this->session->userdata('perfil')=='Compras'){?>
                        <?php echo form_open("usos/$action", 'method="post" class="margin-bottom"'); ?>
                            <?php echo $ID; ?>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="IDMina">Seleccionar Mina</label>
                                    <select  class="form-control" id="IDMina" name="IDMina">
                                        <?php foreach($minasGuardadas as $mina) :
                                            if($mina->ID==$IDMina){?>
                                                <option selected value="<?php echo $mina->ID?>"><?php echo $mina->Nombre?></option>
                                            <?php }else {?>
                                                <option value="<?php echo $mina->ID?>"><?php echo $mina->Nombre?></option>
                                            <?php } endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label for="IDProducto">Seleccione Producto</label>
                                    <select class="form-control" id="IDProducto" name="IDProducto">
                                        <?php foreach($productosGuardados as $producto) :
                                            if($producto->ID==$IDProducto){?>
                                                <option selected value="<?php echo $producto->ID?>"><?php echo $producto->Descripcion?></option>
                                            <?php }else {?>
                                                <option value="<?php echo $producto->ID?>"><?php echo $producto->Descripcion?></option>
                                            <?php } endforeach; ?>
                                    </select>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="Cantidad">Cantidad:</label>
                                    <input type="text" class="form-control" id="Cantidad" name="Cantidad" value="<?php echo $Cantidad?>"/>
                                </div>
                                <div class="col-sm-4">
                                    <label for="RecibidoPor">Recibido Por:</label>
                                    <input type="text" class="form-control" id="RecibidoPor" name="RecibidoPor" value="<?php echo $RecibidoPor?>"/>
                                    <input type="hidden" name="IDUsuario" value="<?=$this->session->userdata('id_usuario')?>">
                                </div>
                                <div class="col-sm-4">
                                    <label for="Fecha">Fecha de uso:</label>
                                    <input type="date" class="form-control" id="Fecha" name="Fecha" value="<?php echo $Fecha?>"/>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <input type="submit" class="btn red-submit" name="guardar" value="<?php echo $button?>" />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <p></p>
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
                        <?php if(count($usosGuardados)>0):?>
                            <?php if(isset($links)): ?>
                                <div class="pull-right"><?php echo $links; ?></div>
                            <?php  endif;?>
                            <table class="table table-striped table-condensed">
                                <thead>
                                <th>Uso</th>
                                <th>Mina</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Usuario</th>
                                <th>Recibe</th>
                                <th>Fecha</th>
                                </thead>
                                <tbody>

                                </tbody>
                            <?php foreach($usosGuardados as $uso) : ?>
                                <tr>
                                    <td><?php echo $uso->ID;?></td>
                                    <td><?php foreach ($minasGuardadas as $minas) :  if ($uso->IDMina==$minas->ID){ echo $minas->Nombre; break;} endforeach; ?></td>
                                    <td><?php foreach ($productosGuardados as $productos) :  if ($uso->IDProducto==$productos->ID){ echo $productos->Descripcion; break;} endforeach; ?></td>
                                    <td><?php echo $uso->Cantidad; ?></td>
                                    <td><?php foreach ($usuariosGuardados as $usuarios) :  if ($uso->IDUsuario==$usuarios->ID){ echo $usuarios->username; break;} endforeach; ?></td>
                                    <td><?php echo $uso->RecibidoPor;?></td>
                                    <td><?php echo $uso->Fecha; ?></td>
                                <?php if($this->session->userdata('perfil')=='Administrador'){?>
                                    <td class="text-center"><a href="<?php echo base_url(); ?>usos/index/<?php echo $uso->ID; ?>"><i class="fa fa-pencil-square-o"></i></a></td>
                                    <td class="text-center"><a href="<?php echo base_url(); ?>usos/eliminar/<?php echo $uso->ID; ?>"><i class="fa fa-times"></i></a></td>
                                <?php } ?>
                                </tr>
                            <?php endforeach; ?>
                            </table>
                        <?php else :?>
                            <h2>no hay usos registrados</h2>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>