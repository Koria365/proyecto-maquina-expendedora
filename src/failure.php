<?php
require __DIR__ . '/../vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago Fallido - Máquina Expendedora</title>
    <link href="../resources/css/output.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gradient-to-br from-red-50 to-red-100 min-h-screen font-['Inter']">

    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="vending-card max-w-md w-full text-center">

            <!-- Animación de error -->
            <div class="mb-6">
                <div class="bg-red-500 text-white w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4 animate-pulse">
                    <i class="fas fa-times text-3xl"></i>
                </div>
            </div>

            <h1 class="text-3xl font-bold text-red-600 mb-4">
                Pago No Completado
            </h1>

            <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
                <p class="text-red-800 text-lg">
                    <i class="fas fa-exclamation-triangle mr-2"></i>
                    No se pudo procesar tu pago
                </p>
                <p class="text-red-600 text-sm mt-2">
                    Tu producto no ha sido dispensado
                </p>
            </div>

            <!-- Posibles razones -->
            <div class="bg-gray-50 rounded-lg p-4 mb-6 text-left">
                <h3 class="font-semibold text-gray-800 mb-2">Posibles causas:</h3>
                <ul class="space-y-1 text-sm text-gray-600">
                    <li>• Fondos insuficientes en tu cuenta</li>
                    <li>• Tarjeta bloqueada o vencida</li>
                    <li>• Error de conexión</li>
                    <li>• Pago cancelado por el usuario</li>
                </ul>
            </div>

            <!-- Información del intento -->
            <div class="bg-gray-50 rounded-lg p-4 mb-6 text-left">
                <h3 class="font-semibold text-gray-800 mb-2">Detalles:</h3>
                <div class="space-y-1 text-sm text-gray-600">
                    <div>ID de Referencia: <span class="font-mono"><?= $_GET['payment_id'] ?? 'N/A' ?></span></div>
                    <div>Estado: <span class="text-red-600 font-semibold">Fallido</span></div>
                    <div>Fecha: <span><?= date('d/m/Y H:i:s') ?></span></div>
                </div>
            </div>

            <!-- Botones de acción -->
            <div class="space-y-3">
                <a href="index.php" class="vending-button w-full inline-block">
                    <i class="fas fa-redo mr-2"></i>
                    Intentar Nuevamente
                </a>

                <a href="mailto:soporte@maquinaexpendedora.com" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded w-full inline-block transition-colors duration-200">
                    <i class="fas fa-envelope mr-2"></i>
                    Contactar Soporte
                </a>
            </div>

        </div>
    </div>

</body>

</html>