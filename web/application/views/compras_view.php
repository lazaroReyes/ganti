<?php
if (isset($actualizarCompra)) {
    $ID = '<p><input type="hidden" name="ID" value="' . $this->uri->segment(3) . '"></p>';
    $IDProducto = $actualizarCompra->IDProducto;
    $Descripcion = $actualizarCompra->Descripcion;
    $Cantidad = $actualizarCompra->Cantidad;
    $Costo = $actualizarCompra->Costo;
    $NoFactura = $actualizarCompra->NoFactura;
    $MetodoPago = $actualizarCompra->MetodoPago;
    $IDProveedor = $actualizarCompra->IDProveedor;
    $EstadoDeCompra = $actualizarCompra->EstadoDeCompra;
    $IDUsuario = $actualizarCompra->IDUsuario;
    $IDTarjeta = $actualizarCompra->IDTarjeta;
    $IDMaquina = $actualizarCompra->IDMaquina;
    $IDMina = $actualizarCompra->IDMina;
    $FechaRequerido = $actualizarCompra->FechaRequerido;
    $FechaPedido = $actualizarCompra->FechaPedido;
    $FechaEnviado = $actualizarCompra->FechaEnviado;
    $FechaRecibido = $actualizarCompra->FechaRecibido;
    $action = 'actualizar';
    $button = 'Actualizar';
} else {
    $ID = '';
    $IDProducto = '';
    $Descripcion = '';
    $Cantidad = '';
    $Costo = '';
    $NoFactura = '';
    $MetodoPago = '';
    $IDProveedor = '';
    $EstadoDeCompra = '';
    $IDUsuario = '';
    $IDTarjeta = '';
    $IDMaquina = '';
    $IDMina = '';
    $FechaRequerido = '';
    $FechaPedido = '';
    $FechaEnviado = '';
    $FechaRecibido = '';
    $action = 'insertar';
    $button = 'Guardar';
}
?>
<div id="wrapper">
    <?php include('partials/admin_menu_view.php') ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Requisiciones</h1>
                <div class="divider"></div>
                    <?php if ($this->session->userdata('perfil') == 'Administrador' || $this->session->userdata('perfil') == 'Compras') { ?>
                        <?php echo form_open("compras/$action", 'method="post" class="margin-bottom"'); ?>
                            <?php echo $ID; ?>
                            <?php if ($ID == ''){?>
                            <div class="col-sm-4">
                                <label for="IDMina">Departamento:</label>
                                <select name="IDMina" id="IDMina" class="form-control">
                                <?php foreach ($minasGuardadas as $mina) : ?>
                                    <option value="<?php echo $mina->ID ?>"><?php echo $mina->Nombre ?></option>
                                <?php endforeach; ?>
                                    </select>
                                    </div>
                            <div class="col-sm-4">
                                <label for="IDMaquina">Maquina:</label>
                                    <select name="IDMaquina" id="IDMaquina" class="form-control">
                                        <?php foreach ($maquinasGuardadas as $maquina) : ?>
                                                <option value="<?php echo $maquina->ID ?>"><?php echo $maquina->Descripcion ?></option>
                                        <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="IDProducto">Seleccionar Producto:</label>
                                    <select id="IDProducto" name="IDProducto" class="form-control">
                                        <?php foreach ($productosGuardados as $producto) : ?>
                                                <option value="<?php echo $producto->ID ?>"><?php echo $producto->Clave ?>----<?php echo $producto->Descripcion ?></option>
                                        <?php endforeach; ?>
                                    </select>
                            </div>
                                <div class="clearfix"></div>
                                <div class="col-sm-6">
                                    <label for="Cantidad">Cantidad:</label>
                                    <input type="text" class="form-control" id="Cantidad" name="Cantidad"
                                           value="<?php echo $Cantidad ?>"/>
                                </div>
                                <div class="col-sm-6">
                                    <label for="Descripcion">Comentarios:</label>
                                    <input type="text" class="form-control" id="Descripcion" name="Descripcion"
                                           value="<?php echo $Descripcion ?>"/>
                                </div>
                                <div class="clearfix"></div>
                                <input type="hidden" name="EstadoDeCompra" value="Requerido">
                                <input type="hidden" name="IDUsuario" value="<?= $this->session->userdata('id_usuario') ?>">
                            <?php } else { ?>
                                <input type="hidden" name="IDUsuario" value="<?= $this->session->userdata('id_usuario') ?>">
                                <div class="col-sm-4">
                                    <label for="IDMina">Departamento:</label>
                                    <?php foreach ($minasGuardadas as $minas) :  if ($IDMina == $minas->ID) { ?>
                                    <input type="hidden" name="IDMina" id="IDMina" class="form-control"
                                           value="<?php echo $IDMina ?>"/><?php echo $minas->Nombre;
                                        break;
                                    } endforeach; ?>
                                </div>
                                <div class="col-sm-4">
                                    <label for="IDProducto">Producto:</label>
                                    <?php foreach ($productosGuardados as $productos) :  if ($IDProducto == $productos->ID) { ?>
                                        <input type="hidden" name="IDProducto" id="IDProducto" class="form-control"
                                               value="<?php echo $IDProducto ?>"/><?php echo $productos->Clave.'---'.$productos->Descripcion;
                                        break;
                                    } endforeach; ?>
                                </div>
                                <div class="col-sm-4">
                                    <label for="IDMaquina">Maquina:</label>
                                    <?php foreach ($maquinasGuardadas as $maquina) :  if ($IDMaquina == $maquina->ID) { ?>
                                        <input type="hidden" name="IDMaquina" id="IDMaquina" class="form-control"
                                               value="<?php echo $IDMaquina ?>"/><?php echo $maquina->Descripcion.'---#'.$maquina->numeroEconomico;
                                        break;
                                    } endforeach; ?>
                                </div>
                                <div class="col-sm-4">
                                    <label for="Cantidad">Cantidad:</label>
                                    <?php if ($EstadoDeCompra == 'Recibido' || $EstadoDeCompra == 'Enviado'){ ?>
                                        <input type="hidden" name="Cantidad" id="Cantidad" class="form-control"
                                               value="<?php echo $Cantidad ?>"/> <?php echo $Cantidad ?>
                                    <?php }else { ?>
                                    <input type="text" class="form-control" id="Cantidad" name="Cantidad"
                                           value="<?php echo $Cantidad ?>"/>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label for="Costo">Costo total:</label>
                                        <?php if ($EstadoDeCompra == 'Recibido' || $EstadoDeCompra == 'Enviado'){ ?>
                                            <input type="hidden" name="Costo" id="Costo" class="form-control"
                                                   value="<?php echo $Costo ?>"/> <?php echo $Costo ?>
                                        <?php }else { ?>
                                        <input type="text" class="form-control" id="Costo" name="Costo"
                                               value="<?php echo $Costo ?>"/>
                                        <?php } ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="NoFactura">No. Factura:</label>
                                        <?php if ($EstadoDeCompra == 'Recibido' || $EstadoDeCompra == 'Enviado'){ ?>
                                            <input type="hidden" name="NoFactura" id="NoFactura" class="form-control"
                                                   value="<?php echo $NoFactura ?>"/> <?php echo $NoFactura ?>
                                        <?php }else { ?>
                                        <input type="text" id="NoFactura" class="form-control" name="NoFactura"
                                               value="<?php echo $NoFactura ?>"/>
                                        <?php } ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?php if ($EstadoDeCompra == 'Recibido' || $EstadoDeCompra == 'Enviado'){ ?>
                                            <label for="MDP">Metodo de pago:</label>
                                            <input type="hidden" name="MetodoPago" id="MetodoPago" class="form-control"
                                                   value="<?php echo $MetodoPago ?>"/> <?php echo $MetodoPago ?>
                                        <?php }else { ?>
                                        <label for="MDP">Seleccione metodo de pago:</label>
                                        <select class="form-control" name="MetodoPago" id="MDP" onChange="ver()">
                                            <?php if ($MetodoPago == 'Tarjeta') { ?>
                                                <option value="Tarjeta">Tarjeta</option>
                                                <option value="Efectivo">Efectivo</option>
                                            <?php } else { ?>
                                                <option value="Efectivo">Efectivo</option>
                                                <option value="Tarjeta">Tarjeta</option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label for="IDTarjeta">Tarjeta:</label>
                                        <?php if ($EstadoDeCompra == 'Recibido' || $EstadoDeCompra == 'Enviado'){ ?>
                                            <?php foreach ($tarjetasGuardadas as $tarjetas) :  if ($IDTarjeta == $tarjetas->ID) { ?>
                                                <input type="hidden" name="IDTarjeta" id="IDTarjeta" class="form-control"
                                                       value="<?php echo $IDTarjeta ?>"/><?php echo $tarjetas->Descripcion;
                                                break;
                                            } endforeach; ?>
                                        <?php }else { ?>
                                        <select name="IDTarjeta" id="IDTarjeta" class="form-control">
                                            <option value="Efectivo">Efectivo</option>
                                            <?php foreach ($tarjetasGuardadas as $tarjeta) :
                                                if ($tarjeta->ID == $IDTarjeta) {
                                                    ?>
                                                    <option selected
                                                            value="<?php echo $tarjeta->ID?>"><?php echo $tarjeta->Descripcion?></option>
                                                <?php } else { ?>
                                                    <option
                                                        value="<?php echo $tarjeta->ID ?>"><?php echo $tarjeta->Descripcion ?></option>
                                                <?php } endforeach; }?>
                                        </select>
                                    </div>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <?php if ($EstadoDeCompra == 'Recibido' || $EstadoDeCompra == 'Enviado'){ ?>
                                            <label for="MDP">Metodo de pago:</label>
                                        <?php foreach ($proveedoresGuardados as $proveedor) :
                                        if ($proveedor->ID == $IDProveedor) {?>
                                            <input type="hidden" name="IDProveedor" id="IDProveedor" class="form-control"
                                                   value="<?php echo $IDProveedor ?>"/> <?php echo $proveedor->Nombre ?>
                                        <?php } endforeach; } else { ?>
                                        <label for="IDProveedor">Seleccione Proveedor:</label>
                                        <select class="form-control" id="IDProveedor" name="IDProveedor">
                                            <?php foreach ($proveedoresGuardados as $proveedor) :
                                                if ($proveedor->ID == $IDProveedor) {
                                                    ?>
                                                    <option selected
                                                            value="<?php echo $proveedor->ID?>"><?php echo $proveedor->Nombre?></option>
                                                <?php } else { ?>
                                                    <option
                                                        value="<?php echo $proveedor->ID ?>"><?php echo $proveedor->Nombre ?></option>
                                                <?php } endforeach; } ?>

                                        </select>
                                    </div>
                                        <div class="col-sm-4">
                                            <label for="EstadoDeCompra">Estado de Compra:</label>
                                            <?php if ($EstadoDeCompra == 'Recibido'){ ?>
                                                <input type="hidden" name="EstadoDeCompra" id="EstadoDeCompra" class="form-control"
                                                       value="<?php echo $EstadoDeCompra ?>"/> <?php echo $EstadoDeCompra ?>
                                            <?php }else { ?>
                                            <select class="form-control" id="EstadoDeCompra" name="EstadoDeCompra">
                                                <?php switch ($EstadoDeCompra) {
                                                    case 'Requerido': ?>
                                                        <option value="Requerido">Requerido</option>
                                                        <option value="Pedido">Pedido</option>
                                                        <option value="Enviado">Enviado
                                                        </option>
                                                        <option value="Recibido">Recibido</option>
                                                        <?php break;
                                                    case 'Pedido': ?>
                                                        <option value="Pedido">Pedido</option>
                                                        <option value="Enviado">Enviado
                                                        </option>
                                                        <option value="Recibido">Recibido</option>
                                                        <?php break;
                                                    case 'Enviado': ?>
                                                        <option value="Enviado">Enviado
                                                        </option>
                                                        <option value="Recibido">Recibido</option>
                                                        <?php break;
                                                    case 'Recibido': ?>
                                                        <option value="Recibido">Recibido</option>
                                                        <?php break;
                                                } }?>
                                            </select>
                                        </div>
                                    <div class="col-sm-4">
                                        <label for="Descripcion">Comentarios:</label>
                                        <?php if ($EstadoDeCompra == 'Recibido'){ ?>
                                            <input type="hidden" name="Descripcion" id="Descripcion" class="form-control"
                                                   value="<?php echo $Descripcion ?>"/> <?php echo $Descripcion ?>
                                        <?php }else { ?>
                                            <input type="text" class="form-control" id="Descripcion" name="Descripcion"
                                                   value="<?php echo $Descripcion ?>"/>
                                        <?php } ?>
                                    </div>
                                </div>
                                    <div class="clearfix"></div>
                                </div>
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <label for="FechaRequerido">Fecha Requerido:</label>
                                            <input type="hidden" name="FechaRequerido" id="FechaRequerido"
                                                   class="form-control"
                                                   value="<?php echo $FechaRequerido ?>"/><?php echo $FechaRequerido ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="FechaPedido">Fecha Pedido:</label>
                                            <input type="hidden" name="FechaPedido" id="FechaPedido" class="form-control"
                                                   value="<?php echo $FechaPedido ?>"/><?php echo $FechaPedido ?>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <label for="FechaEnviado">Fecha Enviado:</label>
                                            <input type="hidden" name="FechaEnviado" id="FechaEnviado"
                                                   class="form-control"
                                                   value="<?php echo $FechaEnviado ?>"/><?php echo $FechaEnviado ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="FechaRecibido">Fecha Recibido:</label>
                                            <input type="hidden" name="FechaRecibido" id="FechaRecibido" class="form-control"
                                                   value="<?php echo $FechaRecibido ?>"/><?php echo $FechaRecibido ?>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                            <?php } ?>
                            <div class="form-group">
                                <?php if($EstadoDeCompra != 'Recibido' ) { ?>
                                <div class="col-sm-3">
                                    <input type="submit" name="guardar" class="btn red-submit form-control"
                                           value="<?php echo $button ?>"/>
                                </div>
                                <?php } ?>
                                <div class="clearfix"></div>
                            </div>
                            <?php
                            $actualizar = $this->session->flashdata('actualizado');
                            if ($actualizar) {
                                ?>
                                <span id="actualizadoCorrectamente"><?= $actualizar ?></span>
                            <?php
                            }
                            ?>
                        <?php echo form_close(); ?>
                        </form>
                    <?php } ?>
                    <div class="divider"></div>
                <?php if (count($comprasGuardados) > 0 || !empty($comprasGuardados)): ?>
                <div class="col-sm-12">
                    <div class="pull-left searcher">
                        <form action="<?php echo base_url(); ?>" class="form-inline" data-target="compras" id="ganti-search" method="post">
                            <div class="form-group">
                                <label for="search"></label>
                                <select name="search" id="search" class="prettyselect">
                                    <option value="null">Buscar por</option>
                                    <option value="fetchByInvoice">Factura</option>
                                    <option value="fetchByCard">Tarjeta</option>
                                    <option value="fetchByDate">Fecha Requisición</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="term"></label>
                                <div class="input-group" id="search-input">
                                    <input type="text" id="term" name="term" class="form-control" placeholder="Buscar" />
                                    <div class="input-group-addon"><i class="fa fa-search"></i></div>
                                </div>
                                <div class="input-group hidden" id="search-date">
                                    <input type="text" id="datepicker" name="datepicker" class="form-control" placeholder="Fecha" />
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn red-submit form-control no-margin margin-left"
                                       value="Buscar"/>
                            </div>
                        </form>
                    </div>

                    <?php if(isset($links)): ?>
                        <div class="pull-right"><?php echo $links; ?></div>
                    <?php  endif;?>
                </div>
                    <div class="col-lg-12 table-responsive">
                            <table class="table table-striped table-condensed">
                                <thead>
                                <th>Requisición</th>
                                <th>Producto</th>
                                <th>Comentarios</th>
                                <th>Cantidad</th>
                                <th>Costo</th>
                                <th>No. Factura</th>
                                <th>Metodo de pago</th>
                                <th>Proveedor</th>
                                <th>Estado de la compra</th>
                                <th>Usuario</th>
                                <th>Tarjeta</th>
                                <th>Maquina</th>
                                <th>Departamento</th>
                                <th>Fecha de requisición</th>
                                <th>Fecha del pedido</th>
                                <th>Fecha enviado</th>
                                <th>Fecha recibido</th>
                                <th>Imprimir</th>
                                <?php if ($this->session->userdata('perfil') == 'Administrador' || $this->session->userdata('perfil') == 'Compras') { ?>
                                    <th class="text-center">Editar</th>
                                <?php if ($this->session->userdata('perfil') == 'Administrador'){?>
                                    <th class="text-center">Eliminar</th>
                                <?php }} ?>
                                </thead>
                                <tbody>
                                <?php foreach ($comprasGuardados as $compra) : ?>
                                    <tr>
                                        <td><?php echo $compra->ID; ?></td>
                                        <td><?php foreach ($productosGuardados as $productos) :  if ($compra->IDProducto == $productos->ID) {
                                                echo $productos->Descripcion;
                                                break;
                                            } endforeach; ?></td>
                                        <td><?php echo $compra->Descripcion; ?></td>
                                        <td><?php echo $compra->Cantidad; ?></td>
                                        <td><?php echo $compra->Costo; ?></td>
                                        <td><?php echo $compra->NoFactura; ?></td>
                                        <td><?php echo $compra->MetodoPago; ?></td>
                                        <td><?php foreach ($proveedoresGuardados as $proveedor) :  if ($compra->IDProveedor == $proveedor->ID) {
                                                echo $proveedor->Nombre;
                                                break;
                                            } endforeach; ?></td>
                                        <td><?php echo $compra->EstadoDeCompra; ?></td>
                                        <td><?php foreach ($usuariosGuardados as $usuarios) :  if ($compra->IDUsuario == $usuarios->ID) {
                                                echo $usuarios->username;
                                                break;
                                            } endforeach; ?></td>
                                        <td><?php foreach ($tarjetasGuardadas as $tarjeta) : if ($compra->IDTarjeta == $tarjeta->ID) {
                                                echo $tarjeta->Descripcion;
                                                break;
                                            } endforeach; ?></td>
                                        <td><?php foreach ($maquinasGuardadas as $maquina) :  if ($compra->IDMaquina == $maquina->ID) {
                                                echo $maquina->Descripcion;
                                                break;
                                            } endforeach; ?></td>
                                        <td><?php foreach ($minasGuardadas as $minas) :  if ($compra->IDMina == $minas->ID) {
                                                echo $minas->Nombre;
                                                break;
                                            } endforeach; ?></td>
                                        <td><?php echo $compra->FechaRequerido; ?></td>
                                        <td><?php echo $compra->FechaPedido; ?></td>
                                        <td><?php echo $compra->FechaEnviado; ?></td>
                                        <td><?php echo $compra->FechaRecibido; ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo base_url(); ?>pdf_ci/index/<?php echo $compra->ID; ?>" target="_blank"><i class="fa fa-print" style="color:white"></i></a>
                                        </td>
                                        <?php if ($this->session->userdata('perfil') == 'Administrador' || $this->session->userdata('perfil') == 'Compras') { ?>
                                            <td class="text-center">
                                                <a href="<?php echo base_url(); ?>compras/index/<?php echo $compra->ID; ?>"><i class="fa fa-pencil-square-o"></i></a>
                                            </td>
                                        <?php if ($this->session->userdata('perfil') == 'Administrador'){?>
                                            <td class="text-center">
                                                <a href="<?php echo base_url(); ?>compras/eliminar/<?php echo $compra->ID; ?>"><i class="fa fa-times"></i></a>
                                            </td>
                                        <?php }} ?>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                        <h2>no hay requisiciones registrados</h2>
                            <?php endif; ?>
                    </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <!-- /#page-wrapper -->
</div>
<script type="text/javascript">
    var MDPSeleccionado = "";
    function ver() {
        var seleccion = document.getElementById('MDP');
        MDPSeleccionado = seleccion.value;
    }

    var term_input = document.getElementById('term');
    term_input.onkeypress = sendForm;

    function sendForm(event) {
        if(event.keyCode === 13) {
            this.form.submit();
        }
    }
    var datepicker_input = document.getElementById('datepicker');
    datepicker_input.onkeypress = sendForm;
</script>