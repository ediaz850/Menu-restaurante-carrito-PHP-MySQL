<?php  
include('global/config_pdo.php');
include ('carrito.php');
include('templates/header.php');

$_mensaje="";
?>
		<br>
		
			<hr>
			<?php
			if($_mensaje!=""){?>
				<div class="alert alert-success">
					<?php echo $mensaje;?>
						<a href="MostrarCarrito.php" class="badge text-bg-success">Ver carrito</a>

				</div>

			<?php
			}
			
			?>

		<div class="col-12 text-center text-uppercase">
			<h1>Seleccione su Menu</h1>
		</div>
		<hr>
		<br>


		<div class="row">
			
		

			<?php
          	$query = $conn->prepare("SELECT * FROM comida WHERE COMIDA_CATEGORIA = 'PARA-TODOS';");
          	$query->execute();    

         	 $result= $query->FetchAll(PDO::FETCH_ASSOC); { 
          	
              	['COMIDA_NOMBRE']; 
            	['COMIDA_DESCRIPCION']; 
             	['COMIDA_PRECIO']; 
			  	['COMIDA_IMAGEN']; 
            
          
          	 } ?>

		  <?php
		  foreach($result as $producto){?>
				<div class ="col-3">
					<div class="card">
  						<img src="<?php echo $producto['COMIDA_IMAGEN'];?>" class="card-img-top" alt="<?php echo $producto['COMIDA_NOMBRE'];?>" data-bs-toggle="popover" data-trigger="hover" title="<?php echo $producto['COMIDA_DESCRIPCION'];?>" data-bs-content="<?php echo $producto['COMIDA_DESCRIPCION'];?>" height="290px">
						<div class="card-body">
						<span><strong><?php echo $producto['COMIDA_NOMBRE'];?></strong></span>
    					<h5 class="card-title">$ <?php echo $producto['COMIDA_PRECIO'];?></h5>
    					<p class="card-text">Descripción.</p>

						<form action="" method="post">
							<input type="hidden" name="id" id="id" value="<?php echo ($producto['COMIDA_ID']);?>">
							<input type="hidden" name="nombre" id="nombre" value="<?php echo($producto['COMIDA_NOMBRE']);?>">
							<input type="hidden" name="precio" id="precio" value="<?php echo ($producto['COMIDA_PRECIO']);?>">
							<input type="hidden" name="cantidad" id="cantidad" value="<?php echo 1;?>">

			
							<button type="submit" class="btn btn-danger" value="Agregar" name="btnAccion">Agregar al pedido</button>
						</form>
    					
 				 	</div>
				</div>
			
			</div>


		  <?php
		  
			}

		  ?>
			
			</div>	
		
	
		</div>
		<script>
			$(function(){
				$('[data-bs-toggle="popover"]').popover()
			});
			
		</script>

	
	<?php include ('templates/footer.php');?>