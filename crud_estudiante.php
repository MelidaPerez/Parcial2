<?php
     
     if( !empty($_POST) ){
   
        $txt_id_estudiante = utf8_decode($_POST["txt_id_estudiante"]);
        $txt_carnet = utf8_decode($_POST["txt_carnet"]);
        $txt_nombres = utf8_decode($_POST["txt_nombres"]);
        $txt_apellidos = utf8_decode($_POST["txt_apellidos"]);
        $txt_direccion = utf8_decode($_POST["txt_direccion"]);
        $txt_telefono = utf8_decode($_POST["txt_telefono"]);
        $drop_genero = utf8_decode($_POST["drop_genero"]);
        $txt_email = utf8_decode($_POST["txt_email"]);
        $txt_fn = utf8_decode($_POST["txt_fn"]);
        
        include("datos_conexion.php");
        $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
        $sql ="";
        if(isset($_POST['btn_agregar'])  ){
          $sql = "INSERT INTO estudiantes(carnet,nombres,apellidos,direccion,telefono,email,fecha_nacimiento,id_genero) VALUES ('". $txt_carnet ."','". $txt_nombres ."','". $txt_apellidos ."','". $txt_direccion ."','". $txt_telefono ."','". $txt_email ."','". $txt_fn ."',". $drop_genero .");";
        }
        if( isset($_POST['btn_modificar'])  ){
          $sql = "update estudiantes set carnet='". $txt_carnet ."',nombres='". $txt_nombres ."',apellidos='". $txt_apellidos ."',direccion='". $txt_direccion ."',telefono='". $txt_telefono ."',email='". $txt_email ."',fecha_nacimiento='". $txt_fn ."',id_genero=". $drop_genero ." where id_estudiante = ". $txt_id_estudiante.";";
        }
        if( isset($_POST['btn_eliminar'])  ){
          $sql = "delete from estudiantes  where id_estudiante = ". $txt_id_estudiante.";";
        }
         
          if ($db_conexion->query($sql)===true){
            $db_conexion->close();
           
            header('Location: /estudiante_php');
           
          }else{
            $db_conexion->close();  
          }
      } 
      ?>