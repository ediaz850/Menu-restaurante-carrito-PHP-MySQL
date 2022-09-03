<?php  

include ('global/config_pdo.php');
include ('carrito.php');
include ('templates/header.php');

?>

<div class="container mt-3">
  <h2>Lista de Carrito</h2>
    <?php
    if (!empty($_SESSION['carrito'])){
        ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="40%">Descripcion</th>
                    <th width="15%" class="text-center">Cantidad</th>
                    <th width="20%" class="text-center">Precio</th>
                    <th width="20%" class="text-center">Total</th>
                    <th width="5%" class="text-center">Accion</th>
                </tr>
            </thead>
            <tbody>
                    <?php $total=0;?>
                    <?php foreach($_SESSION['carrito'] as $indice=>$producto){?>
                        <tr>
                            <td width="40%"><?php echo $producto['nombre']?></td>
                            <td width="15%" class="text-center"><?php echo $producto['cantidad']?></td>
                            <td width="20%" class="text-center"><?php echo $producto['precio']?></td>
                            <td width="20%" class="text-center"><?php echo number_format($producto['precio']* $producto['cantidad'],2);?></td>
                            
                            <form action="" method="post">
                            <input type="hidden" name="id" id="id" value="<?php echo ($producto['id']);?>">
                            <td width="5%"><button class="btn btn-danger"type="submit" name="btnEliminar" value="Eliminar"><i class="fa-solid fa-trash-can"></i></button></td>
                            </form>
                        </tr>
                        <?php $total=$total+($producto['precio']* $producto['cantidad']);?>
                    <?php }?>
                <tr>
                    <td colspan="3" align="right"> <h3>Total</h3></td>
                    <td align="right"><h3><?php echo number_format($total,2);?></h3></td>
                    <td></td>


                </tr>
                <tr>
                    <td colspan ="5">
                        <form action="registro_datos.php" method="post">
                            <div >
                            
                                <div class="mb-3 mt-3">
                                    <div>
                                        <button class="btn btn-danger" type="submit" name = "btnPagar">Finalizar Compra</button>
                                    </div>
                                </div>
                            
                            </div>

                        </form>
                        
                    </td>
                </tr>
            </tbody>
        </table>
        
        

    <?php
    }else{ 
    ?>
            <div class="alert alert-success">
            No hay productos en el carrito...
            </div>
            <?php
        }
        ?> 
</div>







<hr><?php include ('templates/footer.php');?><hr>

