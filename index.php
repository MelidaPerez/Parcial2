<!doctype html>
<html lang="en">
  <head>
    <title>PARCIAL Estudiantes</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
    
      <h1>Formulario Estudiantes</h1>
      <div class="container">
          <form class="d-flex" action="crud_estudiante.php" method="post">
            <div class="col">
            <div class="mb-3">
                <label for="lbl_id_estudiante" class="form-label"><b>ID Estudiante</b></label>
                <input type="text" name="txt_id_estudiante" id="txt_id_estudiante" class="form-control" value="0"  readonly>
              </div>
            <div class="mb-3">
                <label for="lbl_carnet" class="form-label"><b>Carnet</b></label>
                <input type="text" name="txt_carnet" id="txt_carnet" class="form-control" value="0"  required>
              </div>
            <div class="mb-3">
                <label for="lbl_nombres" class="form-label"><b>Nombres</b></label>
                <input type="text" name="txt_nombres" id="txt_nombres" class="form-control" placeholder="Nombres: Nombre1 Nombres2" required>
              </div>
            <div class="mb-3">
                <label for="lbl_apellidos" class="form-label"><b>Apellidos</b></label>
                <input type="text" name="txt_apellidos" id="txt_apellidos" class="form-control" placeholder="Apellidos: Apellido1 Apellido2" required>
              </div>
            <div class="mb-3">
                <label for="lbl_direccion" class="form-label"><b>Direccion</b></label>
                <input type="text" name="txt_direccion" id="txt_direccion" class="form-control" placeholder="Direccion: #casa calle avenida lugar" required>
              </div>
            <div class="mb-3">
                <label for="lbl_telefono" class="form-label"><b>Telefono</b></label>
                <input type="number" name="txt_telefono" id="txt_telefono" class="form-control" placeholder="Telefono: 12345678" required>
              </div>
            <div class="mb-3">
                <label for="lbl_genero" class="form-label"><b>Genero</b></label>
                <select class="form-select" name="drop_genero" id="drop_genero">
                  <option value=0> ---- Genero ---- </option>
                  <?php 
                   include("datos_conexion.php");
                   $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
                   $db_conexion -> real_query ("SELECT id_genero as id,genero FROM genero;");
                  $resultado = $db_conexion -> use_result();
                  while ($fila = $resultado ->fetch_assoc()){
                    echo "<option value=". $fila['id'].">". $fila['genero']."</option>";
                  }
                  $db_conexion ->close();

                   ?>
            </select>
            </div>
            <div class="mb-3">
                <label for="lbl_email" class="form-label"><b>Email</b></label>
                <input type="text" name="txt_email" id="txt_email" class="form-control" placeholder="Email: correo@mail.com" required>
              </div>
            <div class="mb-3">
                <label for="lbl_fn" class="form-label"><b>Fecha Nacimiento</b></label>
                <input type="date" name="txt_fn" id="txt_fn" class="form-control" placeholder="aaaa-mm-dd" required>
              </div>
            <div class="mb-3">
                <input type="submit" name="btn_agregar" id="btn_agregar" class="btn btn-primary" value = "Agregar">
                <input type="submit" name="btn_modificar" id="btn_modificar" class="btn btn-success" value = "Modificar">
                <input type="submit" name="btn_eliminar" id="btn_eliminar" class="btn btn-danger" value = "Eliminar">
              </div>
            </div>
          </form>
    <table class="table table-striped table-inverse table-responsive">
      <thead class="thead-inverse">
        <tr>
          <th>Id </th>
          <th>Carnet</th>
          <th>Nombres</th>
          <th>Apellidos</th>
          <th>Direccion</th>
          <th>Telefono</th>
          <th>Genero</th>
          <th>Email</th>
          <th>Nacimiento</th>
        </tr>
        </thead>
        <tbody id="tbl_estudiantes">
         <?php 
         include("datos_conexion.php");
         $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
         $db_conexion -> real_query ("SELECT e.id_estudiante as id,e.carnet,e.nombres,e.apellidos,e.direccion,e.telefono,p.genero,e.email,e.fecha_nacimiento,p.id_genero FROM estudiantes as e inner join genero as p on e.id_genero = p.id_genero;");
        $resultado = $db_conexion -> use_result();
        while ($fila = $resultado ->fetch_assoc()){
          echo "<tr data-id=". $fila['id']." data-idg=". $fila['id_genero'].">";
          echo "<td>". $fila['id']."</td>";
          echo "<td>". $fila['carnet']."</td>";
          echo "<td>". $fila['nombres']."</td>";
          echo "<td>". $fila['apellidos']."</td>";
          echo "<td>". $fila['direccion']."</td>";
          echo "<td>". $fila['telefono']."</td>";
          echo "<td>". $fila['genero']."</td>";
          echo "<td>". $fila['email']."</td>";
          echo "<td>". $fila['fecha_nacimiento']."</td>";
          echo "</tr>";

        }
        $db_conexion ->close();
         ?>
        </tbody>
    </table>
          
      </div>
      
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script type="text/javascript">

    $('#tbl_estudiantes').on('click','tr td',function(evt){
        var target,id_estudiante,idg,carnet,nombres,apellidos,direccion,telefono,email,nacimiento;
        target = $(event.target);
        id_estudiante = target.parent().data('id');
        idg = target.parent().data('idg');
        carnet = target.parent("tr").find("td").eq(1).html();
        nombres = target.parent("tr").find("td").eq(2).html();
        apellidos =  target.parent("tr").find("td").eq(3).html();
        direccion = target.parent("tr").find("td").eq(4).html();
        telefono = target.parent("tr").find("td").eq(5).html();
        email = target.parent("tr").find("td").eq(7).html();
        nacimiento  = target.parent("tr").find("td").eq(8).html();
        console.log(idg)
        $("#txt_id_estudiante").val(id_estudiante);
        $("#txt_carnet").val(carnet);
        $("#txt_nombres").val(nombres);
        $("#txt_apellidos").val(apellidos);
        $("#txt_direccion").val(direccion);
        $("#txt_telefono").val(telefono);
        $("#txt_email").val(email);
        $("#txt_fn").val(nacimiento);
        $("#drop_genero").val(idg);
        $("#modal_estudiantes").modal('show');
        
    });
</script>
  </body>
</html>
