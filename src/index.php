<?php
// Requiere el autoload de Composer para Mercado Pago SDK
require __DIR__ . '/../vendor/autoload.php';

// SDK de Mercado Pago
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Preference\PreferenceClient;

// Agrega credenciales
MercadoPagoConfig::setAccessToken("APP_USR-5202108638360603-070718-ca8a1de7af6bb38b78a300fb97cd35b8-1577049737");

// Productos de la máquina expendedora
$productos = [
  ['id' => 1, 'nombre' => 'Coca Cola', 'precio' => 1500, 'stock' => 10, 'imagen' => 'coca-cola.jpg'],
  ['id' => 2, 'nombre' => 'Pepsi', 'precio' => 1400, 'stock' => 8, 'imagen' => 'pepsi.jpg'],
  ['id' => 3, 'nombre' => 'Agua', 'precio' => 1000, 'stock' => 15, 'imagen' => 'agua.jpg'],
  ['id' => 4, 'nombre' => 'Snickers', 'precio' => 2000, 'stock' => 12, 'imagen' => 'snickers.jpg'],
  ['id' => 5, 'nombre' => 'Papas Lays', 'precio' => 1800, 'stock' => 6, 'imagen' => 'papas.jpg']
];

// Manejar compra con AJAX
if ($_POST && isset($_POST['producto_id'])) {
  $producto_id = intval($_POST['producto_id']);
  $producto = array_filter($productos, function ($p) use ($producto_id) {
    return $p['id'] === $producto_id;
  });

  if (!empty($producto)) {
    $producto = array_values($producto)[0];

    $client = new PreferenceClient();
    $preference = $client->create([
      "items" => [
        [
          "title" => $producto['nombre'],
          "quantity" => 1,
          "unit_price" => $producto['precio'],
          "currency_id" => "CLP"
        ]
      ],
      "back_urls" => [
        "success" => "http://localhost/proyecto-maquina-expendedora/src/success.php",
        "failure" => "http://localhost/proyecto-maquina-expendedora/src/failure.php",
        "pending" => "http://localhost/proyecto-maquina-expendedora/src/pending.php"
      ],
      "auto_return" => "approved"
    ]);

    header('Content-Type: application/json');
    echo json_encode(['preference_id' => $preference->id]);
    exit;
  }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Máquina Expendedora Digital</title>

  <!-- Tailwind CSS Compilado -->
  <link href="../resources/css/output.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Font Awesome para iconos -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen font-['Inter']">

  <!-- Header -->
  <header class="bg-white shadow-lg border-b-4 border-vending-primary">
    <div class="max-w-6xl mx-auto px-4 py-6">
      <div class="flex items-center justify-between">
        <div class="flex items-center space-x-3">
          <div class="bg-vending-primary text-white p-3 rounded-lg">
            <i class="fas fa-robot text-2xl"></i>
          </div>
          <div>
            <h1 class="text-3xl font-bold text-vending-dark">Máquina Expendedora</h1>
            <p class="text-gray-600">Sistema Digital de Ventas</p>
          </div>
        </div>
        <div class="flex items-center space-x-4">
          <div class="bg-vending-success text-white px-4 py-2 rounded-lg">
            <i class="fas fa-circle mr-2"></i>
            <span class="font-semibold">En Línea</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <main class="max-w-6xl mx-auto px-4 py-8">

    <!-- Panel de Control -->
    <div class="vending-card mb-8">
      <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-vending-dark">
          <i class="fas fa-shopping-cart mr-2"></i>
          Selecciona tu Producto
        </h2>
        <div class="bg-gray-100 px-4 py-2 rounded-lg">
          <span class="text-sm text-gray-600">Total productos: <?= count($productos) ?></span>
        </div>
      </div>

      <!-- Grid de Productos -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6" id="productos-grid">
        <?php foreach ($productos as $producto): ?>
          <div class="product-slot bg-white border-2 border-gray-200 rounded-xl p-4 hover:border-vending-primary transition-all duration-300 hover:shadow-lg"
            data-producto-id="<?= $producto['id'] ?>"
            data-nombre="<?= htmlspecialchars($producto['nombre']) ?>"
            data-precio="<?= $producto['precio'] ?>">

            <!-- Imagen del producto -->
            <div class="bg-gray-100 rounded-lg h-32 mb-4 flex items-center justify-center">
              <i class="fas fa-bottle-water text-4xl text-gray-400"></i>
            </div>

            <!-- Info del producto -->
            <div class="text-center">
              <h3 class="font-bold text-lg text-vending-dark mb-2"><?= htmlspecialchars($producto['nombre']) ?></h3>
              <div class="text-2xl font-bold text-vending-primary mb-2">$<?= number_format($producto['precio'], 0, ',', '.') ?></div>
              <div class="text-sm text-gray-600 mb-3">Stock: <?= $producto['stock'] ?></div>

              <?php if ($producto['stock'] > 0): ?>
                <button class="vending-button w-full comprar-btn" data-producto-id="<?= $producto['id'] ?>">
                  <i class="fas fa-shopping-cart mr-2"></i>
                  Comprar
                </button>
              <?php else: ?>
                <button class="bg-gray-400 text-white font-bold py-2 px-4 rounded w-full cursor-not-allowed" disabled>
                  <i class="fas fa-times mr-2"></i>
                  Agotado
                </button>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Panel de Pago -->
    <div class="vending-card" id="payment-panel" style="display: none;">
      <h3 class="text-xl font-bold text-vending-dark mb-4">
        <i class="fas fa-credit-card mr-2"></i>
        Proceso de Pago
      </h3>
      <div id="walletBrick_container"></div>
    </div>

  </main>

  <!-- Footer -->
  <footer class="bg-vending-dark text-white py-8 mt-12">
    <div class="max-w-6xl mx-auto px-4 text-center">
      <p>&copy; 2025 Máquina Expendedora Digital. Sistema desarrollado con PHP, Tailwind CSS y jQuery.</p>
    </div>
  </footer>

  <!-- Loading Modal -->
  <div id="loading-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-lg p-8 text-center">
      <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-vending-primary mx-auto mb-4"></div>
      <p class="text-lg font-semibold">Procesando pago...</p>
    </div>
  </div>

  <!-- Scripts -->
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

  <!-- MercadoPago SDK -->
  <script src="https://sdk.mercadopago.com/js/v2"></script>

  <!-- Tu JavaScript personalizado -->
  <script src="../resources/js/utils.js"></script>
  <script src="../resources/js/index.js"></script>

</body>

</html>