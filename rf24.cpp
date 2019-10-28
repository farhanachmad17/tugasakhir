#include <iostream>
#include <RF24/RF24.h>

RF24 radio(RPI_V2_GPIO_P1_15, RPI_V2_GPIO_P1_24, BCM2835_SPI_SPEED_8MHZ);
const uint8_t address[6] = "00001";

void setup(void) 
{
  radio.begin();
  radio.setPALevel(RF24_PA_MIN);
  radio.openReadingPipe(0, address);
  radio.startListening();
}

int main(int argc, char** argv) {
  setup();

while (true) 
{
  if (radio.available()) 
  {
    int distance = radio.getDynamicPayloadSize();
    char* payload = new char[distance + 1];
    radio.read(&distance, sizeof(distance));
    distance[payload] = '\0';
    std::cout << "Ketinggian : " << distance << std::endl;
  }
}
}
