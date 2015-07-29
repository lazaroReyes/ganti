<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Compra</title>
    <style type="text/css">
        body {
         background-color: #fff;
         margin: 40px;
         font-family: Lucida Grande, Verdana, Sans-serif;
         font-size: 14px;
         color: #4F5155;
        }
 
        a {
         color: #003399;
         background-color: transparent;
         font-weight: normal;
        }
 
        h1 {
         color: #444;
         background-color: transparent;
         border-bottom: 1px solid #D0D0D0;
         font-size: 16px;
         font-weight: bold;
         margin: 24px 0 2px 0;
         padding: 5px 0 6px 0;
        }
 
        h2 {
         color: #444;
         background-color: transparent;
         border-bottom: 1px solid #D0D0D0;
         font-size: 16px;
         font-weight: bold;
         margin: 24px 0 2px 0;
         padding: 5px 0 6px 0;
         text-align: center;
        }
 
        table{
            text-align: left;
        }
 
        /* estilos para el footer y el numero de pagina */
        @page { margin: 180px 50px; }
        #header { 
            position: fixed; 
            left: 0px; top: -180px; 
            right: 0px; 
            height: 150px; 
            background-color: #333; 
            color: #fff;
            text-align: center; 
        }
        #footer { 
            position: fixed; 
            left: 0px; 
            bottom: -180px; 
            right: 0px; 
            height: 150px; 
            background-color: #333; 
            color: #fff;
        }
        #footer .page:after { 
            content: counter(page, upper-roman); 
        }
    </style>
</head>
<body>
    <!--header para cada pagina-->
    <div id="header">
        <?php echo $title ?>
    </div>
    <!--footer para cada pagina-->
    <div id="footer">
        <!--aqui se muestra el numero de la pagina en numeros romanos-->
        <p class="page"></p>
    </div>
    <h2>Compra No <?php echo $compra->ID; ?></h2>
    <table>
        <tbody>
                <tr>
                    <td>ID </td>
                    <td><?php echo $compra->ID; ?></td>
                </tr>
                <tr>
                    <td>Producto</td>
                    <td><?php foreach ($productosGuardados as $productos) :  if ($compra->IDProducto == $productos->ID) {
                            echo $productos->Descripcion;
                            break;
                        } endforeach; ?></td>
                </tr>
                <tr>
                    <td>Descripcion</td><td><?php echo $compra->Descripcion; ?></td>
                </tr>
                <tr>
                    <td>Cantidad</td>
                    <td><?php echo $compra->Cantidad; ?></td>
                </tr>
                <tr>
                    <td>Costo</td>
                    <td><?php echo $compra->Costo; ?></td>
                </tr>
                <tr>
                    <td>No de Factura</td>
                    <td><?php echo $compra->NoFactura; ?></td>
                </tr>
                <tr>
                    <td>Metodo de pago</td>
                    <td><?php echo $compra->MetodoPago; ?></td>
                </tr>
                <tr>
                    <td>Proveedor</td>
                    <td><?php foreach ($proveedoresGuardados as $proveedor) :  if ($compra->IDProveedor == $proveedor->ID) {
                            echo $proveedor->Nombre;
                            break;
                        } endforeach; ?></td>
                </tr>
                <tr>
                    <td>Estado de compra</td>
                    <td><?php echo $compra->EstadoDeCompra; ?></td>
                </tr>
                <tr>
                    <td>Usuario</td>
                    <td><?php foreach ($usuariosGuardados as $usuarios) :  if ($compra->IDUsuario == $usuarios->ID) {
                            echo $usuarios->username;
                            break;
                        } endforeach; ?></td>
                </tr>
                <tr>
                    <td>Tarjeta</td>
                    <td><?php foreach ($tarjetasGuardadas as $tarjeta) : if ($compra->IDTarjeta == $tarjeta->ID) {
                            echo $tarjeta->Descripcion;
                            break;
                        } endforeach; ?></td>
                </tr>
                <tr>
                    <td>Maquina</td>
                    <td><?php foreach ($maquinasGuardadas as $maquina) :  if ($compra->IDMaquina == $maquina->ID) {
                            echo $maquina->Descripcion;
                            break;
                        } endforeach; ?></td>
                </tr>
                <tr>
                    <td>Departamento</td>
                    <td><?php foreach ($minasGuardadas as $minas) :  if ($compra->IDMina == $minas->ID) {
                            echo $minas->Nombre;
                            break;
                        } endforeach; ?></td>
                </tr>
                <tr>
                    <td>Fecha de Requisicion</td>
                    <td><?php echo $compra->FechaRequerido; ?></td>
                </tr>
                <tr>
                    <td>Fecha de Pedido</td>
                    <td><?php echo $compra->FechaPedido; ?></td>
                </tr>
                <tr>
                    <td>Fecha de envio a mina</td>
                    <td><?php echo $compra->FechaEnviado; ?></td>
                </tr>
                <tr>
                    <td>Fecha de recibido en mina</td>
                    <td><?php echo $compra->FechaRecibido; ?></td>
                </tr>
        </tbody>
    </table>
</body>
</html>