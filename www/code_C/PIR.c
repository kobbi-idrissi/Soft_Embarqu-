#include <wiringPi.h>
#include <stdio.h>
#include <stdlib.h>

#define BuzzerPin	1 //GPIO18
#define PIRPin	0//GPIO17

int main(void)
{
	// When initialize wiring failed, print messageto screen
	if(wiringPiSetup() == -1){
		printf("setup wiringPi failed !");
		exit(1);
	}
	
	pinMode(BuzzerPin, OUTPUT);
	pinMode(PIRPin,INPUT);

	int mvmt=0;
	
	
		if(!(digitalRead(PIRPin))){
		mvmt=1;
		digitalWrite(BuzzerPin, HIGH);
		delay(200);
		digitalWrite(BuzzerPin, LOW);
		delay(500);
			
}
	
	return mvmt;
}

