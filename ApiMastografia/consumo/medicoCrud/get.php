<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>TECNOHOSPITAL</title>
</head>

<body>
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">TECNOHOSPITAL</a>
    </div>
  </nav>
  <!-- Navigation-->

  <!-- Header-->
  <header class="container bg-dark text-center py-5">
    <div class="container px-4">
      <div class="text-white d-flex align-items-center justify-content-center">
        <img src="/HospitalTec/templates/logo3.jpg" alt="Logo" width="250" height="250" class="me-5">
        <h1 class="display-4 fw-bolder">TECNOHOSPITAL</h1>
      </div>
    </div>
  </header>
  <br><br>
  <div align="center" class="py-1 me-2">
  <a class="btn btn-secondary" href="/ApiMastografia/index.php" role="button">Pagina Principal</a>
    <a class="btn btn-secondary" href="post_form.php" role="button">Añadir Nuevo Registro </a>
  </div>
  <div class="container">
    <div class="row justify-content-center border border-5 p-5 border-dark">
      <div class="col-md-12">
        <table class="table table-bordered table-striped ">
          <thead>
            <tr>
              <th>ID</th>
              <th>RFC</th>
              <th>Nombre</th>
              <th>Teléfono</th>
              <th>Correo Electrónico</th>
              <th>Consultorio</th>
              <th>Editar</th>
              <th>Eliminar</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $json_string = file_get_contents("http://localhost:8080/ApiMastografia/medico/read.php");
            $data = json_decode($json_string);
            $medicos = $data->Medico;
            foreach ($medicos as $medico) {
              ?>
              <tr>
                  <td><?php echo $medico->id_med; ?></td>
                  <td><?php echo $medico->rfc_med; ?></td>
                  <td><?php echo $medico->nombre_med; ?></td>
                  <td><?php echo $medico->tel_med; ?></td>
                  <td><?php echo $medico->correo_med; ?></td>
                  <td><?php echo $medico->consultorio_med; ?></td>
                  <td><button><a class="btn btn-warning" href="edit.php?id=<?php echo $medico->id_med; ?>">Editar</a></button></td>
                  <td><button><a class="btn btn-danger" href="delete.php?id=<?php echo $medico->id_med; ?>">Eliminar</a></button></td>
              </tr>
              <?php
          }
          
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>



  <br><br><br>
  <footer class="container py-5 bg-dark text-center">
    <p class="m-0 text-center text-white">"TECNOHOSPITAL" &copy; Dirección: &copy; Telefono:</p>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>