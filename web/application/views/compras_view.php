<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <title><?php echo $titulo;?></title>
</head>
<h1>Compras</h1>
<h2>Bienvenido <?=$this->session->userdata('username')?></h2>
<?php
if(isset($actualizarCompra)){
    $ID = '<p><input type="hidden" name="ID" value="'.$this->uri->segment(3).'"></p>';
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
    $selectEDC = '';
    $action = 'actualizar';
    $button = 'Actualizar';
}else{
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
<body>
<form action="<?php echo base_url();?>compras/<?php echo $action;?>" method="post">
    <?php echo $ID; ?>
    <select name="IDProducto">
        <?php foreach($productosGuardados as $producto) :?>
            <option value="<?php echo $producto->ID?>"><?php echo $producto->Descripcion?></option>
        <?php endforeach; ?>
    </select>
    <p><label>Descripcion:</label><input type="text" name="Descripcion" value="<?php echo $Descripcion?>"/></p>
    <p><label>Cantidad:</label><input type="text" name="Cantidad" value="<?php echo $Cantidad?>"/></p>
    <p><label>Costo total:</label><input type="text" name="Costo" value="<?php echo $Costo?>"/></p>
    <p><label>NoFactura:</label><input type="text" name="NoFactura" value="<?php echo $NoFactura?>"/></p>
    <select name="MetodoPago">
            <option value="Efectivo">Efectivo</option>
            <option value="Tarjeta">Tarjeta</option>
    </select>
    <select name="IDProveedor">
        <?php foreach($proveedoresGuardados as $provedor) :?>
            <option value="<?php echo $provedor->ID?>"><?php echo $provedor->Nombre?></option>
        <?php endforeach; ?>
    </select>
    <p><?php echo $EstadoDeCompra ?></p>
    <?php if($EstadoDeCompra==''){
    ?><p><input type="hidden" name="EstadoDeCompra" value="Requerido"></p><?php
    }else{?>
    <select name="EstadoDeCompra">
        <?php} if($EstadoDeCompra=='Requerido' || $EstadoDeCompra=='Pedido'){?><option value="Pedido">Pedido</option>
        <?php if($EstadoDeCompra!='Enviado'){?><option value="Entregado por proveedor">Entregado por el proveedor</option><?php } ?>
        <option value="Enviado">Enviado</option>
    </select>
    <?php }?>
    <p><input type="hidden" name="IDUsuario" value="<?=$this->session->userdata('id_usuario')?>"></p>
    <select name="EstadoDePago">
        <option value="Pagado">Pagado</option>
        <option value="Credito">Credito</option>
    </select>
    <select name="IDTarjeta">
        <?php foreach($tarjetasGuardadas as $tarjeta) :?>
            <option value="<?php echo $tarjeta->ID?>"><?php echo $tarjeta->Descripcion?></option>
        <?php endforeach; ?>
    </select>
    <select name="IDMaquina">
        <?php foreach($maquinasGuardadas as $maquina) :?>
            <option value="<?php echo $maquina->ID?>"><?php echo $maquina->Descripcion?></option>
        <?php endforeach; ?>
    </select>
    <select name="IDMina">
        <?php foreach($minasGuardadas as $mina) :?>
            <option value="<?php echo $mina->ID?>"><?php echo $mina->Nombre?></option>
        <?php endforeach; ?>
    </select>
    <p><input type="submit" name="guardar" value="<?php echo $button?>" /></p>
    <?php
    $actualizar = $this->session->flashdata('actualizado');
    if ($actualizar) {
        ?><td colspan="5" id="actualizadoCorrectamente"><?= $actualizar ?></td>
    <?php
    }
    ?>
</form>
<?php if(count($comprasGuardados)>0):?>

    <?php foreach($comprasGuardados as $compra) : ?>
        <table>
            <tr><?php echo $compra->ID;?> -- </tr>
            <tr><?php foreach ($productosGuardados as $productos) :  if ($compra->IDProducto==$productos->ID){ echo $productos->Descripcion; break;} endforeach; ?>  -- </tr>
            <tr><?php echo $compra->Descripcion;?> -- </tr>
            <tr><?php echo $compra->Cantidad;?> -- </tr>
            <tr><?php echo $compra->Costo;?> -- </tr>
            <tr><?php echo $compra->NoFactura;?> -- </tr>
            <tr><?php echo $compra->MetodoPago;?> -- </tr>
            <tr><?php foreach ($proveedoresGuardados as $proveedor) :  if ($compra->IDProveedor==$proveedor->ID){ echo $proveedor->Nombre; break;} endforeach; ?>  -- </tr>
            <tr><?php echo $compra->EstadoDeCompra;?> -- </tr>
            <tr><?php foreach ($usuariosGuardados as $usuarios) :  if ($compra->IDUsuario==$usuarios->ID){ echo $usuarios->username; break;} endforeach; ?>  -- </tr>
            <tr><?php echo $compra->EstadoDePago;?> -- </tr>
            <tr><?php echo $compra->IDTarjeta;?> -- </tr>
            <tr><?php foreach ($maquinasGuardadas as $maquina) :  if ($compra->IDMaquina==$maquina->ID){ echo $maquina->Descripcion; break;} endforeach; ?>  -- </tr>
            <tr><?php foreach ($minasGuardadas as $minas) :  if ($compra->IDMina==$minas->ID){ echo $minas->Nombre; break;} endforeach; ?>  -- </tr>
            <tr><?php echo $compra->FechaRequerido; ?> R -- </tr>
            <tr><?php echo $compra->FechaPedido; ?> P -- </tr>
            <tr><?php echo $compra->FechaEntregaDeProveedor; ?> EP -- </tr>
            <tr><?php echo $compra->FechaEnviado; ?> E -- </tr>
            <tr><a href="<?php echo base_url(); ?>compras/index/<?php echo $compra->ID; ?>">modificar    </a></tr>
            <tr><a href="<?php echo base_url(); ?>compras/eliminar/<?php echo $compra->ID; ?>">eliminar</a></p></tr>
        </table>
    <?php endforeach; ?>
<?php else :?>
    <h2>no hay compras registrados</h2>
<?php endif; ?>
</body>
</html>