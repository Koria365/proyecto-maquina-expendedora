# 🎰 Máquina Expendedora Digital

Sistema de máquina expendedora desarrollado con **PHP**, **Tailwind CSS**, **jQuery** y **MercadoPago**.

## 📁 Estructura del Proyecto

```
proyecto-maquina-expendedora/
├── src/                        (📍 ROOT PHP - Archivos web principales)
│   ├── index.php              (Página principal)
│   ├── success.php            (Pago exitoso)
│   ├── failure.php            (Pago fallido)
│   ├── pending.php            (Pago pendiente)
│   └── .htaccess              (Configuración Apache)
├── resources/                  (Assets estáticos)
│   ├── css/
│   │   ├── input.css          (CSS fuente Tailwind)
│   │   └── output.css         (CSS compilado)
│   └── js/
│       ├── index.js           (Frontend principal)
│       ├── utils.js           (Utilidades)
│       ├── app.js             (Lógica Node.js)
│       └── server.js
├── vendor/                     (Dependencias Composer)
├── node_modules/              (Dependencias Node.js)
├── package.json               (Config Node.js)
├── composer.json              (Config PHP)
├── tailwind.config.js         (Config Tailwind)
└── README.md
```

## 🚀 Instalación y Configuración

### Prerrequisitos

- XAMPP (Apache + PHP 8.x)
- Node.js (v16+)
- Composer

### 1. Instalar Dependencias

```bash
# Dependencias Node.js (Tailwind CSS, jQuery)
npm install

# Dependencias PHP (MercadoPago SDK)
composer install
```

### 2. Configurar MercadoPago

Edita `src/index.php` y actualiza las credenciales:

```php
// Access Token (privado)
MercadoPagoConfig::setAccessToken("TU_ACCESS_TOKEN_AQUI");
```

Edita `resources/js/index.js` y actualiza la clave pública:

```javascript
// Public Key (público)
const mp = new MercadoPago("TU_PUBLIC_KEY_AQUI");
```

### 3. Compilar Assets

```bash
# Compilar CSS una vez
npm run build-css

# Compilar CSS en modo watch (desarrollo)
npm run build

# Compilar CSS para producción (minificado)
npm run build-css-prod
```

## 🌐 Uso

### Desarrollo Local

1. **Iniciar XAMPP** (Apache)

2. **Acceder a la aplicación:**

   ```
   http://localhost/proyecto-maquina-expendedora/src/
   ```

3. **Modo desarrollo CSS:**
   ```bash
   npm run build  # CSS se recompila automáticamente
   ```

### URLs Importantes

- **Página principal:** `http://localhost/proyecto-maquina-expendedora/src/`
- **Pago exitoso:** `http://localhost/proyecto-maquina-expendedora/src/success.php`
- **Pago fallido:** `http://localhost/proyecto-maquina-expendedora/src/failure.php`
- **Pago pendiente:** `http://localhost/proyecto-maquina-expendedora/src/pending.php`

## 🛠️ Scripts Disponibles

```bash
npm start           # Ejecutar app.js (Node.js)
npm run dev         # Alias de npm start
npm run build       # Compilar CSS en modo watch
npm run build-css   # Compilar CSS una vez
npm run build-css-prod  # Compilar CSS para producción
```

## 🎨 Tecnologías Utilizadas

### Backend

- **PHP 8.x** - Servidor backend
- **MercadoPago SDK** - Procesamiento de pagos
- **Composer** - Gestión de dependencias PHP

### Frontend

- **Tailwind CSS 3.4** - Framework CSS utility-first
- **jQuery 3.7** - Manipulación del DOM
- **Font Awesome 6.4** - Iconos
- **Google Fonts (Inter)** - Tipografía

### Herramientas

- **Node.js** - Entorno de desarrollo
- **Apache** - Servidor web
- **XAMPP** - Stack de desarrollo

## 🔧 Estructura de Archivos PHP

### `src/index.php`

- Página principal con grid de productos
- Manejo de AJAX para crear preferencias de pago
- Integración con MercadoPago SDK
- Interfaz responsive con Tailwind CSS

### `src/success.php`

- Página de confirmación de pago exitoso
- Muestra detalles de la transacción
- Auto-redirect después de 10 segundos

### `src/failure.php`

- Página de pago fallido
- Información sobre posibles causas
- Opciones para reintentar o contactar soporte

### `src/pending.php`

- Página de pago pendiente
- Auto-refresh cada 30 segundos
- Información sobre el estado del proceso

## 💡 Características

### ✅ Funcionalidades Implementadas

- Grid de productos responsive
- Sistema de carrito básico
- Integración completa con MercadoPago
- Notificaciones y feedback visual
- Animaciones CSS personalizadas
- Validación de stock
- Manejo de errores robusto
- URLs de retorno configurables

### 🔄 Flujo de Compra

1. Usuario selecciona producto
2. Confirmación de compra
3. Creación de preferencia de pago (AJAX)
4. Redirección a MercadoPago
5. Procesamiento del pago
6. Retorno a página de resultado
7. Feedback visual al usuario

## 🚧 Desarrollo

### Agregar Nuevos Productos

Edita el array `$productos` en `src/index.php`:

```php
$productos = [
    ['id' => 6, 'nombre' => 'Nuevo Producto', 'precio' => 2500, 'stock' => 5, 'imagen' => 'nuevo.jpg'],
    // ... más productos
];
```

### Personalizar Estilos

1. Edita `resources/css/input.css`
2. Ejecuta `npm run build` para recompilar
3. Los cambios se reflejan automáticamente

### Agregar Funcionalidades JavaScript

1. Edita `resources/js/index.js` para lógica principal
2. Usa `resources/js/utils.js` para funciones auxiliares
3. Aprovecha las utilidades ya implementadas (Logger, Toast, Storage, etc.)

## 📦 Producción

Para desplegar en producción:

1. **Compilar assets:**

   ```bash
   npm run build-css-prod
   ```

2. **Configurar credenciales reales de MercadoPago**

3. **Configurar URLs de retorno:**

   ```php
   "back_urls" => [
       "success" => "https://tudominio.com/src/success.php",
       "failure" => "https://tudominio.com/src/failure.php",
       "pending" => "https://tudominio.com/src/pending.php"
   ]
   ```

4. **Optimizar configuración Apache** (`.htaccess`)

## 📞 Soporte

Para reportar problemas o solicitar nuevas funcionalidades, contacta al equipo de desarrollo.

---

**Desarrollado con ❤️ usando PHP, Tailwind CSS y jQuery**
