<?php
session_start();
$mensaje="";

if(isset($_POST['btnEliminar'])){
  $id = ($_POST['id']);
  foreach($_SESSION['carrito'] as $indice=>$producto){
    if($producto['id']==$id){
      unset($_SESSION['carrito'][$indice]);
      //echo "<script>alert('Elemento Borrado...');</script>";
    }

  }

}

if (isset($_POST['btnAccion'])){
      $id= ($_POST['id']);
    $nombre= ($_POST['nombre']);
    $precio= ($_POST['precio']);
    $cantidad= ($_POST['cantidad']);
    

  if(!isset($_SESSION['carrito'])){
  $producto=array(
      'id'=>$id,
      'nombre'=>$nombre,
      'cantidad'=>$cantidad,
      'precio'=>$precio,
  );

  $_SESSION['carrito'][0]=$producto;

  } else{
      $NumeroProductos=count($_SESSION['carrito']);
      $producto=array(
          'id'=>$id,
          'nombre'=>$nombre,
          'cantidad'=>$cantidad,
          'precio'=>$precio,
      );
      $_SESSION['carrito'][$NumeroProductos]=$producto;
  }
  
      
  
} 




//$mensaje = print_r($_SESSION,true);
  
  
?>