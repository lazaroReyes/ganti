<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <title><?php echo $titulo;?></title>
</head>
<h1>Proveedores</h1>
<h2>Bienvenido <?=$this->session->userdata('username')?></h2>
<p><?=anchor(base_url().'login/logout_ci', 'Cerrar sesión')?></p>
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
<?php if($this->session->userdata('perfil')=='Administrador'){?>
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
<?php } ?>
<?php if(count($proveedoresGuardadas)>0):?>
    <?php foreach($proveedoresGuardadas as $proveedor) : ?>
        <table>
            <tr><?php echo $proveedor->ID; ?> -- </tr>
            <tr><?php echo $proveedor->RFC; ?>     </tr>
            <tr><?php echo $proveedor->Nombre; ?>     </tr>
            <?php if($this->session->userdata('perfil')=='Administrador'){?>
                <tr><a href="<?php echo base_url(); ?>proveedores/index/<?php echo $proveedor->ID; ?>">modificar    </a></tr>
                <tr><a href="<?php echo base_url(); ?>proveedores/eliminar/<?php echo $proveedor->ID; ?>">eliminar</a></p></tr>
            <?php } ?>
        </table>
    <?php endforeach; ?>
<?php else :?>
    <h2>no hay proveedores registrados</h2>
<?php endif; ?>
</body>
</html>