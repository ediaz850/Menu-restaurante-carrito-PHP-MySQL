<?php  
include('global/config_pdo.php');
include ('carrito.php');
include('templates/header.php');

$_mensaje="";
?>

<?php
if (!empty($_SESSION['carrito'])){
    $total=0;
    $sid=session_id();
    
    foreach($_SESSION['carrito']as $indice=>$producto){
        $total= $total+($producto['precio']*$producto['cantidad']);
     
        
    }
    
    ?> 
    <div class="container mt-3">
  <h2>Confirmacion de Pedido</h2>
  
  <table class="table table-bordered table-sm">
    <thead>
      <tr>
        <th>Monto a Cancelar</th>
        </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo number_format($total,2); ?></td>
        </tr>
    </tbody>
  </table>
    </div>

    <form action="confirmar_pedido.php"method="post">
    <button class="btn btn-danger" type="submit" name = "btnConfirmar">Confirmar Pedido</button>
    </form>
    <br>


    <?php
    //Captura de variables  
 
        $ciudad= ($_POST['ciudad']);
        $comuna= ($_POST['comuna']);
        $calle= ($_POST['calle']);
        $nombre= ($_POST['nombre']);
        $telefono= ($_POST['telefono']);
         $correo= ($_POST['email']);
        /* Se registra direccion de cliente */
        $reg_sql = $conn->prepare("INSERT INTO direccion( DIRECCION_NUMERO_CALLE, DIRECCION_COMUNA, DIRECCION_CIUDAD) VALUES ( :DIRECCION_NUMERO_CALLE, :DIRECCION_COMUNA, :DIRECCION_CIUDAD)");
        $reg_sql->bindParam(':DIRECCION_NUMERO_CALLE', $calle);
        $reg_sql->bindParam(':DIRECCION_COMUNA', $comuna);
        $reg_sql->bindParam(':DIRECCION_CIUDAD', $ciudad);
       
        $reg_sql->execute();
      
        $last_id = $conn->lastInsertId();//funcion insert_id 
     
        /* Registro de datos del cliente*/
        $reg_sql = $conn->prepare ("INSERT INTO clientes( CLIENTE_NOMBRE, CLIENTE_TELEFONO, CLIENTE_CORREO, CLIENTE_DIRECCION_ID) VALUES (:CLIENTE_NOMBRE, :CLIENTE_TELEFONO, :CLIENTE_CORREO, :CLIENTE_DIRECCION_ID)");
        $reg_sql->bindParam(':CLIENTE_NOMBRE', $nombre);
        $reg_sql->bindParam(':CLIENTE_TELEFONO', $telefono);
        $reg_sql->bindParam(':CLIENTE_CORREO', $correo);
        $reg_sql->bindParam(':CLIENTE_DIRECCION_ID', $last_id);
        
        $reg_sql->execute();
        $last_id_2 = $conn->lastInsertId();//funcion insert_id
    
    


      $status= "pendiente";
      
      $reg_sql = $conn->prepare ("INSERT INTO `ventas`( CLAVE_TRANSACCION , TOTAL , CLIENTE_VENTA_ID , ESTADO ) VALUES (:CLAVE_TRANSACCION ,:TOTAL , :CLIENTE_VENTA_ID , :ESTADO)");
      $reg_sql->bindParam(':CLAVE_TRANSACCION', $sid);
      $reg_sql->bindParam(':TOTAL', $total );
      $reg_sql->bindParam(':CLIENTE_VENTA_ID', $last_id_2);
      $reg_sql->bindParam(':ESTADO', $status);
        
      $reg_sql->execute();
      $last_id_3 =  $conn->lastInsertId();//funcion insert_id

    
      if (!empty($_SESSION['carrito'])){
        
            foreach($_SESSION['carrito'] as $indice=>$producto){
              $reg_sql = $conn->prepare ("INSERT INTO `detalle_ventas`( ID_VENTA, COMIDA_ID, COMIDA_NOMBRE, PRECIO, CANTIDAD ) VALUES (:ID_VENTA, :COMIDA_ID, :COMIDA_NOMBRE, :PRECIO, :CANTIDAD)");
              $reg_sql->bindParam(':ID_VENTA', $last_id_3);
              $reg_sql->bindParam(':COMIDA_ID', $producto['id'] );
              $reg_sql->bindParam(':COMIDA_NOMBRE', $producto['nombre'] );
              $reg_sql->bindParam(':PRECIO', $producto['precio']);
              $reg_sql->bindParam(':CANTIDAD', $producto['cantidad']);
              $reg_sql->execute();
      
            }
      
      } 
      

      $reg_sql = $conn->prepare("INSERT INTO `pedidos`( NOMBRE, DIRECCION, COMUNA, CALLE, VENTA_PEDIDO, TOTAL) VALUES (:NOMBRE, :DIRECCION, :COMUNA, :CALLE, :VENTA_PEDIDO, :TOTAL)");
      $reg_sql->bindParam(':NOMBRE', $nombre );
      $reg_sql->bindParam(':DIRECCION', $ciudad);
      $reg_sql->bindParam(':COMUNA', $comuna);
      $reg_sql->bindParam(':CALLE', $calle);
      $reg_sql->bindParam(':VENTA_PEDIDO',$last_id_3);
      $reg_sql->bindParam(':TOTAL', $total);
      $reg_sql->execute();
            

            if ($reg_sql = 1) {
              ?> 
            <div class="alert alert-success">¡DATOS REGISTRADOS CORRECTAMENTE!</div>
             <?php
            } else {
              ?> 
            <div class="alert alert-success">¡UPS HA OCURRIDO UN ERROR !</div>
            <?php
            }
            
           

         
      
    
        ?>
  
  



<?php
}

session_unset();

$conn = null;

?>




























	
<?php include ('templates/footer.php');?>
	