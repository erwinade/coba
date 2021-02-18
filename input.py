#!/usr/bin/env python
# -*- coding: utf-8 -*-
# lsusb to check device name
#dmesg | grep "tty" to find port name
import mysql.connector
import serial
import time

ser = serial.Serial('/dev/ttyUSB0',9600)


while True:
        for i in range(5, -1, -1): 
                
                time.sleep(1)
                line=ser.readline().strip()
                values = line.decode('ascii').split('|')
                id_th = (values[i][0:2])
                nilai = (values[i][3:6])
                nilai = int(nilai)
                print(values[0])
                print(id_th)
                print(nilai)

                db = mysql.connector.connect(
                user='root', 
                password='holmes123', 
                host='localhost', 
                database='raspi') 
                cursor = db.cursor(dictionary=True)

                sql = "select *from sensor where id = 17"
                val = (id_th)
                cursor.execute(sql,val)
                result = cursor.fetchone()
                min_th = result['threshold_min']
                max_th = result['threshold_max']
                #print(min_th)
                if nilai > min_th and nilai < max_th:
                        status = "Normal"
                if nilai < min_th or nilai > max_th:
                        status = "Alarm"
                
                #print(status)
                cursor = db.cursor(dictionary=True)
                sql = "UPDATE sensor SET sens_value = %s, status_sensor = %s WHERE id = %s"
                val = (nilai, status, id_th)
                cursor.execute(sql,val)

                db.commit()

