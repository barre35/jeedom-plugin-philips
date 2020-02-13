#!/bin/bash

if [ -f /var/www/html/plugins/philips/ressources/philips_version ]; then
	rm /var/www/html/plugins/philips/ressources/philips_version
fi
  
echo "Début d'nstallation des dependances"

echo 0 > /tmp/philips_dependancy

echo 20 > /tmp/philips_dependancy

if [[ $EUID -ne 0 ]]; then
  sudo_prefix=sudo;
fi

echo 40 > /tmp/philips_dependancy

$sudo_prefix apt-get -y update

echo 60 > /tmp/philips_dependancy

$sudo_prefix apt-get -y install android-tools-adb

echo 100 > /tmp/philips_dependancy
  
rm /tmp/philips_dependancy

echo "Fin d'nstallation des dependances"

touch /var/www/html/plugins/philips/ressources/philips_version
  
exit 0