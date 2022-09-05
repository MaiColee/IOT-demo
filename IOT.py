import mysql.connector as mysql
import RPi.GPIO as GPIO
import time
import os
import sys
import subprocess
#set up gpio interface
GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)
GPIO.setup(18,GPIO.OUT)
#define connection variables
HOST = "192.168.0.101"
DATABASE = "iot"
USER = "pi"
PASSWORD = "1234"
db_connection = mysql.connect(host=HOST, database=DATABASE, user=USER, password=PASSWORD)
#Output connection success
print("Connected to", db_connection.get_server_info())
mycursor = db_connection.cursor()
#Run the query
sql = "SELECT STATE FROM rasp WHERE ID = '1'"
mycursor.execute(sql)
myresult = mycursor.fetchall()
#Compare the query with 1 and if it matches, it sets the LED to on
if (1,) == myresult[0]:
  GPIO.output(18,GPIO.HIGH)
  print("On")
#Turn the LED off if its anything other than 1
else:
  GPIO.output(18,GPIO.LOW)
  print("Off")
#Slowing the loop to prevent too many connections
time.sleep(1)
#Restarts the script to query again
subprocess.call([sys.executable, os.path.realpath(__file__)] +
sys.argv[1:])