<?php
require __DIR__ . '/../vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago Pendiente - Máquina Expendedora</title>
    <link href="../resources/css/output.css" rel="stylesheet">ire __DIR__ . '/vendor/autoload.php';
    ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pago Pendiente - Máquina Expendedora</title>
        <link href="./resources/css/output.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </head>

<body class="bg-gradient-to-br from-yellow-50 to-orange-100 min-h-screen font-['Inter']">

    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="vending-card max-w-md w-full text-center">

            <!-- Animación de pendiente -->
            <div class="mb-6">
                <div class="bg-yellow-500 text-white w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4 animate-spin">
                    <i class="fas fa-clock text-3xl"></i>
                </div>
            </div>

            <h1 class="text-3xl font-bold text-yellow-600 mb-4">
                Pago Pendiente
            </h1>

            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-6">
                <p class="text-yellow-800 text-lg">
                    <i class="fas fa-hourglass-half mr-2"></i>
                    Tu pago está siendo procesado
                </p>
                <p class="text-yellow-600 text-sm mt-2">
                    Te notificaremos cuando se complete
                </p>
            </div>

            <!-- Instrucciones -->
            <div class="bg-gray-50 rounded-lg p-4 mb-6 text-left">
                <h3 class="font-semibold text-gray-800 mb-2">¿Qué significa esto?</h3>
                <ul class="space-y-1 text-sm text-gray-600">
                    <li>• Tu pago está siendo verificado</li>
                    <li>• Puede tomar algunos minutos</li>
                    <li>• No realices otro pago por el mismo producto</li>
                    <li>• Recibirás una confirmación por email</li>
                </ul>
            </div>

            <!-- Información del pago -->
            <div class="bg-gray-50 rounded-lg p-4 mb-6 text-left">
                <h3 class="font-semibold text-gray-800 mb-2">Detalles de la transacción:</h3>
                <div class="space-y-1 text-sm text-gray-600">
                    <div>ID de Pago: <span class="font-mono"><?= $_GET['payment_id'] ?? 'N/A' ?></span></div>
                    <div>Estado: <span class="text-yellow-600 font-semibold">Pendiente</span></div>
                    <div>Fecha: <span><?= date('d/m/Y H:i:s') ?></span></div>
                </div>
            </div>

            <!-- Botones de acción -->
            <div class="space-y-3">
                <button onclick="location.reload()" class="vending-button w-full">
                    <i class="fas fa-sync-alt mr-2"></i>
                    Verificar Estado
                </button>

                <a href="index.php" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded w-full inline-block transition-colors duration-200">
                    <i class="fas fa-home mr-2"></i>
                    Volver al Inicio
                </a>

                <a href="mailto:soporte@maquinaexpendedora.com" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded w-full inline-block transition-colors duration-200">
                    <i class="fas fa-envelope mr-2"></i>
                    Contactar Soporte
                </a>
            </div>

            <!-- Auto-refresh cada 30 segundos -->
            <div class="mt-6 text-sm text-gray-500">
                <i class="fas fa-info-circle mr-1"></i>
                Esta página se actualizará automáticamente cada 30 segundos
            </div>

        </div>
    </div>

    <!-- Auto-refresh -->
    <script>
        setTimeout(() => {
            location.reload();
        }, 30000);
    </script>

</body>

</html>