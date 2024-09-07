<!--Se omite los atributos Tiempo_vida, Descuento , nro_veces_compra, dinero_gastado, _estado_cuenta -->
<?php
    error_reporting(0);
    $nombre_uno =  $_POST['nombre_uno'];
    $nombre_dos =  $_POST['nombre_dos'];
    $ap_pat =  $_POST['ap_pat'];
    $ap_mat =  $_POST['ap_mat'];
    $dni =  $_POST['dni'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-dark">
    <div class="container bg-white p-5 rounded-5 text-secondary">
        <div class="h4 mb-4">Registro de Cliente Recurrente</div>
        
        <!-- Agregar la clase needs-validation y novalidate para las validaciones de Bootstrap -->
        <form action="#" method="post" class="needs-validation" novalidate>
            
            <!-- Primer Nombre -->
            <div class="row mb-4">
                <div class="col col-12 col-md-6">
                    <label class="form-label" for="nombre_uno">Primer Nombre:</label>
                    <input class="form-control" type="text" name="nombre_uno" id="nombre_uno" placeholder="Ingrese primer nombre" pattern="[a-zA-Z\s]+" required>
                    <div class="invalid-feedback">El primer nombre es obligatorio y solo puede contener letras.</div>
                </div>

                <!-- Segundo Nombre -->
                <div class="col col-12 col-md-6">
                    <label class="form-label" for="nombre_dos">Segundo Nombre</label>
                    <input class="form-control" type="text" name="nombre_dos" id="nombre_dos" placeholder="Ingrese segundo nombre" pattern="[a-zA-Z\s]+">
                    <div class="invalid-feedback">Solo se permiten letras en el segundo nombre.</div>
                </div>
            </div>
            
            <!-- Apellido Paterno -->
            <div class="row mb-4">
                <div class="col col-12 col-md-6">
                    <label class="form-label" for="ap_pat">Apellido Paterno</label>
                    <input class="form-control" type="text" name="ap_pat" id="ap_pat" placeholder="Ingrese apellido paterno" pattern="[a-zA-Z\s]+" required>
                    <div class="invalid-feedback">El apellido paterno es obligatorio y solo puede contener letras.</div>
                </div>

                <!-- Apellido Materno -->
                <div class="col col-12 col-md-6">
                    <label class="form-label" for="ap_mat">Apellido Materno</label>
                    <input class="form-control" type="text" name="ap_mat" id="ap_mat" placeholder="Ingrese apellido materno" pattern="[a-zA-Z\s]+" required>
                    <div class="invalid-feedback">El apellido materno es obligatorio y solo puede contener letras.</div>
                </div>
            </div>

            <!-- DNI -->
            <div class="row mb-4">
                <div class="col col-12">
                    <label class="form-label" for="dni">DNI</label>
                    <input class="form-control" type="text" name="dni" id="dni" placeholder="Ingrese DNI" pattern="\d{8}" required>
                    <div class="invalid-feedback">El DNI debe tener 8 dígitos.</div>
                </div>
            </div>
            
            <!-- Botón de envío -->
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Registrar Cliente</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Activar validaciones al enviar el formulario
        (() => {
            'use strict';

            const forms = document.querySelectorAll('.needs-validation');

            // Bucle sobre cada formulario para prevenir el envío si no es válido
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
</body>
</html>
