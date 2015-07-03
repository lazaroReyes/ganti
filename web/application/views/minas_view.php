<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <title><?php echo $titulo;?></title>
</head>
<h1>Minas</h1>
<h2>Bienvenido <?=$this->session->userdata('username')?></h2>
<p><?=anchor(base_url().'login/logout_ci', 'Cerrar sesión')?></p>
<?=anchor(base_url().'login/logout_ci', 'Cerrar sesión')?>
<?php
if(isset($actualizarMina)){
    $ID = '<p><input type="hidden" name="ID" value="'.$this->uri->segment(3).'"></p>';
    $Nombre = $actualizarMina->Nombre;
    $Descripcion = $actualizarMina->Descripcion;
    $action = 'actualizar';
    $button = 'Actualizar';
}else{
    $ID = '';
    $Nombre = '';
    $Descripcion='';
    $action = 'insertar';
    $button = 'Guardar';
}
?>
<body>
<?php if($this->session->userdata('perfil')=='Administrador'){?>
<form action="<?php echo base_url();?>minas/<?php echo $action;?>" method="post">
    <?php echo $ID; ?>
    <p><label>Nombre:</label><input type="text" name="Nombre" value="<?php echo $Nombre?>"/></p>
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
<?php if(count($minasGuardadas)>0):?>
    <?php foreach($minasGuardadas as $mina) : ?>
        <table>
            <tr><?php echo $mina->ID; ?> -- </tr>
            <tr><?php echo $mina->Nombre; ?>     </tr>
            <tr><?php echo $mina->Descripcion; ?>     </tr>
            <?php if($this->session->userdata('perfil')=='Administrador'){?>
            <tr><a href="<?php echo base_url(); ?>minas/index/<?php echo $mina->ID; ?>">modificar    </a></tr>
            <tr><a href="<?php echo base_url(); ?>minas/eliminar/<?php echo $mina->ID; ?>">eliminar</a></p></tr>
            <?php } ?>
        </table>
    <?php endforeach; ?>
<?php else :?>
    <h2>no hay minas registradas</h2>
<?php endif; ?>
</body>
</html>