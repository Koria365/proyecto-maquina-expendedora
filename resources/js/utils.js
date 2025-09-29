// Utilidades básicas para jQuery + Tailwind CSS
// Funciones auxiliares esenciales

// Generar ID único
function generateId() {
  return Date.now() + Math.random().toString(36).substr(2, 9);
}

// Logger básico
const Logger = {
  info: (message, data = null) => {
    console.log(`ℹ️ [INFO] ${message}`, data || "");
  },

  error: (message, error = null) => {
    console.error(`❌ [ERROR] ${message}`, error || "");
  },

  success: (message, data = null) => {
    console.log(`✅ [SUCCESS] ${message}`, data || "");
  },

  warning: (message, data = null) => {
    console.warn(`⚠️ [WARNING] ${message}`, data || "");
  },
};

// Helpers básicos para animaciones con Tailwind CSS
const AnimationHelper = {
  fadeIn: (element, duration = 300) => {
    $(element).hide().fadeIn(duration);
  },

  fadeOut: (element, duration = 300) => {
    $(element).fadeOut(duration);
  },

  slideToggle: (element, duration = 300) => {
    $(element).slideToggle(duration);
  },

  shake: (element) => {
    $(element).addClass("animate-pulse");
    setTimeout(() => {
      $(element).removeClass("animate-pulse");
    }, 500);
  },

  bounce: (element) => {
    $(element).addClass("animate-bounce");
    setTimeout(() => {
      $(element).removeClass("animate-bounce");
    }, 1000);
  },
};

// Helper básico para storage local
const Storage = {
  set: (key, value) => {
    try {
      localStorage.setItem(key, JSON.stringify(value));
      return true;
    } catch (error) {
      Logger.error("Error guardando en localStorage", error);
      return false;
    }
  },

  get: (key, defaultValue = null) => {
    try {
      const item = localStorage.getItem(key);
      return item ? JSON.parse(item) : defaultValue;
    } catch (error) {
      Logger.error("Error leyendo de localStorage", error);
      return defaultValue;
    }
  },

  remove: (key) => {
    try {
      localStorage.removeItem(key);
      return true;
    } catch (error) {
      Logger.error("Error removiendo de localStorage", error);
      return false;
    }
  },

  clear: () => {
    try {
      localStorage.clear();
      return true;
    } catch (error) {
      Logger.error("Error limpiando localStorage", error);
      return false;
    }
  },
};

// Debounce function para optimizar eventos
function debounce(func, wait, immediate) {
  let timeout;
  return function executedFunction(...args) {
    const later = () => {
      timeout = null;
      if (!immediate) func(...args);
    };
    const callNow = immediate && !timeout;
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
    if (callNow) func(...args);
  };
}

// Throttle function para optimizar scroll/resize events
function throttle(func, limit) {
  let inThrottle;
  return function () {
    const args = arguments;
    const context = this;
    if (!inThrottle) {
      func.apply(context, args);
      inThrottle = true;
      setTimeout(() => (inThrottle = false), limit);
    }
  };
}

// Helper básico para AJAX con jQuery
const AjaxHelper = {
  post: (url, data, options = {}) => {
    return $.ajax({
      url: url,
      method: "POST",
      data: data,
      dataType: options.dataType || "json",
      beforeSend: options.beforeSend || null,
      success: options.success || null,
      error: options.error || null,
      complete: options.complete || null,
    });
  },

  get: (url, data = {}, options = {}) => {
    return $.ajax({
      url: url,
      method: "GET",
      data: data,
      dataType: options.dataType || "json",
      beforeSend: options.beforeSend || null,
      success: options.success || null,
      error: options.error || null,
      complete: options.complete || null,
    });
  },
};

// Exportar para uso global
window.Utils = {
  generateId,
  Logger,
  AnimationHelper,
  Storage,
  debounce,
  throttle,
  AjaxHelper,
};

Logger.info("🔧 Utilidades básicas cargadas");
