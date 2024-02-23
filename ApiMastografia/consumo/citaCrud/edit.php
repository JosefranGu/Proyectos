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
  <?php
    $subs_id = isset($_GET['id']) ? $_GET['id'] : '';
    echo $subs_id;
    $json_string = file_get_contents("http://localhost:8080/ApiMastografia/cita/read.php?id=". $subs_id);
    $data = json_decode($json_string);
    $citas = $data->Cita;
    foreach ($citas as $datos_cita) {
      $datos_cita->id_cita;
      $datos_cita->id_deha;
      $datos_cita->id_med;
      $datos_cita->fecha_cita;
      $datos_cita->consultorio_cita;
      $datos_cita->hi_cita;
      $datos_cita->hf_cita;
    }
    ?>


  <!-- Editar Citas Formulario -->
  <div class="container">
    <h1 class="text-center">Editar Citas</h1>
    <div class="row justify-content-center border border-5 p-5 border-dark">
      <div class="col-md-6">
        <form action="put.php" method="post">
          <!-- Campos adicionales para la cita -->
          <input type="hidden" id="id_cita" name="id_cita" value="<?php echo $datos_cita->id_cita ?>"><br>
          <input type="hidden" id="id_deha" name="id_deha" value="<?php echo $datos_cita->id_deha ?>"><br>
          <input type="hidden" id="id_med" name="id_med" value="<?php echo $datos_cita->id_med ?>"><br>

          <!-- Campos existentes -->
          <div class="mb-3">
            <label for="fecha_cita" class="form-label">Fecha de Cita:</label>
            <input type="text" class="form-control" id="fecha_cita" name="fecha_cita" placeholder="Ingresa la fecha de la cita" required value="<?php echo $datos_cita->fecha_cita ?>">
          </div>
          <div class="mb-3">
            <label for="consultorio_cita" class="form-label">Consultorio de Cita:</label>
            <input type="text" class="form-control" id="consultorio_cita" name="consultorio_cita" placeholder="Ingresa el consultorio de la cita" required value="<?php echo $datos_cita->consultorio_cita ?>">
          </div>
          <div class="mb-3">
            <label for="hi_cita" class="form-label">Hora de Inicio de Cita:</label>
            <input type="text" class="form-control" id="hi_cita" name="hi_cita" placeholder="Ingresa la hora de inicio de la cita" required value="<?php echo $datos_cita->hi_cita ?>">
          </div>
          <div class="mb-3">
            <label for="hf_cita" class="form-label">Hora de Fin de Cita:</label>
            <input type="text" class="form-control" id="hf_cita" name="hf_cita" placeholder="Ingresa la hora de fin de la cita" required value="<?php echo $datos_cita->hf_cita ?>">
          </div>

          <!-- Botones -->
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
    <p class="m-0 text-center text-white">"TECNOHOSPITAL" &copy; Dirección: &copy; Teléfono:</p>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
