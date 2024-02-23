<?php
include 'conexion/conexion.php';
include 'templates/encabezado.php'; 
?>

<section>
    <div class="container-fluid bg-dark text-center ">
        <div class="container-fluid mt-5">
            <div class="btn-group">
                <div class="btn-group">
                    <div class="btn-group ">
                    <button type="button" class="btn btn-dark dropdown-toggle text-white" data-toggle="dropdown">Paquetes</button>
                        <div class="dropdown-menu">
                            <button class="dropdown-item"><a class="dropdown-item" href="paquetes/registro.php">Registro</a> </button>
                            <button class="dropdown-item"><a class="dropdown-item" href="paquetes/listar.php">Visualizar</a> </button>
                            <button class="dropdown-item"><a class="dropdown-item" href="paquetes/ConteoPaquetes12.php">Conteo paquetes 12</a> </button>
                            <button class="dropdown-item"><a class="dropdown-item" href="paquetes/ConteoPaquetes15.php">Conteo paquetes 15</a> </button>
                            <button class="dropdown-item"><a class="dropdown-item" href="paquetes/ConteoPaquetes20.php">Conteo paquetes 20</a> </button>
                            <button class="dropdown-item"><a class="dropdown-item" href="paquetes/listadoEntregaPaquetes.php">Listado de personas a Entregar</a> </button>

                        </div>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-dark dropdown-toggle text-white" data-toggle="dropdown">Laminas</button>

                        <div class="dropdown-menu">
                            <button class="dropdown-item"><a class="dropdown-item" href="laminas/registroLamina.php">Registro</a> </button>
                            <button class="dropdown-item"><a class="dropdown-item" href="laminas/listarLamina.php">Visualizar</a> </button>
                            <button class="dropdown-item"><a class="dropdown-item" href="laminas/ConteoLaminas.php">Conteo laminas</a> </button>
                            <button class="dropdown-item"><a class="dropdown-item" href="laminas/listadoEntregaLaminas.php">Listado de personas a Entregar</a> </button>
                        </div>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-dark dropdown-toggle text-white" data-toggle="dropdown">Tinacos</button>

                        <div class="dropdown-menu">
                            <button class="dropdown-item"><a class="dropdown-item" href="tinacos/registroTinaco.php">Registro</a></button>
                            <button class="dropdown-item"><a class="dropdown-item" href="tinacos/listarTinaco.php">Visualizar</a></button>
                            <button class="dropdown-item"><a class="dropdown-item" href="tinacos/ConteoRotoplas.php">Conteo Rotoplas</a> </button>
                            <button class="dropdown-item"><a class="dropdown-item" href="tinacos/ConteoEcoplast.php">Conteo Ecoplast</a> </button>
                            <button class="dropdown-item"><a class="dropdown-item" href="tinacos/listadoEntregaTinacos.php">Listado de personas a Entregar</a> </button>
                        </div>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-dark dropdown-toggle text-white" data-toggle="dropdown">Calentadores Solares</button>

                        <div class="dropdown-menu">
                            <button class="dropdown-item"><a class="dropdown-item" href="calentadorS/registroSolar.php">Registro</a> </button>
                            <button class="dropdown-item"><a class="dropdown-item" href="calentadorS/listarSolar.php">Visualizar</a> </button>
                            <button class="dropdown-item"><a class="dropdown-item" href="calentadorS/CalentadorSolar8.php">Conteo Calentador Solar 8 tubos </a> </button>
                            <button class="dropdown-item"><a class="dropdown-item" href="calentadorS/CalentadorSolar10.php">Conteo Calentador Solar 10 tubos </a> </button>
                            <button class="dropdown-item"><a class="dropdown-item" href="calentadorS/CalentadorSolar12.php">Conteo Calentador Solar 12 tubos </a> </button>
                            <button class="dropdown-item"><a class="dropdown-item" href="calentadorS/CalentadorSolar15.php">Conteo Calentador Solar 15 tubos </a> </button>
                            <button class="dropdown-item"><a class="dropdown-item" href="calentadorS/CalentadorSolar18.php">Conteo Calentador Solar 18 tubos </a> </button>
                            <button class="dropdown-item"><a class="dropdown-item" href="calentadorS/CalentadorSolar20.php">Conteo Calentador Solar 20 tubos </a> </button>
                            <button class="dropdown-item"><a class="dropdown-item" href="calentadorS/CalentadorSolar24.php">Conteo Calentador Solar 24 tubos </a> </button>
                            <button class="dropdown-item"><a class="dropdown-item" href="calentadorS/CalentadorSolar30.php">Conteo Calentador Solar 30 tubos </a> </button>
                            <button class="dropdown-item"><a class="dropdown-item" href="calentadorS/listadoEntregaCalentadorS.php">Listado de personas a Entregar</a> </button>
                        </div>
                    </div>

                    <div class="btn-group">
                    <button type="button" class="btn btn-dark dropdown-toggle text-white" data-toggle="dropdown">Juego de Baño</button>
                        <div class="dropdown-menu">
                            <button class="dropdown-item"><a class="dropdown-item" href="baño/registroBaño.php">Registro</a> </button>
                            <button class="dropdown-item"><a class="dropdown-item" href="baño/listarBaño.php">Visualizar</a> </button>
                            <button class="dropdown-item"><a class="dropdown-item" href="baño/ConteoBaño.php">Conteo Juego de baño</a> </button>
                            <button class="dropdown-item"><a class="dropdown-item" href="baño/listadoEntregaBaño.php">Listado de personas a Entregar</a> </button>
                        </div>
                    </div>

                    <div class="btn-group">
                        <button type="button" class="btn btn-dark dropdown-toggle text-white" data-toggle="dropdown">Paquete Campo</button>

                        <div class="dropdown-menu">
                            <button class="dropdown-item"><a class="dropdown-item" href="campo/registroCampo.php">Registro</a> </button>
                            <button class="dropdown-item"><a class="dropdown-item" href="campo/listarCampo.php">Visualizar</a> </button>
                            <button class="dropdown-item"><a class="dropdown-item" href="campo/ConteoCampo.php">Conteo Paquete Campo</a> </button>
                            <button class="dropdown-item"><a class="dropdown-item" href="campo/listadoEntregaCampo.php">Listado de personas a Entregar</a> </button>
                        </div>
                    </div>

                    
                    <div class="btn-group">
                        <button type="button" class="btn btn-dark dropdown-toggle text-white" data-toggle="dropdown">Parihuela</button>
                        <div class="dropdown-menu">
                            <button class="dropdown-item"><a class="dropdown-item" href="parihuela/registroParihuela.php">Registro</a> </button>
                            <button class="dropdown-item"><a class="dropdown-item" href="parihuela/listarParihuela.php">Visualizar</a> </button>
                            <button class="dropdown-item"><a class="dropdown-item" href="parihuela/ConteoParihuela.php">Conteo Parihuela</a> </button>
                            <button class="dropdown-item"><a class="dropdown-item" href="parihuela/listadoEntregaParihuela.php">Listado de personas a Entregar</a> </button>
                        </div>
                    </div>

                    <div class="btn-group">
                        <button type="button" class="btn btn-dark dropdown-toggle text-white" data-toggle="dropdown">Fumigadoras</button>
                        <div class="dropdown-menu">
                            <button class="dropdown-item"><a class="dropdown-item" href="fumigadoras/registroF.php">Registro</a> </button>
                            <button class="dropdown-item"><a class="dropdown-item" href="fumigadoras/listarF.php">Visualizar</a> </button>
                            <button class="dropdown-item"><a class="dropdown-item" href="fumigadoras/ConteoMochilaFumigadora.php">Conteo Mochila Fumigadora</a> </button>
                            <button class="dropdown-item"><a class="dropdown-item" href="fumigadoras/ConteoBombaFumigadoraMotorizada.php">Conteo Bomba Fumigadora Motorizada</a> </button>
                            <button class="dropdown-item"><a class="dropdown-item" href="fumigadoras/listadoEntregaFumigadoras.php">Listado de personas a Entregar</a> </button>
                        </div>
                    </div>

                    <div class="btn-group">
                        <button type="button" class="btn btn-dark dropdown-toggle text-white" data-toggle="dropdown">Mejoramiento de Vivienda</button>

                        <div class="dropdown-menu">
                            <button class="dropdown-item"><a class="dropdown-item" href="vivienda/registroVivienda.php">Registro</a> </button>
                            <button class="dropdown-item"><a class="dropdown-item" href="vivienda/listarVivienda.php">Visualizar</a> </button>
                            <button class="dropdown-item"><a class="dropdown-item" href="vivienda/ConteoVivienda.php">Conteo Mejoramiento de Vivienda</a> </button>
                            <button class="dropdown-item"><a class="dropdown-item" href="vivienda/listadoEntregaVivienda.php">Listado de personas a Entregar</a> </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<br>
<br>
<h4 class="text-center">Zitacuaro,Michoacan</h4>
<img src="img/zitacuaro.jpg" class="img-fluid rounded mx-auto d-block" alt="zitacuaro">
<br>
<br>
<?php include 'templates/pie.php';?>