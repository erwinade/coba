#!/usr/bin/env python
import mysql.connector
import RPi.GPIO as GPIO # Import Raspberry Pi GPIO library
from time import sleep # Import the sleep function from the time module


GPIO.setwarnings(False) # Ignore warning for now
GPIO.setmode(GPIO.BOARD) # Use physical pin numbering
GPIO.setup(16, GPIO.OUT, initial=GPIO.LOW) # Set pin 8 to be an output pin and set initial value to low (off)


#try:
while True:
        db = mysql.connector.connect(
        user='root', 
        password='holmes123', 
        host='localhost', 
        database='raspi') 

        cursor = db.cursor(dictionary=True)
        sql = "select *from sensor where sens_type = 'relay'"
        cursor.execute(sql)
        result = cursor.fetchone()

        button_state = result["sens_value"]
        id = result["id"]
        if button_state == 1 and id == 23:
            GPIO.output(16, GPIO.HIGH)
            sleep(1)
        if button_state == 0 and id == 23:
            GPIO.output(16, GPIO.LOW)
            sleep(1)
        if button_state == 1 and id == 24:
            GPIO.output(16, GPIO.HIGH)
            sleep(1)
        if button_state == 0 and id == 24:
            GPIO.output(16, GPIO.LOW)
            sleep(1)
        if button_state == 1 and id == 25:
            GPIO.output(16, GPIO.HIGH)
            sleep(1)
        if button_state == 0 and id == 25:
            GPIO.output(16, GPIO.LOW)
            sleep(1)
        if button_state == 1 and id == 26:
            GPIO.output(16, GPIO.HIGH)
            sleep(1)
        if button_state == 0 and id == 26:
            GPIO.output(16, GPIO.LOW)
            sleep(1)


