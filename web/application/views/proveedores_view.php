<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <title><?php echo $titulo;?></title>
</head>
<header>Proveedores</header>
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
<body>
<form action="<?php echo base_url();?>proveedores/<?php echo $action;?>" method="post">
    <?php echo $ID; ?>
    <p><label>RFC:</label><input type="text" name="RFC" value="<?php echo $RFC?>"/></p>
    <p><label>Nombre:</label><input type="text" name="Nombre" value="<?php echo $Nombre?>"/></p>
    <p><input type="submit" name="guardar" value="<?php echo $button?>" /></p>
    <?php
    $actualizar = $this->session->flashdata('actualizado');
    if ($actualizar) {
        ?><td colspan="5" id="actualizadoCorrectamente"><?= $actualizar ?></td>
    <?php
    }
    ?>
</form>
<?php if(count($proveedoresGuardadas)>0):?>
    <?php foreach($proveedoresGuardadas as $proveedor) : ?>
        <table>
            <tr><?php echo $proveedor->ID; ?> -- </tr>
            <tr><?php echo $proveedor->RFC; ?>     </tr>
            <tr><?php echo $proveedor->Nombre; ?>     </tr>
            <tr><a href="<?php echo base_url(); ?>proveedores/index/<?php echo $proveedor->ID; ?>">modificar    </a></tr>
            <tr><a href="<?php echo base_url(); ?>proveedores/eliminar/<?php echo $proveedor->ID; ?>">eliminar</a></p></tr>
        </table>
    <?php endforeach; ?>
<?php else :?>
    <h2>no hay proveedores registrados</h2>
<?php endif; ?>
</body>
</html>