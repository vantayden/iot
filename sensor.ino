#include <SPI.h>
#include <ArduinoJson.h>
#include "DHT.h"
#include <ESP8266WiFi.h>

const char* ssid     = "My ASUS";
const char* password = "02061997";
const char* host = "192.168.43.14";  // link server
const int httpPort = 80;
const char* sndData = "/smarthome/Mdl_01/connect_sensor?d=";
const char* recData = "/smarthome/Mdl_01/connect_device?d=";
const char* device_id = "1";

const unsigned long BAUD_RATE = 9600;                 // serial connection speed
const unsigned long HTTP_TIMEOUT = 10000;  // max respone time from server
const size_t MAX_CONTENT_SIZE = 512;       // max size of the HTTP response

WiFiClient client;
 
#define DHTPIN 2 // SENSOR PIN
#define DHTTYPE DHT11 // SENSOR TYPE - THE ADAFRUIT LIBRARY OFFERS SUPPORT FOR MORE MODELS
DHT dht(DHTPIN, DHTTYPE);

long previousMillis = 0;
unsigned long currentMillis = 0;
long interval = 2500; // READING INTERVAL

// set time

unsigned long time1 = 0;
unsigned long time2 = 0;

int t = 0; // TEMPERATURE VAR
int h = 0; // HUMIDITY VAR
String data = "";
String request;
//LED
struct TrangThaiLED {
  char ttLED1[32];
  char ttLED2[32];
  char ttLED3[32];
  char ttLED4[32];
};

String jsLED1;
String jsLED2;
String jsLED3;
String jsLED4;

int led1 = 13;
int led2 = 14;
int led3 = 15;
int led4 = 16;

// ARDUINO entry point #1: runs once when you press reset or power the board
void setup() {
  Serial.begin(115200);
  delay(10);
  
  Serial.println();
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);

  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.println("WiFi connected");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
//  LED
  pinMode(led1, OUTPUT);
  pinMode(led2, OUTPUT);
  pinMode(led3, OUTPUT);
  pinMode(led4, OUTPUT);

//  
//  pinMode(7, OUTPUT);      // sets the digital pin as output
//  pinMode(5, OUTPUT);      // sets the digital pin as output
//  digitalWrite(7, HIGH);
//  digitalWrite(5, LOW);
//  DHT
  dht.begin();
  delay(3000); // GIVE THE SENSOR SOME TIME TO START
  h = (int) dht.readHumidity();
  t = (int) dht.readTemperature();
  data = "";
}
 
void loop() {
  if ( (unsigned long) (millis() - time1) > 60000 ){
  // DHT
  currentMillis = millis();
  if(currentMillis - previousMillis > interval) { // READ ONLY ONCE PER INTERVAL
    previousMillis = currentMillis;
    h = (int) dht.readHumidity();
    t = (int) dht.readTemperature();
  }
  String request = "";
  request += sndData;
  request += device_id;
  request += "&t=";
  request += t;
  request += "&h=";
  request += h;
  Serial.print("Requesting URL: ");
  Serial.println(request);
  //Data DHT
  if (client.connect(host, httpPort)) {
    client.print(String("GET ") + request + " HTTP/1.1\r\n" +
               "Host: " + host + "\r\n" +
               "Connection: close\r\n\r\n");
  }
  time1 = millis();
}


if ( (unsigned long) (millis() - time2) > 1000  ){
  if (client.connected()) {
  client.stop(); // DISCONNECT FROM THE SERVER
  }

   //Data LED
   if (client.connect(host,80)) {
    if (sendRequest(host, recData) && skipResponseHeaders()) {
      TrangThaiLED trangThaiLED;
      if (readReponseContent(&trangThaiLED)) {
        printTrangThaiLED(&trangThaiLED);
      }
    }
  }
  disconnect();
 time2 = millis();
 }
}
 
 
// Initialize Ethernet library
void initEthernet() {
  Serial.println();
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);

  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.println("WiFi connected");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
}
 
