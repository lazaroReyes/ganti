<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <title><?php echo $titulo;?></title>
</head>
<header>Usos</header>
<?php
if(isset($actualizarUso)){
    $ID = '<p><input type="hidden" name="ID" value="'.$this->uri->segment(3).'"></p>';
    $IDMina = $actualizarUso->IDMina;
    $IDProducto = $actualizarUso->IDProducto;
    $Cantidad = $actualizarUso->Cantidad;
    $IDUsuario = $actualizarUso->IDUsuario;
    $Fecha = $actualizarUso->Fecha;
    $action = 'actualizar';
    $button = 'Actualizar';
}else{
    $ID = '';
    $IDMina = '';
    $IDProducto = '';
    $Cantidad = '';
    $IDUsuario = '';
    $Fecha = '';
    $action = 'insertar';
    $button = 'Guardar';
}
?>
<body>
<form action="<?php echo base_url();?>usos/<?php echo $action;?>" method="post">
    <?php echo $ID; ?>
    <select name="IDMina">
        <?php foreach($minasGuardadas as $mina) :?>
        <option value="<?php echo $mina->ID?>"><?php echo $mina->Nombre?></option>
        <?php endforeach; ?>
    </select>
    <select name="IDProducto">
        <?php foreach($productosGuardados as $producto) :?>
            <option value="<?php echo $producto->ID?>"><?php echo $producto->Descripcion?></option>
        <?php endforeach; ?>
    </select>
    <p><label>Cantidad:</label><input type="text" name="Cantidad" value="<?php echo $Cantidad?>"/></p>
    <p><input type="hidden" name="IDUsuario" value="<?=$this->session->userdata('id_usuario')?>"></p>
    <?=$this->session->userdata('id_usuario')?>
    <p><label>Fecha de uso:</label><input type="date" name="Fecha" value="<?php echo $Fecha?>"/></p>
    <p><input type="submit" name="guardar" value="<?php echo $button?>" /></p>
    <?php
    $actualizar = $this->session->flashdata('actualizado');
    if ($actualizar) {
        ?><td colspan="5" id="actualizadoCorrectamente"><?= $actualizar ?></td>
    <?php
    }
    ?>
</form>
<?php if(count($usosGuardados)>0):?>

    <?php foreach($usosGuardados as $uso) : ?>
        <table>
            <tr><?php echo $uso->ID;?> -- </tr>
            <tr><?php foreach ($minasGuardadas as $minas) :  if ($uso->IDMina==$minas->ID){ echo $minas->Nombre; break;} endforeach; ?>  -- </tr>
            <tr><?php foreach ($productosGuardados as $productos) :  if ($uso->IDProducto==$productos->ID){ echo $productos->Descripcion; break;} endforeach; ?>  -- </tr>
            <tr><?php echo $uso->Cantidad; ?>  -- </tr>
            <tr><?php foreach ($usuariosGuardados as $usuarios) :  if ($uso->IDUsuario==$usuarios->ID){ echo $usuarios->username; break;} endforeach; ?>  -- </tr>
            <tr><?php echo $uso->Fecha; ?>     </tr>
            <tr><a href="<?php echo base_url(); ?>usos/index/<?php echo $uso->ID; ?>">modificar    </a></tr>
            <tr><a href="<?php echo base_url(); ?>usos/eliminar/<?php echo $uso->ID; ?>">eliminar</a></p></tr>
        </table>
    <?php endforeach; ?>
<?php else :?>
    <h2>no hay usos registrados</h2>
<?php endif; ?>
</body>
</html>