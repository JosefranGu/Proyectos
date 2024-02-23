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

  <div class="container  text-center py-5">
        <div class="btn-group">
            <button type="button" class="btn btn-light dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">DerechoHabiente</button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="./consumo/derechohabienteCrud/post_form.php">Registro</a></li>
                <li><a class="dropdown-item" href="./consumo/derechohabienteCrud/get.php">Listado</a></li>
            </ul>
        </div>

        <div class="btn-group">
            <button type="button" class="btn btn-light dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">Citas</button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="./consumo/citaCrud/post_form.php">Registrar , Reagendar y Cancelar Cita</a></li>
                <!--<li><a class="dropdown-item" href="#">Reagendar Cita</a></li>
                <li><a class="dropdown-item" href="#">Cancelar Cita</a></li>-->
            </ul>
        </div>

        <div class="btn-group">
            <button type="button" class="btn btn-light dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">Doctores</button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="./consumo/medicoCrud/post_form.php">Registro</a></li>
                <li><a class="dropdown-item" href="./consumo/medicoCrud/get.php">Listado</a></li>
            </ul>
        </div>

        <div class="btn-group">
            <button type="button" class="btn btn-light dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">Dignosticos</button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="./consumo/diagnosticoCrud/post_form.php">Registro de Diagnosticos Doctor</a></li>
                <li><a class="dropdown-item" href="./consumo/diagnosticoCrud/get.php">Consultar Diagnostico Derechabiente</a></li>
            </ul>
        </div>
    </div>


  <br><br><br>
  <footer class="container py-5 bg-dark text-center">
    <p class="m-0 text-center text-white">"TECNOHOSPITAL" &copy; Dirección: &copy; Telefono:</p>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>