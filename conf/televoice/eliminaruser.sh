#!/bin/bash
echo $1
i=0
for res in $(cat /etc/asterisk/sip.conf | grep -A 7 -n "\[${1}\]") 
do
	numLineas[$i]=${res:0:4}
	((i=i+1))
done
echo ${numLineas[@]}
echo ${numLineas[0]}
echo ${numLineas[-1]}

sed -i "${numLineas[0]},${numLineas[-1]}d" /etc/asterisk/sip.conf
#for num in ${numLineas[@]}
#do
#	echo "sed -i ${num}d /etc/asterisk/sip.conf"
#done
