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

  <body>
    <?php
    $subs_id = isset($_GET['id']) ? $_GET['id'] : '';
    echo $subs_id;
    $json_string = file_get_contents("http://localhost:8080/ApiMastografia/derechohabiente/read.php?id=". $subs_id);
    $data = json_decode($json_string);
    $derechohabientes = $data->Derechohabiente;
    foreach ($derechohabientes as $dato) {
      $dato->id_deha;
      $dato->curp_deha;
      $dato->nombre_deha;
      $dato->tel_deha;
      $dato->correo_deha;
    }
    ?>

    <h1 class="text-center">Editar de Derechohabiente</h1>
    <div class="container">
      <div class="row justify-content-center border border-5 p-5 border-dark">
        <div class="col-md-6">
          <form action="put.php" method="post">
          <input type="hidden" id="id" name="id" value="<?php echo $dato->id_deha?>"><br>
            <div class="mb-3">
              <label for="curp" class="form-label">CURP:</label>
              <input type="text" class="form-control" id="curp" name="curp" placeholder="Ingresa tu CURP" required value="<?php echo $dato->curp_deha?>">
            </div>
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre:</label>
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required value="<?php echo $dato->nombre_deha?>">
            </div>
            <div class="mb-3">
              <label for="telefono" class="form-label">Teléfono:</label>
              <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Ingresa tu teléfono" required value="<?php echo $dato->tel_deha?>">
            </div>
            <div class="mb-3">
              <label for="correo" class="form-label">Correo Electrónico:</label>
              <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingresa tu correo electrónico" required value="<?php echo $dato->correo_deha?>">
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