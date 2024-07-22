#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>

// WiFi credentials
#define WIFI_SSID "PG_2023"
#define WIFI_PASSWORD "987654321"

// Host URL (HTTP version for testing)
#define HOST "http://pgcresearch.co.in/PG/IOT/pages/DOLGetstatus.php"

// GPIO Pins
#define ON_BOARD_LED LED_BUILTIN // On-board LED of ESP8266
//#define ON_BOARD_LED D0 // On-board LED of ESP8266
//#define ON_BOARD_LED 2 // On-board LED of ESP8266
#define ON D0
#define OFF D1
#define TV_PIN D2
#define SPEAKER_PIN D3

void setup() {
    pinMode(ON_BOARD_LED, OUTPUT);
    pinMode(ON, OUTPUT);
    pinMode(OFF, OUTPUT);
    pinMode(TV_PIN, OUTPUT);
    pinMode(SPEAKER_PIN, OUTPUT);

    digitalWrite(ON_BOARD_LED, LOW); 
    digitalWrite(ON, LOW); 
     digitalWrite(OFF, LOW); 
      digitalWrite(TV_PIN, LOW); 
       digitalWrite(SPEAKER_PIN, LOW); 

    Serial.begin(115200);
    Serial.println("Communication Started");

    // Connect to WiFi
    WiFi.mode(WIFI_STA);
    WiFi.begin(WIFI_SSID, WIFI_PASSWORD);

    Serial.print("Connecting to ");
    Serial.print(WIFI_SSID);
    while (WiFi.status() != WL_CONNECTED) {
        Serial.print(".");
        delay(500);
    }
    Serial.println();
    Serial.print("Connected to ");
    Serial.println(WIFI_SSID);
    Serial.print("IP Address: ");
    Serial.println(WiFi.localIP());

    delay(1000); // Initial delay to stabilize the connection
}

void loop() {
    if (WiFi.status() != WL_CONNECTED) {
        Serial.println("WiFi not connected!");
        delay(1000);
        return;
    }

    WiFiClient client;  // Create a WiFiClient object
    HTTPClient http;
    Serial.print("Connecting to: ");
    Serial.println(HOST);
    http.begin(client, HOST);  // Pass the client and the URL to the begin method
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");

    int retries = 3;
    int httpCode = -1;
    while (retries > 0) {
        httpCode = http.GET();
        if (httpCode > 0) {
            break;
        } else {
            Serial.print("HTTP GET request failed, retrying... ");
            Serial.println(http.errorToString(httpCode));
            retries--;
            delay(2000);  // Delay before retrying
        }
    }

    if (httpCode > 0) { // Check if the GET request was successful
        String payload = http.getString();
        
        if (payload.length() >= 2) {
            String led = payload.substring(0, 1);
            String fan = payload.substring(1, 2);
            //String tv = payload.substring(2, 3);
            //String speaker = payload.substring(3, 4);
            if (led == "1")
            {digitalWrite(ON, HIGH);
            Serial.println("ON: " + led);
            delay(3000);
            digitalWrite(ON, LOW);}
            else if (led == "0")
            {
            digitalWrite(ON, LOW);
            Serial.println("ON: " + led);}
            if (fan == "1")
            {digitalWrite(OFF, HIGH);
            Serial.println("OFF: " + fan);
            delay(3000);
            digitalWrite(OFF, LOW);}
             else if (fan == "0")
             {
            digitalWrite(OFF, LOW);
            Serial.println("OFF: " + fan);}
            
            
            

    http.end(); // Free resources
    delay(5000); // Adjust delay as needed
}
}
}
