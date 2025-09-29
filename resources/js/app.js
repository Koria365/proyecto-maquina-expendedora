// Configuración básica para Tailwind CSS + jQuery
// Inicialización y configuración global

console.log("🚀 Iniciando aplicación...");

// Configuración básica de la aplicación
const AppConfig = {
  name: "Proyecto Base",
  version: "1.0.0",
  environment: "development",
  debug: true,
};

// Inicialización de la aplicación
class App {
  constructor() {
    this.init();
  }

  init() {
    console.log("✅ Aplicación inicializada");
    console.log(`� ${AppConfig.name} v${AppConfig.version}`);
    console.log(`🌍 Entorno: ${AppConfig.environment}`);

    // Verificar dependencias
    this.checkDependencies();

    // Configurar environment
    this.setupEnvironment();
  }

  checkDependencies() {
    const dependencies = {
      jQuery: typeof $ !== "undefined",
      "Tailwind CSS": document.querySelector('[href*="tailwind"]') !== null,
    };

    console.log("� Verificando dependencias:");
    Object.entries(dependencies).forEach(([name, loaded]) => {
      console.log(`  ${loaded ? "✅" : "❌"} ${name}`);
    });
  }

  setupEnvironment() {
    if (AppConfig.environment === "development") {
      console.log("🔧 Modo desarrollo activado");

      // Configuraciones de desarrollo
      if (AppConfig.debug) {
        window.APP_DEBUG = true;
        console.log("🐛 Debug mode habilitado");
      }
    }
  }
}

// Función para exportar la configuración
function getAppConfig() {
  return AppConfig;
}

// Función utilitaria para logging
function logInfo(message) {
  if (AppConfig.debug) {
    console.log(`ℹ️ [${AppConfig.name}] ${message}`);
  }
}

// Exportar para uso global si es necesario (para Node.js)
if (typeof module !== "undefined" && module.exports) {
  module.exports = { App, AppConfig, getAppConfig, logInfo };
}

// Exportar para uso en browser
if (typeof window !== "undefined") {
  window.App = App;
  window.AppConfig = AppConfig;
  window.getAppConfig = getAppConfig;
  window.logInfo = logInfo;
}

// Inicializar aplicación si estamos en el browser
if (typeof window !== "undefined") {
  // Esperar a que el DOM esté listo
  document.addEventListener("DOMContentLoaded", () => {
    new App();
  });
}

console.log("� Módulo de aplicación cargado");