// Open connection to the HTTP server
//bool connect(const char* hostName) {
//  Serial.print("Connect to ");
//  Serial.println(hostName);
// 
//  bool ok = client.connect(hostName, 80); //port của XAMPP máy mình cấu hình là 8080
// 
//  Serial.println(ok ? "Connected" : "Connection Failed!");
//  return ok;
//}
 
// Send the HTTP GET request to the server
bool sendRequest(const char* host, const char* resource) {
  
  client.print(String("GET ") + recData + device_id + " HTTP/1.1\r\n" +
               "Host: " + host + "\r\n" +
               "Connection: close\r\n\r\n");
 
  return true;
}
 
// Skip HTTP headers so that we are at the beginning of the response's body
bool skipResponseHeaders() {
  // HTTP headers end with an empty line
  char endOfHeaders[] = "\r\n\r\n";
 
  client.setTimeout(HTTP_TIMEOUT);
  bool ok = client.find(endOfHeaders);
 
  if (!ok) {
    Serial.println("No response or invalid response!");
  }
 
  return ok;
}
bool readReponseContent(struct TrangThaiLED* trangThaiLED) {
  // Compute optimal size of the JSON buffer according to what we need to parse.
  // This is only required if you use StaticJsonBuffer.
  const size_t BUFFER_SIZE =
    JSON_OBJECT_SIZE(8)    // the root object has 8 elements
    + JSON_OBJECT_SIZE(5)  // the "address" object has 5 elements
    + JSON_OBJECT_SIZE(2)  // the "geo" object has 2 elements
    + JSON_OBJECT_SIZE(3)  // the "company" object has 3 elements
    + JSON_OBJECT_SIZE(3)
    + MAX_CONTENT_SIZE;    // additional space for strings
 
  // Allocate a temporary memory pool
  DynamicJsonBuffer jsonBuffer(BUFFER_SIZE);
 
  JsonObject& root = jsonBuffer.parseObject(client);
 
  if (!root.success()) {
    Serial.println("JSON parsing failed!");
    return false;
  }
 
  // Here were copy the strings we're interested in
  strcpy(trangThaiLED->ttLED1, root["mdl1_d_1"]);
  strcpy(trangThaiLED->ttLED2, root["mdl1_d_2"]);
  strcpy(trangThaiLED->ttLED3, root["mdl1_d_3"]);
  strcpy(trangThaiLED->ttLED4, root["mdl1_d_4"]);
 
  return true;
}
 
// Print the data extracted from the JSON
void printTrangThaiLED(const struct TrangThaiLED* trangThaiLED) {
  Serial.print("Trang thai LED 1 = ");
  Serial.println(trangThaiLED->ttLED1);
  Serial.print("Trang thai LED 2 = ");
  Serial.println(trangThaiLED->ttLED2);
  Serial.print("Trang thai LED 3 = ");
  Serial.println(trangThaiLED->ttLED3);
  Serial.print("Trang thai LED 4 = ");
  Serial.println(trangThaiLED->ttLED4);
  jsLED1 = "";
  jsLED2 = "";
  jsLED3 = "";
  jsLED4 = "";
 
  jsLED1 += (trangThaiLED->ttLED1);
  if (jsLED1 != "1") {
    digitalWrite(led1, HIGH);
  } else {
    digitalWrite(led1, LOW);
  }
 
 
  jsLED2 += (trangThaiLED->ttLED2);
  if (jsLED2 != "1") {
    digitalWrite(led2, HIGH);
  } else {
    digitalWrite(led2, LOW);
  }

 jsLED3 += (trangThaiLED->ttLED3);
  if (jsLED3 != "1") {
    digitalWrite(led3, HIGH);
  } else {
    digitalWrite(led3, LOW);
  }

  jsLED4 += (trangThaiLED->ttLED4);
  if (jsLED4 != "1") {
    digitalWrite(led4, HIGH);
  } else {
    digitalWrite(led4, LOW);
  }
 
}
 
// Pause for a 1 minute
void wait() {
  Serial.println("Wait 1 seconds");
  delay(1000);
}

// Close the connection with the HTTP server
void disconnect() {
  Serial.println("Disconnect");
  client.stop();
