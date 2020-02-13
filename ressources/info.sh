#!/bin/bash

if [ -f /tmp/philips_dependancy ]; then
   	echo "Installation en cours ..."
	exit 2
else
	if [ -f /var/www/html/plugins/philips/ressources/philips_version ]; then
   		echo "Installation ok"
		exit 0
    else
     	echo "Installation nok"
		exit 1
	fi
fi