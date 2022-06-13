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
        <a href="index.php" class="logo nav-link "><img  src="imgs/LOGO-CESBA.png" alt=""></a>
        <button class="nav-toggle" aria-label="Abrir menú">
          <i class="fas fa-bars"></i>
        </button>
        <ul class="nav-menu">
          <li class="nav-menu-item">
            <a href="index.php" class="nav-menu-link nav-link ">HOME</a>
          </li>
          <li class="nav-menu-item">
            <a href="Cursos.php" class="nav-menu-link nav-link nav-menu-link_active">Cursos</a>
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
    <div class="col-md-12">
      <h1 class="text-center mt-3">
        <a href="./">
          <i class="bi bi-arrow-left-circle"></i>
        </a>
       Cursos
      </h1>
      <hr class="mb-3">
    </div>


    
    <?php
    include('config.php');
    $idcurso    = ($_REQUEST['id']);
    $sqltabla_cursos   = ("SELECT * FROM curso WHERE id='$idcurso' ");
    $querycursos = mysqli_query($con, $sqltabla_cursos);
    $dataeditarlo   = mysqli_fetch_array($querycursos);
    ?>

    <div class="col-md-5 mb-3">
      <h3 class="text-center">Curso : <?php echo $dataeditarlo['cursos']; ?></h3>
      <form method="POST" action="action.php?metodo=5" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $dataeditarlo['id']; ?>" >
      <div class="mb-3">       
          <input type="text" class="form-control" placeholder="cursos" name="cursos" value="<?php echo $dataeditarlo['cursos']; ?>">
        </div>
        <div class="mb-3">        
          <input type="text" name="asignatura" placeholder="asignatura" class="form-control" value="<?php echo $dataeditarlo['asignatura']; ?>">
        </div>
        <div class="mb-3">       
          <input type="text" class="form-control" placeholder="clave" name="clave" value="<?php echo $dataeditarlo['clave']; ?>">
        </div>
        <div class="mb-3">        
          <input type="text" name="plan_estudios"  placeholder="plan_estudios"class="form-control" value="<?php echo $dataeditarlo['plan_estudios']; ?>">
        </div>

        <div class="mb-3">       
          <input type="text" class="form-control" placeholder="rvoe" name="rvoe" value="<?php echo $dataeditarlo['rvoe']; ?>">
        </div>
        <div class="mb-3">        
          <input type="text" name="carrera" placeholder="carrera" class="form-control" value="<?php echo $dataeditarlo['carrera']; ?>">
        </div>

        <div class="mb-3">       
          <input type="text" class="form-control" placeholder="nivel" name="nivel" value="<?php echo $dataeditarlo['nivel']; ?>">
        </div>
        <div class="mb-3">       
          <input type="text" class="form-control" placeholder="clave_carrera"name="clave_carrera" value="<?php echo $dataeditarlo['clave_carrera']; ?>">
        </div>
        <div class="mb-3">        
          <input type="text" name="ciclo" placeholder="ciclo" class="form-control" value="<?php echo $dataeditarlo['ciclo']; ?>">
        </div>
        <div class="mb-3">       
          <input type="text" class="form-control" placeholder="codigo"name="codigo" value="<?php echo $dataeditarlo['codigo']; ?>">
        </div>
        
       

        <div class="d-grid gap-2 col-12 mx-auto">
          <button type="submit" class="btn  btn btn-primary mt-3 mb-2">
            Actualizar curso ->
            <i class="bi bi-arrow-right-circle"></i>
          </button>
        </div>
        
      </form>
    </div>

   


  </div>
</div>

<?php
  include('mensajes.php'); 
?>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
$(function(){
  $('.toast').toast('show');
});
</script>

</body>
</html>