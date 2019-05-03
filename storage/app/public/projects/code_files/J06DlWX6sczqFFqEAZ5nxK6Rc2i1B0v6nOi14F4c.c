/* Modbus RTU to MQTT bridge for Finder Energy Meter
 * -------------------------------------------------
 * This sketch provides a full bridge between the finder energy meter and mqtt.  
 * Developed to monitor electricity costs and usage in Casa Jasmina.
 * RS485 Half Duplex 9600baud with termination (HALF, Y\/\/Z)
 * ------------------------
 * ARDUINO        FINDER
 *    Y   ------->   A(-)
 *    Z   ------->   B(+)
 * ISOGND ------->   COM
 * ------------------------
 * Materials:
 * Arduino MKR WIFI1010
 * Arduino MKR 485 Shield
 * Finder 7E.64.8.230.0210
 * ------------------------
 * Created by Alberto Perro
 * Officine Innesto 2018
*/
//import libraries
#include <ArduinoRS485.h>
#include <ArduinoModbus.h>
#include <WiFiNINA.h>
#include <MQTT.h>
//your wifi credentials
const char ssid[] = "**********";
const char pass[] = "**********";

WiFiClient net;
MQTTClient client;
unsigned long rate = 60000; // default refresh rate in ms
unsigned long lastMillis = 0;

//connect function
void connect() {
  Serial.print("checking wifi...");
  while (WiFi.status() != WL_CONNECTED) {
    Serial.print(".");
    delay(1000);
  }
  Serial.print("\nconnecting...");
  while (!client.connect("device_name", "user_name", "user_pw")) { //CHANGE TO MATCH YOUR SETUP
    Serial.print(".");
    delay(1000);
  }
  Serial.println("\nconnected!");
  client.subscribe("energy/main/refreshrate"); //topic to set refresh rate remotely
  
}
//mqtt receive callback function
void messageReceived(String &topic, String &payload) {
  Serial.println("incoming: " + topic + " - " + payload);
  if(topic == "energy/main/refreshrate"){   //refresh rate handler
    rate = payload.toInt()*1000;
    Serial.println("new rate "+String(rate));
  }
}

void setup() {
  Serial.begin(115200);
  WiFi.begin(ssid, pass);
  while (!Serial);
  client.begin("broker_ip", net);   //CHANGE TO MATCH YOUR SETUP
  client.onMessage(messageReceived);
  // start the Modbus RTU client
  if (!ModbusRTUClient.begin(9600)) {
    Serial.println("Failed to start Modbus RTU Client!");
    while (1);
  }
}

void loop() {
  
  client.loop();
  if (!client.connected()) { //check network connection
    connect();
  }
  // publish a message after refresh elapsed (non-blocking routine)
  if (millis() - lastMillis > rate) {
    lastMillis = millis();
    //make all the read calls
    float volt = readVoltage();
    delay(100);
    float amp = readCurrent();
    delay(100);
    double watt = readPower();
    delay(100);
    float hz = readFreq();
    delay(100);
    double wh = readEnergy();
    //publish results under related topics
    client.publish("energy/main/voltage", String(volt,3));
    client.publish("energy/main/current", String(amp,3));
    client.publish("energy/main/power", String(watt,3));
    client.publish("energy/main/frequency", String(hz,3));
    client.publish("energy/main/energy", String(wh,3));
    Serial.print(String(volt,3)+"V "+String(amp,3)+"A "+String(watt,3)+"W ");
    Serial.println(String(hz,3)+"Hz "+String(wh,3)+"kWh");
    delay(100);
  }
}

/* Functions to read Finder Energy Meter registers
 *  
 * Check the modbus protocol manual to understand the code
 * https://gfinder.findernet.com/public/attachments/7E/EN/PRT_Modbus_7E_64_68_78_86EN.pdf
 */
 
float readVoltage(){
  float volt = 0.;
  if (!ModbusRTUClient.requestFrom(0x01, HOLDING_REGISTERS, 0x000C, 2)) { //make the call to the register
    Serial.print("failed to read voltage! ");
    Serial.println(ModbusRTUClient.lastError()); //error handler
  }else{
    uint16_t word1 = ModbusRTUClient.read();  //read data from the buffer
    uint16_t word2 = ModbusRTUClient.read();
    uint32_t millivolt = word1 << 16 | word2; //bit math
    volt = millivolt/1000.0;
  }
  return volt;
}
float readCurrent(){
    float ampere = 0.;
  if (!ModbusRTUClient.requestFrom(0x01, HOLDING_REGISTERS, 0x0016, 2)) {
    Serial.print("failed to read current! ");
    Serial.println(ModbusRTUClient.lastError());
  }else{
    uint16_t word1 = ModbusRTUClient.read();
    uint16_t word2 = ModbusRTUClient.read();
    int32_t milliamp = word1 << 16 | word2;
    ampere = milliamp/1000.0;
  }
  return ampere;
}

double readPower(){
    double watt = 0.;
  if (!ModbusRTUClient.requestFrom(0x01, HOLDING_REGISTERS, 0x0025, 3)) {
    Serial.print("failed to read power! ");
    Serial.println(ModbusRTUClient.lastError());
  }else{
    uint16_t word1 = ModbusRTUClient.read();
    uint16_t word2 = ModbusRTUClient.read();
    uint16_t word3 = ModbusRTUClient.read();
    uint64_t milliwatt;
    if(word1 >> 7 == 0){
      milliwatt = word1 << 32 | word2 << 16 | word3;
    }else{
      word1 &= 0b01111111;
      milliwatt = 0b1 << 48 | word1 << 32 | word2 << 16 | word3;
    }
    watt = milliwatt/1000.;
  }
  return watt;
}
float readFreq(){
    float freq = 0.;
  if (!ModbusRTUClient.requestFrom(0x01, HOLDING_REGISTERS, 0x0040, 2)) {
    Serial.print("failed to read frequency! ");
    Serial.println(ModbusRTUClient.lastError());
  }else{
    uint16_t word1 = ModbusRTUClient.read();
    freq = word1/1000.0;
  }
  return freq;
}
double readEnergy(){
    double kwh = 0.;
  if (!ModbusRTUClient.requestFrom(0x01, HOLDING_REGISTERS, 0x0109, 3)) {
    Serial.print("failed to read energy! ");
    Serial.println(ModbusRTUClient.lastError());
  }else{
    uint16_t word1 = ModbusRTUClient.read();
    uint16_t word2 = ModbusRTUClient.read();
    uint16_t word3 = ModbusRTUClient.read();
    uint64_t dwh = word1 << 32 | word2 << 16 | word3;
    kwh = dwh/10000.0;
  }
  return kwh;
}
