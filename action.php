<?php
include('config.php');
date_default_timezone_set("America/Mexico_City");
setlocale(LC_ALL, 'es_ES');

$metodoAction  = (int) filter_var($_REQUEST['metodo'], FILTER_SANITIZE_NUMBER_INT);

//jalando los datos prederteminados de el tipo json en file
// "nombre":"juan manuel"   <- se se comento el nombre ya que lo obtendremos de el fomulario demtipo [POST]
     

//$metodoAction ==1, es crear un registro nuevo
if($metodoAction == 1){
    $filename = "datos_json_registro.json";
    $data = file_get_contents($filename);
    $json = json_decode($data, true);
    foreach($json as $i) {
        $matricula=$i["matricula"];
        $email=$i["email"];
        $paterno=$i["paterno"];
        $materno=$i["materno"];
        $contraseña=$i["contraseña"];
        $carrera=$i["carrera"];
        $nivel=$i["nivel"];      
    }
    $fechaRegistro  = date('d-m-Y H:i:s A', time()); 
    $nombre       = filter_var($_POST['namefull'], FILTER_SANITIZE_STRING);
    $tipo_usuario           = filter_var($_POST['tipo_de_ususario'], FILTER_SANITIZE_STRING);
    
    $filename       = $_FILES["foto"]["name"]; 
    $tipo_foto      = $_FILES['foto']['type']; 
    $sourceFoto     = $_FILES["foto"]["tmp_name"]; 
    $tamano_foto    = $_FILES['foto']['size']; 


if (!((strpos($tipo_foto, "PNG") || strpos($tipo_foto, "jpg") && ($tamano_foto < 100000)))) {
    
    $logitudPass 	        = 8;
    $newNameFoto            = substr( md5(microtime()), 1, $logitudPass);
    $explode                = explode('.', $filename);
    $extension_foto         = array_pop($explode);
    $nuevoNameFoto          = $newNameFoto.'.'.$extension_foto;

   
    $dirLocal       = "fotosAlumnos";
    if (!file_exists($dirLocal)) {
        mkdir($dirLocal, 0777, true);
    }

    $miDir 		      = opendir($dirLocal); //Habro mi  directorio
    $urlFotoAlumno    = $dirLocal.'/'.$nuevoNameFoto; //Ruta donde se almacena la factura.

    //Muevo la foto a mi directorio.
    if(move_uploaded_file($sourceFoto, $urlFotoAlumno)){
        $SqlInsertAlumno = ("INSERT INTO usuarios(
            matricula,
            email,
            nombre,
            paterno,
            materno,
            contraseña,
            carrera,
            nivel,
            tipo_usuario,
            foto,
            fechaRegistro
        )
        VALUES(
            '".$matricula."',
            '".$email."',
            '".$nombre."',
            '".$paterno."',
            '".$materno."',
            '".$contraseña."',
            '".$carrera."',
            '".$nivel."',
            '".$tipo_usuario."',       
            '".$nuevoNameFoto."',
            '".$fechaRegistro."'
        )");
        $resulInsert = mysqli_query($con, $SqlInsertAlumno);
        ///print_r( $SqlInsertAlumno);

    }
    closedir($miDir);
    header("Location:index.php?a=1");

  }else{
    header("Location:index.php?errorimg=1");
  }
}


//Actualizar registro del Alumno
if($metodoAction == 2){
    $idAlumno     = ($_REQUEST['id']);

    $matriculad       = ($_POST['matricula']);
    $emaild         = ($_POST['email']);
    $nombred           = ($_POST['nombre']);
    $paternod        = ($_POST['paterno']);
    $maternod       = ($_POST['materno']);
    $contraseñad         =($_POST['contraseña']);
    $carrerad           = ($_POST['carrera']);
    $niveld           = ($_POST['nivel']);
    $tipo_usuariod        = ($_POST['tipo_usuario']);

    $UpdateAlumnod    ="UPDATE usuarios
        SET nombre='$nombred',
        matricula='$matriculad', 
        email='$emaild', 
        nombre='$nombred',
        paterno='$paternod', 
        materno='$maternod', 
        contraseña='$contraseñad',
        carrera='$carrerad', 
        nivel='$niveld', 
        tipo_usuario='$tipo_usuariod'
        WHERE id='$idAlumno' ";
    $resultadoUpdate = mysqli_query($con, $UpdateAlumnod);


    //Verificando si existe foto del alumno para actualizar
    if (!empty($_FILES["foto"]["name"])){
            $filename       = $_FILES["foto"]["name"]; 
            $tipo_foto      = $_FILES['foto']['type']; 
            $sourceFoto     = $_FILES["foto"]["tmp_name"]; 
            $tamano_foto    = $_FILES['foto']['size']; 
           
        if (!((strpos($tipo_foto, "PNG") || strpos($tipo_foto, "jpg") && ($tamano_foto < 100000)))) {
            $logitudPass 	        = 8;
            $newNameFoto            = substr( md5(microtime()), 1, $logitudPass);
            $explode                = explode('.', $filename);
            $extension_foto         = array_pop($explode);
            $nuevoNameFoto          = $newNameFoto.'.'.$extension_foto;

            //Verificando si existe el directorio, de lo contrario lo creo
            $dirLocal       = "fotosAlumnos";
            $miDir 		      = opendir($dirLocal); /
            $urlFotoAlumno    = $dirLocal.'/'.$nuevoNameFoto; 

           
        if(move_uploaded_file($sourceFoto, $urlFotoAlumno)){
            $updateFoto = ("UPDATE usuarios SET foto='$nuevoNameFoto' WHERE id='$idAlumno' ");
            $resultFoto = mysqli_query($con, $updateFoto);
        }
    }else{
        header("Location:index.php?errorimg=1");
    }
  }

  header("Location:index.php?update=1&id=$idAlumno");
 }



