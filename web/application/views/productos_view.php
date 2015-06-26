<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <title><?php echo $titulo;?></title>
</head>
<header>Productos</header>
<?php
if(isset($actualizarProducto)){
    $ID = '<p><input type="hidden" name="ID" value="'.$this->uri->segment(3).'"></p>';
    $Clave = $actualizarProducto->Clave;
    $Descripcion = $actualizarProducto->Descripcion;
    $action = 'actualizar';
    $button = 'Actualizar';
}else{
    $ID = '';
    $Clave = '';
    $Descripcion='';
    $action = 'insertar';
    $button = 'Guardar';
}
?>
<body>
<form action="<?php echo base_url();?>productos/<?php echo $action;?>" method="post">
    <?php echo $ID; ?>
    <p><label>Clave:</label><input type="text" name="Clave" value="<?php echo $Clave?>"/></p>
    <p><label>Descripcion:</label><input type="text" name="Descripcion" value="<?php echo $Descripcion?>"/></p>
    <p><input type="submit" name="guardar" value="<?php echo $button?>" /></p>
    <?php
    $actualizar = $this->session->flashdata('actualizado');
    if ($actualizar) {
        ?><td colspan="5" id="actualizadoCorrectamente"><?= $actualizar ?></td>
    <?php
    }
    ?>
</form>
<?php if(count($productosGuardadas)>0):?>
    <?php foreach($productosGuardadas as $producto) : ?>
        <table>
            <tr><?php echo $producto->ID; ?> -- </tr>
            <tr><?php echo $producto->Clave; ?>     </tr>
            <tr><?php echo $producto->Descripcion; ?>     </tr>
            <tr><a href="<?php echo base_url(); ?>productos/index/<?php echo $producto->ID; ?>">modificar    </a></tr>
            <tr><a href="<?php echo base_url(); ?>productos/eliminar/<?php echo $producto->ID; ?>">eliminar</a></p></tr>
        </table>
    <?php endforeach; ?>
<?php else :?>
    <h2>no hay productos registrados</h2>
<?php endif; ?>
</body>
</html>