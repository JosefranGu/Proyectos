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
<!-- Header-->
    <?php
    $subs_id = isset($_GET['id']) ? $_GET['id'] : '';
    echo $subs_id;
    $json_string = file_get_contents("http://localhost:8080/ApiMastografia/medico/read.php?id=". $subs_id);
    $data = json_decode($json_string);
    $medicos = $data->Medico;
    foreach ($medicos as $dato) {
      $dato->id_med;
      $dato->rfc_med;
      $dato->nombre_med;
      $dato->tel_med;
      $dato->correo_med;
      $dato->consultorio_med;
    }
    ?>

    <h1 class="text-center">Editar Medicos</h1>
    <div class="container">
      <div class="row justify-content-center border border-5 p-5 border-dark">
        <div class="col-md-6">
          <form action="put.php" method="post">
          <input type="hidden" id="id" name="id" value="<?php echo $dato->id_med?>"><br>
            <div class="mb-3">
              <label for="rfc" class="form-label">RFC:</label>
              <input type="text" class="form-control" id="rfc" name="rfc" placeholder="Ingresa tu RFC" required value="<?php echo $dato->rfc_med?>">
            </div>
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre:</label>
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required value="<?php echo $dato->nombre_med?>">
            </div>
            <div class="mb-3">
              <label for="telefono" class="form-label">Teléfono:</label>
              <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Ingresa tu teléfono" required value="<?php echo $dato->tel_med?>">
            </div>
            <div class="mb-3">
              <label for="correo" class="form-label">Correo Electrónico:</label>
              <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingresa tu correo electrónico" required value="<?php echo $dato->correo_med?>">
            </div>
            <div class="mb-3">
              <label for="consultorio" class="form-label">Consultorio:</label>
              <input type="text" class="form-control" id="consultorio" name="consultorio" placeholder="Ingresa tu consultorio" required value="<?php echo $dato->consultorio_med?>">
            </div>
            <div class="d-grid">
              <input type="submit" class="btn btn-success" value="Editar">
              <br>
              <input type="reset" class="btn btn-primary" value="Reestablecer">
            </div>
          </form>
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