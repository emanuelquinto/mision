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
    
    <!-- https://icons.getbootstrap.com/ -->
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
            <a href="#" class="nav-menu-link nav-link  nav-menu-link_active">HOME</a>
          </li>
          <li class="nav-menu-item">
            <a href="Cursos.php" class="nav-menu-link nav-link">Cursos</a>
          </li>
          <li class="nav-menu-item">
            <a href="#profile" class="nav-menu-link nav-link">Busqueda</a>
          </li>
          <li class="nav-menu-item">
            <a href="control_escolar.php" class="nav-menu-link nav-link "
              >Control</a
            >
          </li>
        </ul>
      </nav>

    </header>
    <section class="marginate" >
    <div class="container mt-3">
       <div class="row justify-content-md-center">
         <div class="col-md-12"  >
            
               <img src="imgs/grup.jpg" >
             
       </div>
        
 
   

    <div class="col-md-3 mb-3 ">
     <div class="alineate">
     <h3 class="text-center">Datos del Usuario</h3>
      <form method="POST" action="action.php" enctype="multipart/form-data">
        <input type="text" name="metodo" value="1" hidden>
      <div class="mb-3">
          <label class="form-label">Nombre</label>
          <input type="text" class="form-control" name="namefull" required>
        </div>
        

        <div class="mb-3">
        <label for="tipo_de_ususario">tipo de usuario</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="tipo_de_ususario" value="Alumno" checked>
            <label class="form-check-label" for="Alumno">
             Alumno
            </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="tipo_de_ususario" value="Profesor">
          <label class="form-check-label" for="Profesor">
            Docente
          </label>
        </div>
        </div>
        
        <div class="mb-3">
          <label for="formFile" class="form-label">FOTO DE USUARIO</label>
          <input class="form-control" type="file" name="foto" accept="image/png,image/jpeg" required>
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
    $sqlAlumnos   = ("SELECT id,nombre,tipo_usuario,matricula,carrera FROM usuarios ORDER BY id ASC");
    $queryAlumnos = mysqli_query($con, $sqlAlumnos);
    $totalAlumnos = mysqli_num_rows($queryAlumnos);

    ?>
    <div class="col-md-9">
    <h3 class="text-center">Lista de Alumnos <?php echo '(' . $totalAlumnos . ')'; ?></h3>
      <div class="row">
        <div class="col-md-12 p-2">
          <div class="table-responsive" id="div1">
            <table  class="table table-bordered table-striped table-hover ">
              <thead>
                <tr>
                  <th>id</th>
                  <th scope="col">nombre</th>
                  <th scope="col">tipo_usuario</th>
                  <th scope="col">matricula</th>            
                  <th scope="col">carrera</th>
                  <th scope="col">Ajustes</th>
              
                  
                </tr>
              </thead>
              <tbody>
              <?php
              $conteo =1;
              while ($dataAlumno = mysqli_fetch_array($queryAlumnos)) { ?>
                <tr>
                  
                  <td><?php echo $dataAlumno['id']; ?></td>                   
                  <td><?php echo $dataAlumno['nombre']; ?></td>
                  <td><?php echo $dataAlumno['tipo_usuario']?></td>
                  <td><?php echo $dataAlumno['matricula']; ?></td>                  
                  <td><?php echo $dataAlumno['carrera']; ?></td>
                 
                  
                  
                  <td>
                  <a href="detalles.php?id=<?php echo $dataAlumno['nombre']; ?>" class="btn btn-warning mb-2"   title="Ver datos del alumno <?php echo $dataAlumno['id']; ?>">
                  <i class="bi bi-tv"></i> Ver</a>
                    <a href="formEditar.php?id=<?php echo $dataAlumno['nombre']; ?>" class="btn btn-info mb-2"   title="Actualizar datos del alumno <?php echo $dataAlumno['id']; ?>">
                    <i class="bi bi-arrow-clockwise"></i> Actualizar</a>
                    <a href="action.php?id=<?php echo $dataAlumno['nombre']; ?>&metodo=3&namePhoto=<?php echo $dataAlumno['nombre']; ?>" class="btn btn-danger mb-2" title="Borrar el alumno <?php echo $dataAlumno['id']; ?>">
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

</section>
  

<section class="marginate" id="profile">
    <div class="container mt-3">
       <div class="row justify-content-md-center">
         <div class="col-md-12"  >
            
               <img src="imgs/grup.jpg" >
             
       </div>
        
 
   

    <div class="col-md-3 mb-3 ">
     <div class="alineate">
     <h3 class="text-center">Busqueda de Cursos</h3>
      <form method="GET" action="" enctype="multipart/form-data">
        <div class="mb-3">
          <label class="form-label">Tipo de Usuario</label>
          <select name="listadoB" >
              <option value="">Tipo de Usuario</option>
              <option value="Alumno">alumno</option>
              <option value="Profesor">Profesor</option>
           
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Nombre de Usuario</label>
          <input type="text" class="form-control" name="listadoA" required>
        </div>
          
        <div class="d-grid gap-2 col-12 mx-auto">
          <button type="submit" name="clik" class="btn  btn btn-primary mt-3 mb-2">
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
                  <th scope="col">nombre</th>
                  <th scope="col">paterno</th>
                  <th scope="col">materno</th>                          
                  <th scope="col">correo</th>
                 
                                                       
                </tr>



              </thead>
              <tbody>
              <?php
             if (isset($_GET['clik'])) {
              
              $tipousaurio=$_GET['listadoA'];
              $busqueda=$_GET['listadoB'];
              $consulta="SELECT * FROM usuarios WHERE tipo_usuario='$busqueda' AND  nombre='$tipousaurio'";
              $visitar=mysqli_query($con,$consulta);
              ?>
             <?php while ($busquedacursos = mysqli_fetch_array($visitar)) { ?>
                <tr>
                  
                  <td><?php echo $busquedacursos['id']; ?></td>                   
                  <td><?php echo $busquedacursos['nombre']; ?></td>
                  <td><?php echo $busquedacursos['paterno']?></td>
                  <td><?php echo $busquedacursos['materno']; ?></td>                  
                  <td><?php echo $busquedacursos['email']; ?></td>
                  
                           
                 
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