//Eliminar Alumno
if($metodoAction == 3){
    $idAlumno  = ($_REQUEST['id']);
    $namePhoto = ($_REQUEST['namePhoto']);

    $SqlDeleteAlumno = ("DELETE FROM usuarios WHERE  nombre='$idAlumno'");
    $resultDeleteAlumno = mysqli_query($con, $SqlDeleteAlumno);
    
    if($resultDeleteAlumno !=0){
        $fotoAlumno = "fotosAlumnos/".$namePhoto;
        unlink($fotoAlumno);
    }
    
    $msj ="Alumno Borrado correctamente.";
    header("Location:index.php?deletAlumno=1&mensaje=".$msj);
 
}


// añadir curso cesba


if($metodoAction == 4){
    
$filename = "curso_materia.json";
$data = file_get_contents($filename);
$json = json_decode($data, true);
foreach($json as $i) {
    $clave=$i["clave"];
    $plan_estudios=$i["plan_estudios"];
    $rvoe=$i["rvoe"];
    $carrera=$i["carrera"];
    $nivel=$i["nivel"];
    $clave_carrera=$i["clave_carrera"];
    $ciclo=$i["ciclo"];     
    $codigo=$i["codigo"];  
}

    $fechaRegistro  = date('d-m-Y H:i:s A', time()); 
    $namecurso       = filter_var($_POST['curso'], FILTER_SANITIZE_STRING);
    $asignaturatipo           = filter_var($_POST['asignatura'], FILTER_SANITIZE_STRING);    
     $SqlInsertcurso = ("INSERT INTO curso(
            cursos,
            asignatura,
            clave,
            plan_estudios,
            rvoe,
            carrera,
            nivel,
            clave_carrera,
            ciclo,
            codigo,
            fecha_registro
            
        )
        VALUES(
            '".$namecurso."',
            '".$asignaturatipo."',
            '".$clave."',
            '".$plan_estudios."',
            '".$rvoe."',
            '".$carrera."',
            '".$nivel."',
            '".$clave_carrera."',
            '".$ciclo."',
            '".$codigo."',
            '".$fechaRegistro."'     
           
        )");
        $resulcurso = mysqli_query($con, $SqlInsertcurso);
        ///print_r( $SqlInsertAlumno);
        if ($resulcurso) {
            header("Location:index.php?a=1");
        }
        
    
      else{
        header("Location:index.php?errorimg=1");
      }
    }
   
//Actualizar rcurso
if($metodoAction == 5){
    $ideditarcurso     = ($_REQUEST['id']);

    $cursos       = ($_POST['cursos']);
    $asignatura         = ($_POST['asignatura']);
    $clave           = ($_POST['clave']);
    $plan_estudios        = ($_POST['plan_estudios']);
    $rvoe       = ($_POST['rvoe']);
    $carrera         =($_POST['carrera']);
    $nivel           = ($_POST['nivel']);
    $clave_carrera           = ($_POST['clave_carrera']);
    $ciclo        = ($_POST['ciclo']);
    $codigo           = ($_POST['codigo']);
   

    $Updatecurse   ="UPDATE curso
        SET 
        cursos='$cursos',
        asignatura='$asignatura', 
        clave='$clave', 
        plan_estudios='$plan_estudios',
        rvoe='$rvoe', 
        carrera='$carrera', 
        clave_carrera='$clave_carrera',
        ciclo='$ciclo', 
        codigo='$codigo'
        WHERE id='$ideditarcurso' ";
    $actualizarcurso = mysqli_query($con, $Updatecurse);

       if ($actualizarcurso) {
        header("Location:Cursos.php?errorimg=1");
       }

  header("Location:Cursos.php?update=1&id=$Updatecurse");
 }

 
//Eliminar Alumno
if($metodoAction == 6){
    $iddelete  = ($_REQUEST['id']);
   

    $SqlDeletecurso = ("DELETE FROM curso WHERE  cursos='$iddelete'");
    $resultDelete = mysqli_query($con, $SqlDeletecurso);
    
    if($resultDelete !=0){
        $msj ="Alumno Borrado correctamente.";
   
    }
    
    
    header("Location:Cursos.php?id=&ideditarcurso=".$msj);
}



