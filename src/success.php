<?php
require __DIR__ . '/../vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago Exitoso - Máquina Expendedora</title>
    <link href="../resources/css/output.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gradient-to-br from-green-50 to-emerald-100 min-h-screen font-['Inter']">

    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="vending-card max-w-md w-full text-center">

            <!-- Animación de éxito -->
            <div class="mb-6">
                <div class="bg-green-500 text-white w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4 animate-bounce">
                    <i class="fas fa-check text-3xl"></i>
                </div>
                <div class="bg-green-100 w-32 h-32 rounded-full flex items-center justify-center mx-auto opacity-20 absolute -mt-16 ml-8"></div>
            </div>

            <h1 class="text-3xl font-bold text-green-600 mb-4">
                ¡Pago Exitoso!
            </h1>

            <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6">
                <p class="text-green-800 text-lg">
                    <i class="fas fa-gift mr-2"></i>
                    Tu producto ha sido dispensado
                </p>
                <p class="text-green-600 text-sm mt-2">
                    ¡Disfruta tu compra!
                </p>
            </div>

            <!-- Información del pago -->
            <div class="bg-gray-50 rounded-lg p-4 mb-6 text-left">
                <h3 class="font-semibold text-gray-800 mb-2">Detalles de la transacción:</h3>
                <div class="space-y-1 text-sm text-gray-600">
                    <div>ID de Pago: <span class="font-mono"><?= $_GET['payment_id'] ?? 'N/A' ?></span></div>
                    <div>Estado: <span class="text-green-600 font-semibold">Aprobado</span></div>
                    <div>Fecha: <span><?= date('d/m/Y H:i:s') ?></span></div>
                </div>
            </div>

            <!-- Botones de acción -->
            <div class="space-y-3">
                <a href="index.php" class="vending-button w-full inline-block">
                    <i class="fas fa-shopping-cart mr-2"></i>
                    Comprar Otro Producto
                </a>

                <button onclick="window.print()" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded w-full transition-colors duration-200">
                    <i class="fas fa-print mr-2"></i>
                    Imprimir Comprobante
                </button>
            </div>

        </div>
    </div>

    <!-- Auto-redirect después de 10 segundos -->
    <script>
        setTimeout(() => {
            window.location.href = 'index.php';
        }, 10000);

        // Countdown
        let countdown = 10;
        const interval = setInterval(() => {
            countdown--;
            if (countdown <= 0) {
                clearInterval(interval);
            }
        }, 1000);
    </script>

</body>

</html>