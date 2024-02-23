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
  <div align="center">
    <a class="btn btn-danger" href="get.php" role="button">Atras</a>
</div>

  <h1 class="text-center">Registro de Cita</h1>

<div class="container">
    <div class="row justify-content-center border border-5 p-5 border-dark">
        <div class="col-md-6">
            <form method="post" action="post.php">
                <div class="mb-3">
                    <label for="id_deha" class="form-label">Id Derechohabiente:</label>
                    <input type="text" class="form-control" id="id_deha" name="id_deha" placeholder="Ingresa tu id_deha " required>
                </div>
                <div class="mb-3">
                    <label for="id_med" class="form-label">Id Medico:</label>
                    <input type="text" class="form-control" id="id_med" name="id_med" placeholder="Ingresa tu id_med" required>
                </div>
                <div class="mb-3">
                    <label for="fecha_cita" class="form-label">Fecha Cita:</label>
                    <input type="date" class="form-control" id="fecha_cita" name="fecha_cita" placeholder="Ingresa tu " required>
                </div>
                <div class="mb-3">
                    <label for="consultorio_cita" class="form-label">Consultorio Cita:</label>
                    <input type="text" class="form-control" id="consultorio_cita" name="consultorio_cita" placeholder="Ingresa tu Consultorio Cita" required>
                </div>
                <div class="mb-3">
                    <label for="hi_cita" class="form-label">Hora inicial Cita</label>
                    <input type="text" class="form-control" id="hi_cita" name="hi_cita" placeholder="Ingresa el hora inicio cita" required>
                </div>
                <div class="mb-3">
                    <label for="hf_cita" class="form-label">Hora final Cita</label>
                    <input type="text" class="form-control" id="hf_cita" name="hf_cita" placeholder="Ingresa la hora fin cita" required>
                </div>
                <div class="d-grid">
                    <input type="submit" class="btn btn-success" value="Registrar">
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