#include <Servo.h>

const int botonPin = 9;     // Pin del pulsador
const int servoPin = 7;     // Pin de control del servo

Servo miServo;

int estadoBoton = HIGH;         // Estado actual del botón
int ultimoEstado = HIGH;        // Último estado del botón
bool servoPosicion = false;     // false = 0°, true = 90°

unsigned long ultimoCambio = 0;            // Para anti-rebote
const unsigned long debounce = 50;         // Tiempo de anti-rebote en ms

void setup() {
  pinMode(botonPin, INPUT_PULLUP); // Usar resistencia interna pull-up
  miServo.attach(servoPin);        // Conecta servo
  miServo.write(0);                // Inicia en 0 grados
  Serial.begin(9600);
}

void loop() {
  int lectura = digitalRead(botonPin);

  // Detectar cambios y aplicar anti-rebote
  if (lectura != ultimoEstado) {
    ultimoCambio = millis();
  }

  if ((millis() - ultimoCambio) > debounce) {
    if (lectura != estadoBoton) {
      estadoBoton = lectura;

      // Si se presiona el botón (LOW porque usamos pull-up)
      if (estadoBoton == LOW) {
        servoPosicion = !servoPosicion;             // Alternar posición
        miServo.write(servoPosicion ? 10 : 0);      // Mover servo
        Serial.println(servoPosicion ? "Servo en 90 grados" : "Servo en 0 grados");
      }
    }
  }

  ultimoEstado = lectura;
}
