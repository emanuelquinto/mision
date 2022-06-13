<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD con PHP - MYSQL y BOOTSTRAP 5 :: WebDeveloper Urian Viera</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/home.css">
   
  </head>
<body>
<header class="header">
      <nav class="nav">
        <a href="#" class="logo nav-link "><img  src="imgs/LOGO-CESBA.png" alt=""></a>
        <button class="nav-toggle" aria-label="Abrir menú">
          <i class="fas fa-bars"></i>
        </button>
        <ul class="nav-menu">
          <li class="nav-menu-item">
            <a href="index.php" class="nav-menu-link nav-link ">HOME</a>
          </li>
          <li class="nav-menu-item">
            <a href="Cursos.php" class="nav-menu-link nav-link nav-menu-link_active ">CURSOS</a>
          </li>
          <li class="nav-menu-item">
            <a href="#" class="nav-menu-link nav-link">BASE DE DATOS</a>
          </li>
          <li class="nav-menu-item">
            <a href="#" class="nav-menu-link nav-link "
              >Control Escolar</a
            >
          </li>
        </ul>
      </nav>

    </header>
    <section class="marginate" >
<div class="container mt-3">
  <div class="row justify-content-md-center">
    <div class="col-md-6">
      <h1 class="text-center mt-3">USUARIO CESBA </h1>
      <hr class="mb-3">
    </div>
    <div class="col-md-6">
    <img  src="imgs/LOGO-CESBA.png" alt="">
      <hr class="mb-3">
    </div>

<?php
    include('config.php');
   $idver      = ($_REQUEST['id']);
    //$idAlumno      = (int) filter_var($_REQUEST['nombre'], FILTER_SANITIZE_NUMBER_INT);
    $sqlcurse   = ("SELECT * FROM curso WHERE  cursos='$idver' Limit 1; ");
    $querycurse = mysqli_query($con, $sqlcurse);
    $totacursos = mysqli_num_rows($querycurse);
?>
 
 <div class="col-md-8">
 <?php
    while ($datacurso = mysqli_fetch_array($querycurse)) { ?>
    <div class="card" style="width: 30rem;">
       
        <div class="card-body">
            <p class="card-text titleAlumno"><?php echo $datacurso['cursos']; ?></p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Curso:</strong> <?php echo $datacurso['cursos']; ?> </li>
            <li class="list-group-item"><strong>Asignatura:</strong> <?php echo $datacurso['asignatura']; ?></li>
         
            <li class="list-group-item"><strong>Clave</strong></strong>  <?php echo $datacurso['clave']; ?></li>       
            <li class="list-group-item"><strong>Plan estudios:</strong> <?php echo $datacurso['plan_estudios']; ?> </li>
            <li class="list-group-item"><strong>Rvoe:</strong> <?php echo $datacurso['rvoe']; ?></li>
            <li class="list-group-item"><strong>Carrera</strong></strong>  <?php echo $datacurso['carrera']; ?></li>
            <li class="list-group-item"><strong>Clave Carrera:</strong> <?php echo $datacurso['clave_carrera']; ?></li>
            <li class="list-group-item"><strong>Ciclo:</strong> <?php echo $datacurso['ciclo']; ?></li>
            <li class="list-group-item"><strong>Codigo</strong> <?php echo $datacurso['codigo']; ?></li>
           
        </ul>
        <div class="card-body">

        <div class="d-grid gap-2 col-12 mx-auto">
            <a href="./" class="btn btn-primary mt-3 mb-2">
                <i class="bi bi-arrow-left-circle"></i> 
                Volver
            </a>
        </div>
        </div>
    </div>
    <?php } ?>
 </div>



  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>