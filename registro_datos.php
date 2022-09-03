<?php 
include('global/config_pdo.php');
include ('carrito.php');
include('templates/header.php');

?>
<br>
<br>

<div class="container mt-3">
  
  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Modal">
    Ver Pedido
  </button>
</div>



<form action="pagar.php" method="post">
<h1 align="center">REGISTRE SUS DATOS</h1>
                    <h2 >Datos del Cliente</h2>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Ciudad:</label>
    <input type="text" id="ciudad"  class="form-control" name="ciudad" placeholder="Ingrese su ciudad.." required>
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Comuna:</label>
    <input type="text" id="comuna" class="form-control" name="comuna" placeholder="Ingrese su comuna.." required>
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Calle:</label>
    <input type="text" id="calle" class="form-control" name="calle" placeholder="Ingrese su calle.." required>
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Nombre:</label>
    <input type="text" id="nombre" class="form-control" name="nombre" placeholder="Ingrese su nombre.." required>
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Telefono:</label>
    <input type="text" id="telefono" class="form-control" name="telefono" placeholder="Ingrese su numero de telefono.." required>
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Email:</label>
    <input type="email" class="form-control" id="email" placeholder="Ingrese su Email" name="email" required>
    <small id="emailhelp" clas="form-text text-muted"></small>
                                
  </div>
  
  <button type="submit" class="btn btn-success" name= "register">Registrar Datos</button>
</form>
<br>
<div class="alert alert-success">    
    <p>
    Al registrarse acepta nuestras politicas de uso y privacidad.
    </p>
</div>

                                        


<main class="container">
<!-- The Modal -->
<div class="modal" id="Modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Detalle de Pedido</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
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
                                            
                                            <th width="40%">Descripcion</th>
                                            <th width="20%" class="text-center">Cantidad</th>
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
        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
</main>



	<?php include ('templates/footer.php');?>

