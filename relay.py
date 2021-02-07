#!/usr/bin/env python
import mysql.connector
import RPi.GPIO as GPIO # Import Raspberry Pi GPIO library
from time import sleep # Import the sleep function from the time module


GPIO.setwarnings(False) # Ignore warning for now
GPIO.setmode(GPIO.BOARD) # Use physical pin numbering
GPIO.setup(12, GPIO.OUT, initial=GPIO.LOW) # Set BCM 18 to be an output BCM and set initial value to low (off)
GPIO.setup(16, GPIO.OUT, initial=GPIO.LOW) # Set BCM 23 to be an output BCM and set initial value to low (off)
GPIO.setup(18, GPIO.OUT, initial=GPIO.LOW) # Set BCM 24 to be an output BCM and set initial value to low (off)
GPIO.setup(22, GPIO.OUT, initial=GPIO.LOW) # Set BCM 25 to be an output BCM and set initial value to low (off)


while True:
        db1 = mysql.connector.connect(
        user='root', 
        password='holmes123', 
        host='localhost', 
        database='raspi') 

        cursor1 = db1.cursor(dictionary=True)
        sql1 = "select *from sensor where id = '23'"
        cursor1.execute(sql1)
        result1 = cursor1.fetchone()

        button_state1 = result1["sens_value"]
        if button_state1 == 1 :
            GPIO.output(12, GPIO.HIGH)
            sleep(1)
        if button_state1 == 0 :
            GPIO.output(12, GPIO.LOW)
            sleep(1)
## Batas database untuk button 2
        db2 = mysql.connector.connect(
        user='root', 
        password='holmes123', 
        host='localhost', 
        database='raspi') 

        cursor2 = db2.cursor(dictionary=True)
        sql2 = "select *from sensor where id = '24'"
        cursor2.execute(sql2)
        result2= cursor2.fetchone()

        button_state2 = result2["sens_value"]
        if button_state2 == 1 :
            GPIO.output(16, GPIO.HIGH)
            sleep(1)
        if button_state2 == 0 :
            GPIO.output(16, GPIO.LOW)
            sleep(1)
## Batas database untuk button 3
        db3 = mysql.connector.connect(
        user='root', 
        password='holmes123', 
        host='localhost', 
        database='raspi') 

        cursor3 = db3.cursor(dictionary=True)
        sql3 = "select *from sensor where id = '24'"
        cursor3.execute(sql3)
        result3= cursor3.fetchone()

        button_state3 = result3["sens_value"]
        if button_state3 == 1 :
            GPIO.output(18, GPIO.HIGH)
            sleep(1)
        if button_state3 == 0 :
            GPIO.output(18, GPIO.LOW)
            sleep(1)
## Batas database untuk button 3
        db4 = mysql.connector.connect(
        user='root', 
        password='holmes123', 
        host='localhost', 
        database='raspi') 

        cursor4 = db4.cursor(dictionary=True)
        sql4 = "select *from sensor where id = '24'"
        cursor4.execute(sql4)
        result4= cursor4.fetchone()

        button_state4 = result4["sens_value"]
        if button_state4 == 1 :
            GPIO.output(22, GPIO.HIGH)
            sleep(1)
        if button_state4 == 0 :
            GPIO.output(22, GPIO.LOW)
            sleep(1)



