#!/bin/bash
cat /var/log/asterisk/messages | awk {'print $1,$2,$3'} > /var/log/asterisk/fechas.txt
cat /var/log/asterisk/messages | awk {'print $4'} > /var/log/asterisk/nivel.txt
cat /var/log/asterisk/messages | awk '{for(i=5;i<=NF;i++) printf $i" "; print ""}' > /var/log/asterisk/messages.txt
paste -d , /var/log/asterisk/fechas.txt /var/log/asterisk/nivel.txt /var/log/asterisk/messages.txt > /var/log/asterisk/logs.csv