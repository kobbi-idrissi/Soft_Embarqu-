import sqlite3
import time
import RPi.GPIO as GPIO


GPIO.setmode(GPIO.BCM)
led = 22



GPIO.setup(led, GPIO.OUT)

def get_temp(i):
	with open('temperature.txt', 'r') as f:
		s = f.readline()
		print "Name of the file: ", f.name
    		while s:
        # do whatever you want to
        		tempvalue= f.readlines()[i]
			if tempvalue>38 :
				GPIO.output(led, GPIO.HIGH)
            			time.sleep(5)
            			GPIO.output(led, GPIO.LOW)
			return tempvalue
def log_temperature(temp):
	conn=sqlite3.connect('tempbase.db')
	curs=conn.cursor()
	curs.execute("INSERT INTO temps values(datetime('now'), (?))", (temp,))
# commit the changes
	conn.commit()
	conn.close()
def display_data():
	conn=sqlite3.connect('tempbase.db')
	curs=conn.cursor()
	for row in curs.execute("SELECT * FROM temps"):
		print str(row[0])+" "+str(row[1])
	conn.close()
def main(i):
	#while True:
# get the temperature from the device file
		temperature = get_temp(i)
		c= sum(1 for line in open('temperature.txt'))
                if i==c-1:
                	i=0
                else:
			i=i+1
		if temperature != None:
			print "temperature="+str(temperature)
		else:
# Sometimes reads fail on the first attempt
# so we need to retry
			temperature = get_temp(i)
			i=i+1
			print "temperature="+str(temperature)
# Store the temperature in the database
		log_temperature(temperature)
# display the contents of the database
		display_data()
		time.sleep(1)
i=0
if __name__=="__main__":
	main(i)
