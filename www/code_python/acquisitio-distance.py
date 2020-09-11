
import RPi.GPIO as GPIO
import time
import sqlite3
import glob
import os
import signal
import sys
#global variable 
GPIO.setmode(GPIO.BCM)
speriod=(1.5)
led=22
GPIO.setup(led, GPIO.OUT)
dbname="/home/pi/www/distance-BD.db"


def close(signal, frame):
	print("\nTurning off ultrasonic distance detection...\n")
	GPIO.cleanup() 
	sys.exit(0)
#*****fonction d'aqcuisition de temperature**********
def get_temp():
# initialize GPIO
  pinTrigger = 23
  pinEcho = 24
  
  GPIO.setwarnings(False)
 
  GPIO.setup(pinTrigger, GPIO.OUT)
  GPIO.setup(pinEcho, GPIO.IN)
  
#GPIO.cleanup()

# read data using Pin GPIO21 
  #while True:
   # set Trigger to HIGH
  GPIO.output(pinTrigger, True)
	# set Trigger after 0.01ms to LOW
  time.sleep(0.00001)
  GPIO.output(pinTrigger, False)

  startTime = time.time()
  stopTime = time.time()

	# save start time
  while 0 == GPIO.input(pinEcho):
		startTime = time.time()

	# save time of arrival
  while 1 == GPIO.input(pinEcho):
		stopTime = time.time()

	# time difference between start and arrival
  TimeElapsed = stopTime - startTime
	# multiply with the sonic speed (34300 cm/s)
	# and divide by 2, because there and back
  distance = (TimeElapsed * 34300) / 2

  return distance

#*******stockage de temperature et time********
def log_temperature(distance):
  conn=sqlite3.connect(dbname)
  curs=conn.cursor()
  curs.execute("INSERT INTO distance values((?))",(distance,))
  conn.commit()
  conn.close()
#******affichage le contenu de database**********
def display_data():
  conn=sqlite3.connect(dbname)
  curs=conn.cursor()
  for row in curs.execute("SELECT * FROM distance"):
    print str(row[0])
  conn.close() 

#******fonction principele****
def main():
 #while True:
  distance = get_temp()
  
    #print "distance= "+str(distance)
  print ("Distance: %.1f cm" % distance)
  time.sleep(1)
  if distance < 10 :
    	GPIO.output(led, GPIO.HIGH)
        time.sleep(5)
        GPIO.output(led, GPIO.LOW)

    #print "distance = "+str(distance)
#stockagge de temperature
  log_temperature(distance)
#affichage de database
  #display_data()
  time.sleep(speriod)
if __name__ == "__main__":
	main()
