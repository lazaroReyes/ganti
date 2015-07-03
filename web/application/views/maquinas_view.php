<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <title><?php echo $titulo;?></title>
</head>
<h1>Maquinas</h1>
<h2>Bienvenido <?=$this->session->userdata('username')?></h2>
<p><?=anchor(base_url().'login/logout_ci', 'Cerrar sesión')?></p>
<?php
if(isset($actualizarMaquina)){
    $ID = '<p><input type="hidden" name="ID" value="'.$this->uri->segment(3).'"></p>';
    $Descripcion = $actualizarMaquina->Descripcion;
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
    <?php if($this->session->userdata('perfil')=='Administrador'){?>
    <form action="<?php echo base_url();?>maquinas/<?php echo $action;?>" method="post">
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
    <?php if(count($maquinasGuardadas)>0):?>
        <?php foreach($maquinasGuardadas as $maquina) : ?>
            <table>
                <tr><?php echo $maquina->ID; ?> -- </tr>
                <tr><?php echo $maquina->Descripcion; ?>     </tr>
                <?php if($this->session->userdata('perfil')=='Administrador'){?>
                <tr><a href="<?php echo base_url(); ?>maquinas/index/<?php echo $maquina->ID; ?>">modificar    </a></tr>
                <tr><a href="<?php echo base_url(); ?>maquinas/eliminar/<?php echo $maquina->ID; ?>">eliminar</a></p></tr>
                <?php } ?>
            </table>
        <?php endforeach; ?>
    <?php else :?>
        <h2>no hay maquinas registradas</h2>
    <?php endif; ?>
</body>
</html>