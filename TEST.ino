#include <SPI.h>
#include <MFRC522.h>
#include <Wire.h>
#include <LiquidCrystal_I2C.h>
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>

LiquidCrystal_I2C lcd(0x27, 16, 2);  // Alamat I2C dan ukuran LCD

const char* ssid = "Lawliet";
const char* password = "hurufkapital";
const char* host = "192.168.158.235";
const int httpPort = 8080; // Ganti dengan port yang sesuai

#define LED_PIN 15
#define BTN_PIN 5

#define SDA_PIN 2
#define RST_PIN 0

#define BUZZER_PIN 15 // Ganti dengan pin yang sesuai
int buzzerFrequency = 1000; // Ganti dengan frekuensi yang Anda inginkan

MFRC522 mfrc522(SDA_PIN, RST_PIN);

WiFiClient client; // Membuat objek WiFiClient

void setup() {
  Serial.begin(9600);
  pinMode(LED_PIN, OUTPUT);
  pinMode(BTN_PIN, INPUT_PULLUP); // Menggunakan INPUT_PULLUP agar tidak perlu resistor eksternal

  WiFi.hostname("NodeMCU");
  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("WiFi Connected");
  Serial.print("IP Address: ");
  Serial.println(WiFi.localIP());

  SPI.begin();
  mfrc522.PCD_Init();
  lcd.init();
  lcd.backlight();
  lcd.setCursor(4, 0);
  lcd.print("Silahkan");
  lcd.setCursor(2, 1);
  lcd.print("Scan ID Anda");
  Serial.println("Dekatkan Kartu RFID Anda ke Reader");
  Serial.println();

  pinMode(BUZZER_PIN, OUTPUT);
  digitalWrite(BUZZER_PIN, LOW); // Matikan buzzer awalnya
}

void loop() {
  if (digitalRead(BTN_PIN) == LOW) {
    digitalWrite(LED_PIN, HIGH);
    tone(BUZZER_PIN, buzzerFrequency);
    delay(100);
    while (digitalRead(BTN_PIN) == LOW);
    noTone(BUZZER_PIN);
    String getData, Link;
    HTTPClient http;
    Link = "http://" + String(host) + ":" + String(httpPort) + "/absensi/ubahmode.php";
    http.begin(client, Link);

    int httpCode = http.GET();
    String payload = http.getString();
    Serial.println(payload);
    http.end();

    lcd.clear();
    if (httpCode == 200) {
      lcd.setCursor(4, 0);
      lcd.print("Berganti");
      lcd.setCursor(6, 1);
      lcd.print("Menu");
    } else {
      lcd.setCursor(0, 0);
      lcd.print("Gagal");
    }

    delay(2000);
    lcd.clear();
    lcd.setCursor(4, 0);
    lcd.print("Silahkan");
    lcd.setCursor(2, 1);
    lcd.print("Scan ID Anda");
    digitalWrite(LED_PIN, LOW);
  }

  if (!mfrc522.PICC_IsNewCardPresent())
    return;

  if (!mfrc522.PICC_ReadCardSerial())
    return;

  String IDTAG = "";
  for (byte i = 0; i < mfrc522.uid.size; i++) {
    IDTAG += mfrc522.uid.uidByte[i];
    tone(BUZZER_PIN, buzzerFrequency);
    digitalWrite(LED_PIN, HIGH);
    delay(100);
    noTone(BUZZER_PIN);
    digitalWrite(LED_PIN, LOW);
    
  }


  lcd.clear();
  lcd.setCursor(2, 0);
  lcd.print("Scan ID Anda");
  lcd.setCursor(4, 1);
  lcd.print("Berhasil");

  delay(2000);
  lcd.clear();
  lcd.setCursor(4, 0);
  lcd.print("Silahkan");
  lcd.setCursor(2, 1);
  lcd.print("Scan ID Anda");



  WiFiClient client1; // Menggunakan objek WiFiClient yang berbeda
  HTTPClient http1;
  String Link1 = "http://" + String(host) + ":" + String(httpPort) + "/absensi/kirimkartu.php?nokartu=" + IDTAG;
  http1.begin(client1, Link1);

  int http1Code = http1.GET();
  String payload1 = http1.getString();
  Serial.println(payload1);
  http1.end();

  delay(2000);
}
