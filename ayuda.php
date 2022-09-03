<section>
<div class="container mt-3">
    
        
            <form action="MostrarCarrito.php" method="post">
                <div >
                            
                    <div class="mb-3 mt-3">
                        <div class="container mt-3">
                            
                                <?php
                                    if (!empty($_SESSION['carrito'])){
                                     ?>
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th width="15%" class="text-center">Producto</th>
                                                    <th width="30%">Descripcion</th>
                                                    <th width="15%" class="text-center">Cantidad</th>
                                                    <th width="20%" class="text-center">Precio</th>
                                                    <th width="20%" class="text-center">Total</th>
                                                    
                                                </tr>
                                            </thead>
                            
                                            <tbody>
                                                <?php $total=0;?>
                                                    <?php foreach($_SESSION['carrito'] as $indice=>$producto){?>
                                                        <tr>
                                                            <td width="30%"><?php echo $producto['nombre']?></td>
                                                            <td width="15%" class="text-center"><?php echo $producto['cantidad']?></td>
                                                            <td width="20%" class="text-center"><?php echo $producto['precio']?></td>
                                                            <td width="20%" class="text-center"><?php echo number_format($producto['precio']* $producto['cantidad'],2);?></td>
                                
                                                        </tr>
                                                            <?php $total=$total+($producto['precio']* $producto['cantidad']);?>
                                                            <?php
                                                                }?>
                                                        <tr>
                                                            <td colspan="3" align="right"> <h3>Total</h3></td>
                                                            <td align="right"><h3><?php echo number_format($total,2);?></h3></td>
                                                            </tr>
                    
                        </div>
                            
                    
                    </div>
            
                </div>

            </form>
        
        
    
                                            </tbody>



                              
                                    <?php
                                    }
                                     ?>
</div>
</section>