<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <title><?php echo $titulo;?></title>
</head>
<h1>Compras</h1>
<h2>Bienvenido <?=$this->session->userdata('username')?></h2>
<p><?=anchor(base_url().'login/logout_ci', 'Cerrar sesión')?></p>
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
<?php if($this->session->userdata('perfil')=='Administrador' || $this->session->userdata('perfil')=='Compras'){?>
<form action="<?php echo base_url();?>compras/<?php echo $action;?>" method="post">
    <?php echo $ID; ?>
    <select name="IDProducto">
        <?php foreach($productosGuardados as $producto) :
            if($producto->ID==$IDProducto){?>
            <option selected value="<?php echo $producto->ID?>"><?php echo $producto->Descripcion?></option>
            <?php }else {?>
                <option value="<?php echo $producto->ID?>"><?php echo $producto->Descripcion?></option>
        <?php } endforeach; ?>
    </select>
    <p><label>Descripcion:</label><input type="text" name="Descripcion" value="<?php echo $Descripcion?>"/></p>
    <p><label>Cantidad:</label><input type="text" name="Cantidad" value="<?php echo $Cantidad?>"/></p>
    <p><label>Costo total:</label><input type="text" name="Costo" value="<?php echo $Costo?>"/></p>
    <p><label>NoFactura:</label><input type="text" name="NoFactura" value="<?php echo $NoFactura?>"/></p>
    <select name="MetodoPago" id="MDP" onChange="ver()">
            <?php if($MetodoPago=='Tarjeta'){?>
                <option value="Tarjeta">Tarjeta</option>
                <option value="Efectivo">Efectivo</option>
            <?php }else { ?>
                <option value="Efectivo">Efectivo</option>
                <option value="Tarjeta">Tarjeta</option>
            <?php } ?>
    </select>
    <select name="IDProveedor">
        <?php foreach($proveedoresGuardados as $provedor) :
            if($provedor->ID==$IDProveedor){?>
                <option selected value="<?php echo $provedor->ID?>"><?php echo $provedor->Nombre?></option>
            <?php }else {?>
                <option value="<?php echo $provedor->ID?>"><?php echo $provedor->Nombre?></option>
        <?php } endforeach; ?>
    </select>
    <?php if($EstadoDeCompra==''){
    ?><p><input type="hidden" name="EstadoDeCompra" value="Requerido"></p><?php
    }else{?>
    <select name="EstadoDeCompra">
        <?php switch($EstadoDeCompra){
            case 'Requerido': ?>
                <option value="Requerido">Requerido</option>
                <option value="Pedido">Pedido</option>
                <option value="Entregado por proveedor">Entregado por el proveedor</option>
                <option value="Enviado">Enviado</option>
            <?php break;
            case 'Pedido': ?>
                <option value="Pedido">Pedido</option>
                <option value="Entregado por proveedor">Entregado por el proveedor</option>
                <option value="Enviado">Enviado</option>
                <?php break;
            case 'Entregado por proveedor': ?>
                <option value="Entregado por proveedor">Entregado por el proveedor</option>
                <option value="Enviado">Enviado</option>
                <?php break;
            case 'Enviado': ?>
                <option value="Enviado">Enviado</option>
                <?php break;
        }?>
    </select>
    <?php }?>
    <p><input type="hidden" name="IDUsuario" value="<?=$this->session->userdata('id_usuario')?>"></p>
    <select name="EstadoDePago">
        <?php if ($EstadoDePago=='Pagado'){ ?>
            <option value="Pagado">Pagado</option>
            <option value="Credito">Credito</option>
        <?php }else{ ?>
            <option value="Credito">Credito</option>
            <option value="Pagado">Pagado</option>
        <?php } ?>
    </select>
    <select name="IDTarjeta">
            <option value="Efectivo">Efectivo</option>
        <?php foreach($tarjetasGuardadas as $tarjeta) :
            if($tarjeta->ID==$IDTarjeta){?>
                <option selected value="<?php echo $tarjeta->ID?>"><?php echo $tarjeta->Descripcion?></option>
            <?php }else {?>
                <option value="<?php echo $tarjeta->ID?>"><?php echo $tarjeta->Descripcion?></option>
            <?php } endforeach; ?>
    </select>
    <select name="IDMaquina">
        <?php foreach($maquinasGuardadas as $maquina) :
            if($maquina->ID==$IDMaquina){?>
            <option selected value="<?php echo $maquina->ID?>"><?php echo $maquina->Descripcion?></option>
            <?php }else {?>
                <option value="<?php echo $maquina->ID?>"><?php echo $maquina->Descripcion?></option>
            <?php } endforeach; ?>
    </select>
    <select name="IDMina">
        <?php foreach($minasGuardadas as $mina) :
            if($mina->ID==$IDMina){?>
                <option selected value="<?php echo $mina->ID?>"><?php echo $mina->Nombre?></option>
            <?php }else {?>
                <option value="<?php echo $mina->ID?>"><?php echo $mina->Nombre?></option>
            <?php } endforeach; ?>
    </select>
    <?php if ($ID!=''){?>
        <p><label>Fecha Requerido:</label><input type="hidden" name="FechaRequerido" value="<?php echo $FechaRequerido?>"/><?php echo $FechaRequerido?></p>
        <p><label>Fecha Pedido:</label><input type="hidden" name="FechaPedido" value="<?php echo $FechaPedido?>"/><?php echo $FechaPedido?></p>
        <p><label>Fecha Entregado por proveedor:</label><input type="hidden" name="FechaEntregaDeProveedor" value="<?php echo $FechaEntregaDeProveedor?>"/><?php echo $FechaEntregaDeProveedor?></p>
        <p><label>Fecha Enviado:</label><input type="hidden" name="FechaEnviado" value="<?php echo $FechaEnviado?>"/><?php echo $FechaEnviado?></p>
    <?php } ?>
    <p><input type="submit" name="guardar" value="<?php echo $button?>" /></p>
    <?php
    $actualizar = $this->session->flashdata('actualizado');
    if ($actualizar) {
        ?><td colspan="5" id="actualizadoCorrectamente"><?= $actualizar ?></td>
    <?php
    }
    ?>
</form>
<?php } ?>
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
            <tr><?php foreach($tarjetasGuardadas as $tarjeta) : if ($compra->IDTarjeta==$tarjeta->ID){echo $tarjeta->Descripcion; break;} endforeach;?> -- </tr>
            <tr><?php foreach ($maquinasGuardadas as $maquina) :  if ($compra->IDMaquina==$maquina->ID){ echo $maquina->Descripcion; break;} endforeach; ?>  -- </tr>
            <tr><?php foreach ($minasGuardadas as $minas) :  if ($compra->IDMina==$minas->ID){ echo $minas->Nombre; break;} endforeach; ?>  -- </tr>
            <tr><?php echo $compra->FechaRequerido; ?> -- </tr>
            <tr><?php echo $compra->FechaPedido; ?> -- </tr>
            <tr><?php echo $compra->FechaEntregaDeProveedor; ?> --  </tr>
            <tr><?php echo $compra->FechaEnviado; ?></tr>
            <?php if($this->session->userdata('perfil')=='Administrador' || $this->session->userdata('perfil')=='Compras'){?>
            <tr><a href="<?php echo base_url(); ?>compras/index/<?php echo $compra->ID; ?>">modificar    </a></tr>
            <tr><a href="<?php echo base_url(); ?>compras/eliminar/<?php echo $compra->ID; ?>">eliminar</a></p></tr>
            <?php } ?>
        </table>
    <?php endforeach; ?>
<?php else :?>
    <h2>no hay compras registrados</h2>
<?php endif; ?>
<?php echo '<script>';
    echo 'var MDPSeleccionado="";';
    echo 'function ver(){';
    echo 'var seleccion=document.getElementById("MDP");';
    echo 'MDPSeleccionado = seleccion.value;';
    echo 'alert(MDPSeleccionado);';
    echo '}';
    echo '</script>';
?>
</body>
</html>