#include <nRF24L01.h>
#include <printf.h>
#include <RF24.h>
#include <RF24_config.h>
#include <SPI.h>

#include <Wire.h>
#include <LiquidCrystal_I2C.h>

LiquidCrystal_I2C lcd(0x27, 16, 2);

const int trigPin = 5;
const int echoPin = 6;
int jarakmax = 330; //Jarak maksimum sensor ke permukaan air
int ketinggian; 
long duration;
int distance;
    
    RF24 radio(9,10);
    const byte address[6] = "00002";
    
    
    void setup()
    {
    lcd.init();
    lcd.backlight();
    Serial.begin(57600);
    pinMode(trigPin, OUTPUT);
    pinMode(echoPin, INPUT);
    radio.begin();
    radio.openWritingPipe(address);
    radio.setPALevel(RF24_PA_MIN);
    radio.stopListening();
    radio.printDetails();
    }

    void loop()
    {
      digitalWrite(trigPin, LOW);
      delayMicroseconds(2);
      digitalWrite(trigPin, HIGH);
      delayMicroseconds(2);
      digitalWrite(trigPin, LOW);
      duration = pulseIn(echoPin, HIGH);
      distance = duration*0.034/2;
      ketinggian = jarakmax-distance;

    if (ketinggian >= 2  && ketinggian < 80) {
       Serial.print("Ketinggian Air : ");
       Serial.print(ketinggian);
       Serial.println(" cm"); 
       Serial.println(" SIAGA IV - AMAN");
       lcd.setCursor(2,0);
       lcd.print ("   ");
       lcd.setCursor(5,0);
       lcd.print (ketinggian);
       lcd.print ("     ");
       lcd.setCursor(9,0);
       lcd.print ("CM   ");
       lcd.setCursor(0,1);
       lcd.print ("SIAGA 4<>AMAN    ");
    }
    if (ketinggian >= 80 && ketinggian <= 150) { 
       Serial.print("Ketinggian Air : ");
       Serial.print(ketinggian);
       Serial.println(" cm"); 
       Serial.println(" SIAGA III - WASPADA");
       lcd.setCursor(2,0);
       lcd.print ("   ");
       lcd.setCursor(5,0);
       lcd.print (ketinggian);
       lcd.print ("     ");
       lcd.setCursor(9,0);
       lcd.print ("CM   ");
       lcd.setCursor(0,1);
       lcd.print ("SIAGA 3<>WASPADA  ");
    }
    if (ketinggian > 150 && ketinggian <= 220){
       Serial.print("Ketinggian Air : ");
       Serial.print(ketinggian);
       Serial.println(" cm"); 
       Serial.println(" SIAGA II - KRITIS");
       lcd.setCursor(2,0);
       lcd.print ("   ");
       lcd.setCursor(5,0);
       lcd.print (ketinggian);
       lcd.print ("     ");
       lcd.setCursor(9,0);
       lcd.print ("CM   ");
       lcd.setCursor(0,1);
       lcd.print ("SIAGA 2<>KRITIS   ");
    }
    if (ketinggian > 220 && ketinggian <= 300){
       Serial.print("Ketinggian Air : ");
       Serial.print(ketinggian);
       Serial.println(" cm"); 
       Serial.println(" SIAGA I - BENCANA");
       lcd.setCursor(2,0);
       lcd.print ("   ");
       lcd.setCursor(5,0);
       lcd.print (ketinggian);
       lcd.print ("     ");
       lcd.setCursor(9,0);
       lcd.print ("CM   ");
       lcd.setCursor(0,1);
       lcd.print ("SIAGA 1<>BENCANA  ");
     }  
    if (distance > 2 && distance <= 300) {
    radio.write( &ketinggian, sizeof(ketinggian) );
    }
    else {
      Serial.println("Out of Range");
      lcd.setCursor(2,0);
      lcd.print ("Out of Range  ");
      lcd.setCursor(0,1);
      lcd.print ("                       ");
      
    }
    
    delay(1000);
    }
