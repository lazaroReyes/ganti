<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <title><?php echo $titulo;?></title>
</head>
<h1>Tarjetas</h1>
<h2>Bienvenido <?=$this->session->userdata('username')?></h2>
<p><?=anchor(base_url().'login/logout_ci', 'Cerrar sesión')?></p>
<?php
if(isset($actualizarTarjeta)){
    $ID = '<p><input type="hidden" name="ID" value="'.$this->uri->segment(3).'"></p>';
    $Descripcion = $actualizarTarjeta->Descripcion;
    $action = 'actualizar';
    $button = 'Actualizar';
}else{
    $ID = '';
    $Descripcion='';
    $action = 'insertar';
    $button = 'Guardar';
}
?>
<body>
<?php if($this->session->userdata('perfil')=='Administrador' || $this->session->userdata('perfil') == 'Compras'){?>
<form action="<?php echo base_url();?>tarjetas/<?php echo $action;?>" method="post">
    <?php echo $ID; ?>
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
<?php } ?>
<?php if(count($tarjetasGuardadas)>0):?>
    <?php foreach($tarjetasGuardadas as $tarjeta) : ?>
        <table>
            <tr><?php echo $tarjeta->ID; ?> -- </tr>
            <tr><?php echo $tarjeta->Descripcion; ?>     </tr>
            <?php if($this->session->userdata('perfil')=='Administrador'){?>
                <tr><a href="<?php echo base_url(); ?>tarjetas/index/<?php echo $tarjeta->ID; ?>">modificar    </a></tr>
                <tr><a href="<?php echo base_url(); ?>tarjetas/eliminar/<?php echo $tarjeta->ID; ?>">eliminar</a></p></tr>
            <?php } ?>
        </table>
    <?php endforeach; ?>
<?php else :?>
    <h2>no hay tarjetas registradas</h2>
<?php endif; ?>
</body>
</html>