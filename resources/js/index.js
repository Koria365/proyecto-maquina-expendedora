// Frontend básico - jQuery + Tailwind CSS
// Solo funciones esenciales para interactividad

$(document).ready(function () {
  console.log("✅ Sistema iniciado - jQuery + Tailwind CSS");

  // Inicializar componentes básicos
  initializeBasicComponents();

  function initializeBasicComponents() {
    // Event listeners básicos
    bindBasicEvents();

    // Inicializar tooltips y efectos hover
    initializeHoverEffects();

    console.log("🎉 Componentes básicos listos");
  }

  function bindBasicEvents() {
    // Efectos básicos para botones
    $(".vending-button, .comprar-btn").on("click", function (e) {
      // Efecto visual en click
      $(this).addClass("scale-95 transition-transform duration-100");
      setTimeout(() => {
        $(this).removeClass("scale-95");
      }, 100);
    });

    // Cerrar modales al hacer click fuera
    $(".modal-overlay").on("click", function (e) {
      if (e.target === this) {
        $(this).addClass("hidden");
      }
    });

    // Botón para cerrar modales
    $(".modal-close").on("click", function () {
      $(this).closest(".modal-overlay").addClass("hidden");
    });
  }

  function initializeHoverEffects() {
    // Efectos hover para cards de productos
    $(".product-slot").hover(
      function () {
        $(this).addClass(
          "transform scale-105 shadow-xl transition-all duration-200"
        );
      },
      function () {
        $(this).removeClass("transform scale-105 shadow-xl");
      }
    );

    // Efectos hover para botones
    $(".vending-button").hover(
      function () {
        $(this).addClass(
          "transform -translate-y-1 shadow-lg transition-all duration-200"
        );
      },
      function () {
        $(this).removeClass("transform -translate-y-1 shadow-lg");
      }
    );
  }

  // Función para mostrar/ocultar elementos
  function toggleElement(selector) {
    $(selector).toggleClass("hidden");
  }

  // Función para mostrar loading
  function showLoading(show = true) {
    if (show) {
      $("#loading-modal").removeClass("hidden").addClass("flex");
    } else {
      $("#loading-modal").addClass("hidden").removeClass("flex");
    }
  }

  // Función básica para notificaciones
  function showNotification(message, type = "info") {
    const notification = $(`
      <div class="fixed top-4 right-4 p-4 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300 ${getNotificationClasses(
        type
      )}">
        <div class="flex items-center space-x-2">
          <i class="${getNotificationIcon(type)}"></i>
          <span>${message}</span>
        </div>
      </div>
    `);

    $("body").append(notification);

    // Animar entrada
    setTimeout(() => {
      notification.removeClass("translate-x-full");
    }, 100);

    // Auto remover después de 3 segundos
    setTimeout(() => {
      notification.addClass("translate-x-full");
      setTimeout(() => {
        notification.remove();
      }, 300);
    }, 3000);
  }

  function getNotificationClasses(type) {
    const classes = {
      success: "bg-green-500 text-white",
      error: "bg-red-500 text-white",
      warning: "bg-yellow-500 text-white",
      info: "bg-blue-500 text-white",
    };
    return classes[type] || classes.info;
  }

  function getNotificationIcon(type) {
    const icons = {
      success: "fas fa-check-circle",
      error: "fas fa-exclamation-circle",
      warning: "fas fa-exclamation-triangle",
      info: "fas fa-info-circle",
    };
    return icons[type] || icons.info;
  }

  // Función para smooth scroll
  function smoothScrollTo(target, duration = 500) {
    $("html, body").animate(
      {
        scrollTop: $(target).offset().top - 100,
      },
      duration
    );
  }

  // Exportar funciones útiles para uso global
  window.UIHelpers = {
    toggleElement,
    showLoading,
    showNotification,
    smoothScrollTo,
  };

  console.log("🔧 Funciones básicas cargadas");
});
