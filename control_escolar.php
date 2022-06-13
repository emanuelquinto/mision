<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MISION</title>
   
   
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
            <a href="index.php" class="nav-menu-link nav-link nav-menu-link_active ">HOME</a>
          </li>
         
          <li class="nav-menu-item">
            <a href="#" class="nav-menu-link nav-link">Usuarios</a>
          </li>
          
          <li class="nav-menu-item">
            <a href="#profile" class="nav-menu-link nav-link ">busqueda cursos</a>
            
          </li>
          <li class="nav-menu-item">
            <a href="#registros" class="nav-menu-link nav-link ">Registros</a>        
          </li>
         
        </ul>
      </nav>

    </header>
    <section class="marginate" >
    <div class="container mt-3">
       <div class="row justify-content-md-center">
         <div class="col-md-12"  >
            
               <img src="imgs/cursocesba.jpg" >
             
       </div>
        
 
   

   


    
    <?php
    include('config.php');
    $sqlnuevocurso   = ("SELECT * FROM usuarios ORDER BY id ASC");
    $querycursoceiba = mysqli_query($con, $sqlnuevocurso);
    $totalcursos = mysqli_num_rows($querycursoceiba);
            
    ?>
    <div class="col-md-12">
    <h3 class="text-center">Lista de Alumnos <?php echo '(' . $totalcursos . ')'; ?></h3>
      <div class="row">
        <div class="col-md-12 p-2">
          <div class="table-responsive" id="div1">
            <table  class="table table-bordered table-striped table-hover ">
              <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">matricula</th>
                  <th scope="col">email</th>
                  <th scope="col">nombre</th>                          
                  <th scope="col">paterno</th>
                  <th scope="col">materno</th>
                  <th scope="col">contraseña</th>
                  <th scope="col">carrera</th>
                  <th scope="col">nivel</th>
                  <th scope="col">tipo_usuario</th>
                  <th scope="col">fecha Registro</th>   
                 
                                                   
                </tr>
              </thead>
              <tbody>
              <?php
             
              while ($datacursos = mysqli_fetch_array($querycursoceiba)) { ?>
                <tr>
                  
                  <td><?php echo $datacursos['id']; ?></td>                   
                  <td><?php echo $datacursos['matricula']; ?></td>
                  <td><?php echo $datacursos['email']?></td>
                  <td><?php echo $datacursos['nombre']; ?></td>                  
                  <td><?php echo $datacursos['paterno']; ?></td>
                  <td><?php echo $datacursos['materno']; ?></td>
                  <td><?php echo $datacursos['contraseña']; ?></td>                   
                  <td><?php echo $datacursos['carrera']; ?></td>
                  <td><?php echo $datacursos['nivel']; ?></td>
                  <td><?php echo $datacursos['tipo_usuario']?></td>
                  <td><?php echo $datacursos['fechaRegistro']; ?></td>                  
                 
                
                           
                 
                </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

    </section >


    <section class="marginate" id="profile">
    <div class="container mt-3">
       <div class="row justify-content-md-center">
         <div class="col-md-12"  >
            
               <img src="imgs/cursocesba.jpg" >
             
       </div>
        
 
   

    <div class="col-md-3 mb-3 ">
     <div class="alineate">
     <h3 class="text-center">Busqueda de Cursos</h3>
      <form method="GET" action="" enctype="multipart/form-data">
       
      <div class="mb-3">
          <label class="form-label">Nombre del curso</label>
          <input type="text" class="form-control" name="listadoC" required>
        </div>
          
        <div class="d-grid gap-2 col-12 mx-auto">
          <button type="submit" class="btn  btn btn-primary mt-3 mb-2">
            Busqueda
            <i class="bi bi-arrow-right-circle"></i>
          </button>
          </div>
        
          </form>
       </div>
     
    </div>


    
    <?php
  

    
   
   
    
    ?>
    <div class="col-md-9">
    <h3 class="text-center">Lista de busqueda </h3>
      <div class="row">
        <div class="col-md-12 p-2">
          <div class="table-responsive" id="div1">
            <table  class="table table-bordered table-striped table-hover ">
              <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">cursos</th>
                  <th scope="col">asignatura</th>
                  <th scope="col">clave</th> 
                  <th scope="col">codigo</th>                          
                  <th scope="col">carrera</th>
                  <th scope="col">plan des Estudios</th>
                                                       
                </tr>
              </thead>
              <tbody>
              <?php
             if (isset($_GET['listadoC'])) {
              $busqueda=$_GET['listadoC'];
              $consulta="SELECT * FROM curso WHERE cursos LIKE '%$busqueda%'";
              $visitar=mysqli_query($con,$consulta);
              ?>
             <?php while ($busquedacursos = mysqli_fetch_array($visitar)) { ?>
                <tr>
                  
                  <td><?php echo $busquedacursos['id']; ?></td>                   
                  <td><?php echo $busquedacursos['cursos']; ?></td>
                  <td><?php echo $busquedacursos['asignatura']?></td>
                  <td><?php echo $busquedacursos['clave']; ?></td>
                  <td><?php echo $busquedacursos['codigo']; ?></td>                  
                  <td><?php echo $busquedacursos['carrera']; ?></td>
                  <td><?php echo $busquedacursos['plan_estudios']; ?></td>
                           
                 
                </tr>
                <?php   }?>
            
              <?php
           }else {
            echo " no hay Caracter similar";
          }
               
               
               
               ?>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

    </section>





    <section class="marginate" id="registros">
    <div class="container mt-3">
       <div class="row justify-content-md-center">
         <div class="col-md-12"  >
            
               <img src="imgs/cursocesba.jpg" >
             
       </div>
        
 
   

    <div class="col-md-3 mb-3 ">
     <div class="alineate">
     <h3 class="text-center">Rolar a curso</h3>
      <form method="GET" action="" enctype="multipart/form-data">
    
      <div class="mb-3">
          <label class="form-label">Codigo de curso</label>
          <input type="text" class="form-control" name="codigo" required>
        </div>
     <div class="mb-3">
          <label class="form-label">matricula</label>
          <input type="text" class="form-control" name="matricula" required>
    </div>    
        <div class="d-grid gap-2 col-12 mx-auto">
          <button type="submit" name="click" class="btn  btn btn-primary mt-3 mb-2">
            Añadir Curso
            <i class="bi bi-arrow-right-circle"></i>
          </button>
          </div>
        
          </form>
       </div>
     
    </div>


    
    <?php
  

    
   
   
    
    ?>
    <div class="col-md-9">
    <h3 class="text-center">Lista de busqueda </h3>
      <div class="row">
        <div class="col-md-12 p-2">
          <div class="table-responsive" id="div1">
            <table  class="table table-bordered table-striped table-hover ">
              <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">usuario id</th>
                  <th scope="col">Curso id</th>
                  <th scope="col">Activo</th> 
                 
                                                       
                </tr>
              </thead>
              <tbody>
              <?php
              

             if (isset($_GET['click'])) {
              $busqueda1=$_GET['codigo'];
              $busqued2=$_GET['matricula'];
              $variable=1;
              $insertarDos=$con->query("INSERT INTO usuarios_cursos(usuario_id,curso_id,activo) values ('$busqueda1', '$busqued2', 1)");
             }
                           
              $sqlcu   = ("SELECT id,usuario_id,curso_id,activo FROM usuarios_cursos ORDER BY id ASC");
             $queryverifica = mysqli_query($con, $sqlcu);
              ?>
             <?php while ($busque = mysqli_fetch_array($queryverifica)) { ?>
                <tr>
                  
                  <td><?php echo $busque['id']; ?></td>                   
                  <td><?php echo $busque['usuario_id']; ?></td>
                  <td><?php echo $busque['curso_id']?></td>
                  <td><?php echo $busque['activo']; ?></td>
                
                           
                 
                </tr>
                <?php   }?>
            
           
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

    </section>
<?php
  include('mensajes.php'); 
?>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
$(function(){
  $('.toast').toast('show');
});
</script>

</body>
</html>