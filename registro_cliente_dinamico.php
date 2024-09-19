<?php
    error_reporting(0);

    // Variable referencial
    $referencial = 100;
    
    // Valores recibidos desde otro lugar
    $precio_sin_igv = isset($_POST['precio_sin_igv']) ? $_POST['precio_sin_igv'] : 0;
    $igv = $precio_sin_igv * 0.18; // Cálculo del IGV (18%)
    $precio_a_pagar = $precio_sin_igv + $igv; // Precio total con IGV
    $descuento = 10; // Ajustar el descuento según la lógica
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro cliente Dinamico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="container bg-white p-5 rounded-5 shadow-lg text-secondary">
        <div class="h4 mb-4">¡Su compra ya casi esta lista!</div>
        
        <form action="#" method="post" class="needs-validation" novalidate>
            
            <!-- Precio sin IGV -->
            <div class="row mb-4">
                <div class="col col-12">
                    <label class="form-label" for="precio_sin_igv">Precio sin IGV:</label>
                    <input class="form-control" type="number" name="precio_sin_igv" id="precio_sin_igv" placeholder="Ingrese el precio sin IGV" value="<?= $precio_sin_igv ?>" required>
                    <div class="invalid-feedback">El precio es obligatorio.</div>
                </div>
            </div>

            <!-- Checkbox "Quiero ser cliente recurrente" -->
            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" id="cliente_recurrente" disabled <?= $precio_sin_igv > $referencial ? '' : 'disabled'; ?>>
                <label class="form-check-label" for="cliente_recurrente">Quiero ser cliente recurrente</label>
            </div>

            <!-- Formulario adicional -->
            <div id="formulario_adicional" class="row mb-4" style="display:none;">
                <div class="col col-12">
                    <label class="form-label" for="input_adicional">Formulario adicional:</label>
                    <input class="form-control mb-2" type="text" id="input_adicional" placeholder="Ingrese algo">
                    <textarea class="form-control" id="textarea_adicional" placeholder="Texto adicional"></textarea>
                </div>
            </div>

            <!-- Checkbox "Soy cliente recurrente" -->
            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" id="soy_cliente_recurrente">
                <label class="form-check-label" for="soy_cliente_recurrente">Soy cliente recurrente (DNI)</label>
            </div>

            <!-- Input para DNI (deshabilitado inicialmente) -->
            <div class="row mb-4">
                <div class="col col-12">
                    <label class="form-label" for="dni">DNI:</label>
                    <input class="form-control" type="text" id="dni" placeholder="Ingrese DNI" pattern="\d{8}" disabled>
                    <div class="invalid-feedback">El DNI debe tener 8 dígitos.</div>
                </div>
            </div>

            <!-- Datos calculados en PHP -->
            <div class="row mb-4">
                <div class="col col-12 col-md-3">
                    <label class="form-label" for="igv">IGV (18%):</label>
                    <input class="form-control" type="text" id="igv" value="<?= $igv ?>" disabled>
                </div>
                <div class="col col-12 col-md-3">
                    <label class="form-label" for="precio_a_pagar">Precio a Pagar:</label>
                    <input class="form-control" type="text" id="precio_a_pagar" value="<?= $precio_a_pagar ?>" disabled>
                </div>
                <div class="col col-12 col-md-3">
                    <label class="form-label" for="descuento">Descuento:</label>
                    <input class="form-control" type="text" id="descuento" value="<?= $descuento ?>" disabled>
                </div>
            </div>
            
            <!-- Botón de envío -->
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Enviar</button>
            </div>
        </form>
    </div>

    <script>

        /*
        // Habilitar el checkbox "Quiero ser cliente recurrente" y el formulario adicional
        */
        const precioSinIgv = <?= $precio_sin_igv ?>;
        const referencial = <?= $referencial ?>;
        const clienteRecurrenteCheckbox = document.getElementById('cliente_recurrente');
        const formularioAdicional = document.getElementById('formulario_adicional');
        const soyClienteRecurrenteCheckbox = document.getElementById('soy_cliente_recurrente');
        const dniInput = document.getElementById('dni');

        if (precioSinIgv > referencial) {
            clienteRecurrenteCheckbox.disabled = false;
        }

        /*
        // Desmarcar un checkbox cuando se selecciona el otro
        */
        clienteRecurrenteCheckbox.addEventListener('change', function () {
            if (this.checked) {
                soyClienteRecurrenteCheckbox.checked = false;
                dniInput.disabled = true;
                formularioAdicional.style.display = 'block';
            } else {
                formularioAdicional.style.display = 'none';
            }
        });

        soyClienteRecurrenteCheckbox.addEventListener('change', function () {
            if (this.checked) {
                clienteRecurrenteCheckbox.checked = false;
                formularioAdicional.style.display = 'none';
                dniInput.disabled = false;
            } else {
                dniInput.disabled = true;
            }
        });
    </script>
</body>
</html>
