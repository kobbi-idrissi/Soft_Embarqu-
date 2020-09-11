#include<string.h>
#include<stdio.h>
#include<stdlib.h>
#include<unistd.h>

#include<time.h>
#include "io.h"

int main(int argc,char *argv[])
{
  S_GPIO_LINE s_line7,s_line8;
  int sw = 1;
 
  int buzzer=atoi(argv[1]);
 
      load_gpio_line(&s_line8,PB0,OUT);
      s_line7 = s_line8;
   

  switch (buzzer) {
    case 0:
      set_gpio_line(&s_line7,!sw);
      break;
    case 1:
      set_gpio_line(&s_line7,sw);
      break;
    default:
      printf("<on/off>: 1 = on, 0=off\n");
      return 1;
  }
}
