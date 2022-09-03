<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Menu</title>
	<!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/acf596811c.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="">
	<style>
		html{
			height:100%;
		}

		body{
			display: flex;
			flex-direction: column;
			min-height: 100%;
		}
		footer{
			margin-top:auto;
		}
		.col-3{
			margin-bottom: 30px;
		}
	</style>
</head>

<header>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  		<div class="container-fluid">
    		<a class="navbar-brand" href="index.php">LA CHITREANA</a>
			
			
    		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      		<span class="navbar-toggler-icon"></span>
    		</button>
    		<div class="collapse navbar-collapse" id="collapsibleNavbar">
      			<ul class="navbar-nav">
				  <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Desayunos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tradicionales.php">Tradicionales</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="para_todos.php">Para Todos</a>
        </li>
        		
        		<li class="nav-item">
          			<a class="nav-link" href="MostrarCarrito.php"><i class="fa-solid fa-cart-shopping"></i>(<?php 
					echo (empty($_SESSION['carrito']))?0:count($_SESSION['carrito']);
					?>)</a>
        		</li>
        		  
        	</ul>
        	
      		
    		</div>
  		</div>

	</nav>
	
</header>


<body>

<div class ="container">