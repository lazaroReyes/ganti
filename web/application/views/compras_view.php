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
    $EstadoDePago = $actualizarCompra->EstadoDePago;
    $IDTarjeta = $actualizarCompra->IDTarjeta;
    $IDMaquina = $actualizarCompra->IDMaquina;
    $IDMina = $actualizarCompra->IDMina;
    $FechaRequerido = $actualizarCompra->FechaRequerido;
    $FechaPedido = $actualizarCompra->FechaPedido;
    $FechaEntregaDeProveedor = $actualizarCompra->FechaEntregaDeProveedor;
    $FechaEnviado = $actualizarCompra->FechaEnviado;
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
    $EstadoDePago = '';
    $IDTarjeta = '';
    $IDMaquina = '';
    $IDMina = '';
    $FechaRequerido = '';
    $FechaPedido = '';
    $FechaEntregaDeProveedor = '';
    $FechaEnviado = '';
    $action = 'insertar';
    $button = 'Guardar';
}
?>
<div id="wrapper">
    <?php include('partials/admin_menu_view.php') ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Compras</h1>

                <div class="divider"></div>
                    <?php if ($this->session->userdata('perfil') == 'Administrador' || $this->session->userdata('perfil') == 'Compras') { ?>
                        <form action="<?php echo base_url(); ?>compras/<?php echo $action; ?>" method="post" class="margin-bottom">
                            <?php echo $ID; ?>
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="IDProdcto">Seleccionar Producto:</label>
                                    <select id="IDProdcto" name="IDProducto" class="form-control">
                                        <?php foreach ($productosGuardados as $producto) :
                                            if ($producto->ID == $IDProducto) {
                                                ?>
                                                <option selected
                                                        value="<?php echo $producto->ID?>"><?php echo $producto->Descripcion?></option>
                                            <?php } else { ?>
                                                <option
                                                    value="<?php echo $producto->ID ?>"><?php echo $producto->Descripcion ?></option>
                                            <?php } endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="Descripcion">Descripcion:</label>
                                    <input type="text" class="form-control" id="Descripcion" name="Descripcion"
                                           value="<?php echo $Descripcion ?>"/>
                                </div>
                                <div class="col-sm-4">
                                    <label for="Cantidad">Cantidad:</label>
                                    <input type="text" class="form-control" id="Cantidad" name="Cantidad"
                                           value="<?php echo $Cantidad ?>"/>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="Costo">Costo total:</label>
                                    <input type="text" class="form-control" id="Costo" name="Costo"
                                           value="<?php echo $Costo ?>"/>
                                </div>
                                <div class="col-sm-4">
                                    <label for="NoFactura">No. Factura:</label>
                                    <input type="text" id="NoFactura" class="form-control" name="NoFactura"
                                           value="<?php echo $NoFactura ?>"/>
                                </div>
                                <div class="col-sm-4">
                                    <label for="MDP">Seleccione metodo de pago:</label>
                                    <select class="form-control" name="MetodoPago" id="MDP" onChange="ver()">
                                        <?php if ($MetodoPago == 'Tarjeta') { ?>
                                            <option value="Tarjeta">Tarjeta</option>
                                            <option value="Efectivo">Efectivo</option>
                                        <?php } else { ?>
                                            <option value="Efectivo">Efectivo</option>
                                            <option value="Tarjeta">Tarjeta</option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <div <?php  if($EstadoDeCompra == ''){ echo 'class="col-sm-6"'; }else { echo 'class="col-sm-4"'; }?>>
                                    <label for="IDProveedor">Seleccione Proveedor:</label>
                                    <select class="form-control" id="IDProveedor" name="IDProveedor">
                                        <?php foreach ($proveedoresGuardados as $provedor) :
                                            if ($provedor->ID == $IDProveedor) {
                                                ?>
                                                <option selected
                                                        value="<?php echo $provedor->ID?>"><?php echo $provedor->Nombre?></option>
                                            <?php } else { ?>
                                                <option
                                                    value="<?php echo $provedor->ID ?>"><?php echo $provedor->Nombre ?></option>
                                            <?php } endforeach; ?>
                                    </select>
                                </div>
                                    <?php if ($EstadoDeCompra == '') {?>
                                        <input type="hidden" name="EstadoDeCompra" value="Requerido"><?php
                                    } else { ?>
                                        <div class="col-sm-4">
                                            <label for="EstadoDeCompra">Estado de Compra:</label>
                                            <select class="form-control" id="EstadoDeCompra" name="EstadoDeCompra">
                                                <?php switch ($EstadoDeCompra) {
                                                    case 'Requerido': ?>
                                                        <option value="Requerido">Requerido</option>
                                                        <option value="Pedido">Pedido</option>
                                                        <option value="Entregado por proveedor">Entregado por el proveedor
                                                        </option>
                                                        <option value="Enviado">Enviado</option>
                                                        <?php break;
                                                    case 'Pedido': ?>
                                                        <option value="Pedido">Pedido</option>
                                                        <option value="Entregado por proveedor">Entregado por el proveedor
                                                        </option>
                                                        <option value="Enviado">Enviado</option>
                                                        <?php break;
                                                    case 'Entregado por proveedor': ?>
                                                        <option value="Entregado por proveedor">Entregado por el proveedor
                                                        </option>
                                                        <option value="Enviado">Enviado</option>
                                                        <?php break;
                                                    case 'Enviado': ?>
                                                        <option value="Enviado">Enviado</option>
                                                        <?php break;
                                                } ?>
                                        </select>
                                        </div>
                                    <?php } ?>
                                <div <?php  if($EstadoDeCompra == ''){ echo 'class="col-sm-6"'; }else { echo 'class="col-sm-4"'; }?>>
                                    <input type="hidden" name="IDUsuario"
                                           value="<?= $this->session->userdata('id_usuario') ?>">
                                    <label for="EstadoDePago">Estado de pago:</label>
                                    <select name="EstadoDePago" id="EstadoDePago" class="form-control">
                                        <?php if ($EstadoDePago == 'Pagado') { ?>
                                            <option value="Pagado">Pagado</option>
                                            <option value="Credito">Credito</option>
                                        <?php } else { ?>
                                            <option value="Credito">Credito</option>
                                            <option value="Pagado">Pagado</option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="IDTarjeta">Tarjeta:</label>
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
                                            <?php } endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="IDMaquina">Maquina:</label>
                                    <select name="IDMaquina" id="IDMaquina" class="form-control">
                                        <?php foreach ($maquinasGuardadas as $maquina) :
                                            if ($maquina->ID == $IDMaquina) {
                                                ?>
                                                <option selected
                                                        value="<?php echo $maquina->ID?>"><?php echo $maquina->Descripcion?></option>
                                            <?php } else { ?>
                                                <option
                                                    value="<?php echo $maquina->ID ?>"><?php echo $maquina->Descripcion ?></option>
                                            <?php } endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="IDMina">Mina:</label>
                                    <select name="IDMina" id="IDMina" class="form-control">
                                        <?php foreach ($minasGuardadas as $mina) :
                                            if ($mina->ID == $IDMina) {
                                                ?>
                                                <option selected
                                                        value="<?php echo $mina->ID?>"><?php echo $mina->Nombre?></option>
                                            <?php } else { ?>
                                                <option
                                                    value="<?php echo $mina->ID ?>"><?php echo $mina->Nombre ?></option>
                                            <?php } endforeach; ?>
                                    </select>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <?php if ($ID != '') { ?>
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
                                        <label for="FechaEntregaDeProveedor">Fecha Entregado por proveedor:</label>
                                        <input type="hidden" name="FechaEntregaDeProveedor" id="FechaEntregaDeProveedor"
                                               class="form-control"
                                               value="<?php echo $FechaEntregaDeProveedor ?>"/><?php echo $FechaEntregaDeProveedor ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="FechaEnviado">Fecha Enviado:</label>
                                        <input type="hidden" name="FechaEnviado" id="FechaEnviado" class="form-control"
                                               value="<?php echo $FechaEnviado ?>"/><?php echo $FechaEnviado ?>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            <?php } ?>
                            <div class="form-group">
                                <div class="col-sm-4" aria-hidden="true"></div>
                                <div class="col-sm-4">
                                    <input type="submit" name="guardar" class="btn red-submit form-control"
                                           value="<?php echo $button ?>"/>
                                </div>
                                <div class="col-sm-4" aria-hidden="true"></div>
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
                        </form>
                    <?php } ?>
                    <div class="divider"></div>
                    <div class="col-lg-12 table-responsive">
                        <?php if (count($comprasGuardados) > 0): ?>
                            <table class="table table-striped table-condensed">
                                <thead>
                                <th>Compra</th>
                                <th>Producto</th>
                                <th>Descripción</th>
                                <th>Cantidad</th>
                                <th>Costo</th>
                                <th>No. Factura</th>
                                <th>Metodo de pago</th>
                                <th>Proveedor</th>
                                <th>Estado de la compra</th>
                                <th>Usuario</th>
                                <th>Estado de pago</th>
                                <th>Tarjeta</th>
                                <th>Maquina</th>
                                <th>Mina</th>
                                <th>Fecha de requisición</th>
                                <th>Fecha del pedido</th>
                                <th>Fecha entrega del proveedor</th>
                                <th>Fecha enviado</th>
                                <?php if ($this->session->userdata('perfil') == 'Administrador' || $this->session->userdata('perfil') == 'Compras') { ?>
                                    <th class="text-center">Editar</th>
                                    <th class="text-center">Eliminar</th>
                                <?php } ?>
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
                                        <td><?php echo $compra->EstadoDePago; ?></td>
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
                                        <td><?php echo $compra->FechaEntregaDeProveedor; ?></td>
                                        <td><?php echo $compra->FechaEnviado; ?></td>
                                        <?php if ($this->session->userdata('perfil') == 'Administrador' || $this->session->userdata('perfil') == 'Compras') { ?>
                                            <td class="text-center">
                                                <a href="<?php echo base_url(); ?>compras/index/<?php echo $compra->ID; ?>"><i class="fa fa-pencil-square-o"></i></a>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?php echo base_url(); ?>compras/eliminar/<?php echo $compra->ID; ?>"><i class="fa fa-times"></i></a>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                        <h2>no hay compras registrados</h2>
                            <?php endif; ?>
                    </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <!-- /#page-wrapper -->
</div>
<script>
    var MDPSeleccionado = "";
    function ver() {
        var seleccion = document.getElementById('MDP');
        MDPSeleccionado = seleccion.value;
        alert(MDPSeleccionado);
    }
</script>