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
            <a href="index.php" class="nav-menu-link nav-link ">HOME</a>
          </li>
          <li class="nav-menu-item">
            <a href="#" class="nav-menu-link nav-link nav-menu-link_active">CURSOS</a>
          </li>
          <li class="nav-menu-item">
            <a href="#profile" class="nav-menu-link nav-link"> Buscar Curso</a>
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
        
 
   

    <div class="col-md-3 mb-3 ">
     <div class="alineate">
     <h3 class="text-center">Create Nuevo Curso</h3>
      <form method="POST" action="action.php" enctype="multipart/form-data">
        <input type="text" name="metodo" value="4" hidden>
      <div class="mb-3">
          <label class="form-label">Nombre del curso</label>
          <input type="text" class="form-control" name="curso" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Asignatura</label>
          <select name="asignatura" id="usuario">
              <option value="">Asignatura</option>
              <option value="Programacion">Programacion</option>
              <option value="Redes">Redes</option>
              <option value="diseño">diseño</option>
              <option value="diplomado">diplomado</option>
              <option value="ciencias">ciencias</option>
              <option value="virtualizacion">virtualizacion</option>           
            </select> 
        </div>   

        <div class="d-grid gap-2 col-12 mx-auto">
          <button type="submit" class="btn  btn btn-primary mt-3 mb-2">
            REGISTER
            <i class="bi bi-arrow-right-circle"></i>
          </button>
          </div>
        
          </form>
       </div>
     
    </div>


    
    <?php
    include('config.php');
    $sqlnuevocurso   = ("SELECT id,cursos,asignatura,clave,carrera,plan_estudios FROM curso ORDER BY id ASC");
    $querycursoceiba = mysqli_query($con, $sqlnuevocurso);
    $totalcursos = mysqli_num_rows($querycursoceiba);

    ?>
    <div class="col-md-9">
    <h3 class="text-center">Lista de Alumnos <?php echo '(' . $totalcursos . ')'; ?></h3>
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
                  <th scope="col">carrera</th>
                  <th scope="col">plan des Estudios</th>
                  <th scope="col">ajustes</th>                                     
                </tr>
              </thead>
              <tbody>
              <?php
             
              while ($datacursos = mysqli_fetch_array($querycursoceiba)) { ?>
                <tr>
                  
                  <td><?php echo $datacursos['id']; ?></td>                   
                  <td><?php echo $datacursos['cursos']; ?></td>
                  <td><?php echo $datacursos['asignatura']?></td>
                  <td><?php echo $datacursos['clave']; ?></td>                  
                  <td><?php echo $datacursos['carrera']; ?></td>
                  <td><?php echo $datacursos['plan_estudios']; ?></td>
                           
                  <td>
                  <a href="vercurso.php?id=<?php echo $datacursos['cursos']; ?>" class="btn btn-warning mb-2"   title="Ver datos del alumno <?php echo $datacursos['id']; ?>">
                  <i class="bi bi-tv"></i> Ver</a>
                    <a href="cursoeditar.php?id=<?php echo $datacursos['id']; ?>" class="btn btn-info mb-2"   title="Actualizar datos del alumno <?php echo $datacursos['id']; ?>">
                    <i class="bi bi-arrow-clockwise"></i> Actualizar</a>
                    <a href="action.php?id=<?php echo $datacursos['cursos']; ?>&metodo=6&id=<?php echo $datacursos['cursos']; ?>" class="btn btn-danger mb-2" title="Borrar el alumno <?php echo $dataAlumno['id']; ?>">
                    <i class="bi bi-trash"></i> Borrar</a>
                  </td>
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