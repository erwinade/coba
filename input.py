#!/usr/bin/env python
import mysql.connector
import RPi.GPIO as GPIO # Import Raspberry Pi GPIO library
from time import sleep # Import the sleep function from the time module


GPIO.setwarnings(False) # Ignore warning for now
GPIO.setmode(GPIO.BOARD) # Use physical pin numbering
GPIO.setup(7, GPIO.IN) # Set BCM 4 to be an output BCM and set initial value to low (off)
GPIO.setup(11, GPIO.IN) # Set BCM 17 to be an output BCM and set initial value to low (off)
GPIO.setup(13, GPIO.IN) # Set BCM 27 to be an output BCM and set initial value to low (off)
GPIO.setup(15, GPIO.IN) # Set BCM 22 to be an output BCM and set initial value to low (off)
GPIO.setup(29, GPIO.IN) # Set BCM 5 to be an output BCM and set initial value to low (off)
GPIO.setup(31, GPIO.IN) # Set BCM 6 to be an output BCM and set initial value to low (off)

try:
    while True:
        s1 = GPIO.input(7)
        db1 = mysql.connector.connect(
        user='root', 
        password='holmes123', 
        host='localhost', 
        database='raspi') 

        cursor1 = db1.cursor(dictionary=True)
        sql1 = "UPDATE sensor SET sens_value = %s, status_sensor = %s WHERE id = '17'"
        val1 = (s1, "Normal")
        cursor1.execute(sql1,val1)

        db1.commit()
        ############ batas input 1
        s2 = GPIO.input(11)
        db2 = mysql.connector.connect(
        user='root', 
        password='holmes123', 
        host='localhost', 
        database='raspi') 

        cursor2 = db2.cursor(dictionary=True)
        sql2 = "UPDATE sensor SET sens_value = %s, status_sensor = %s WHERE id = '18'"
        val2 = (s2, "Normal")
        cursor2.execute(sql2,val2)

        db2.commit()
        ############ batas input 2
        s3 = GPIO.input(13)
        db3 = mysql.connector.connect(
        user='root', 
        password='holmes123', 
        host='localhost', 
        database='raspi') 

        cursor3 = db3.cursor(dictionary=True)
        sql3 = "UPDATE sensor SET sens_value = %s, status_sensor = %s WHERE id = '19'"
        val3 = (s3, "Normal")
        cursor3.execute(sql3,val3)

        db3.commit()
        ############ batas input 3
        s4 = GPIO.input(15)
        db4 = mysql.connector.connect(
        user='root', 
        password='holmes123', 
        host='localhost', 
        database='raspi') 

        cursor4 = db4.cursor(dictionary=True)
        sql4 = "UPDATE sensor SET sens_value = %s, status_sensor = %s WHERE id = '20'"
        val4 = (s4, "Normal")
        cursor4.execute(sql4,val4)

        db4.commit()
        ############ batas input 4
        s5 = GPIO.input(29)
        db5 = mysql.connector.connect(
        user='root', 
        password='holmes123', 
        host='localhost', 
        database='raspi') 

        cursor5 = db5.cursor(dictionary=True)
        sql5 = "UPDATE sensor SET sens_value = %s, status_sensor = %s WHERE id = '21'"
        val5 = (s5, "Normal")
        cursor5.execute(sql5,val5)

        db5.commit()
        ############ batas input 2
        s6 = GPIO.input(31)
        db6 = mysql.connector.connect(
        user='root', 
        password='holmes123', 
        host='localhost', 
        database='raspi') 

        cursor6 = db6.cursor(dictionary=True)
        sql6 = "UPDATE sensor SET sens_value = %s, status_sensor = %s WHERE id = '22'"
        val6 = (s6, "Normal")
        cursor6.execute(sql6,val6)

        db6.commit()
        ############ batas input 3
        

# When you press ctrl+c, this will be called
finally:
    GPIO.cleanup()