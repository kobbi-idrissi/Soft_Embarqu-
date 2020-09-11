# Soft_Embarqué

# Application :STOP COVID19
STOP COVID19 est une application Client /serveur ,le client c’est l’utilisateur de l’application qui permet de contrôler l‘actionneur  et d’acquérir les valeurs des capteurs, le serveur c'est une carte Raspberry Pi.
Elle a pour but d’éviter La propagation du coronavirus ,soulager le système de santé et ainsi de prévenir le risque de mort.
- [x] utiliser un buzzer pour le système d'apple malade
- [x] utiliser un capteur de température pour capter le température du client chaque 3min
- [x] utliser un capteur de distance pour mesurer la distance entre notre client et leur entourage
- [x] utiliser un capteur de movement pour prévenir le risque de mort des patients.

## démarrage:
la 1ére étape à faire c'est de rendre les gpio accessible pour le user,pour le faire il faut les exporter et aprés il faut choisir la direction out/in :
voici un exemple pour le gpio18
```
 echo 18 > /sys/class/gpio/export
 echo out > /sys/class/gpio/gpio18/direction
 echo in > /sys/class/gpio/gpio18/direction
```
Pour bien tester cela , il est préférable d'utiliser une led et voir si elle s'allume. 
```
 echo 0 > /sys/class/gpio/gpio18/value 
 echo 1 > /sys/class/gpio/gpio18/value 
```

## installation et activation:
Il faut installer le serveur lighttpd et le php
```
 sudo apt-get install lighttpd
 sudo apt-get php7.0-commen php7.0-cgi php7.0
```
 > si vous trouvez des problèmes avec 'php7.0' essayer de la remplacer avec 'php7.1'.

Pour activer les modules , on utilise la commande lighty-enable-mod:
```
 sudo lighty-enable-mode fastcgi-php
 sudo service lighttpd force-reload
```
On crée un dossier dans www et change les droits, et on ajoute le user gpio dans le groupe de www-data qui est le user de web:
```
 sudo usermod -a -G www-data pi
 mkdir /www/c-bin
 chmod 755/www/c-bin
 chmod 4755/www/c-bin/buzzer
 sudo usermod -a -G gpio www-data
```
Installation de la base de donnée SQLITE3:
```
 apt-get update
 apt-get install sqlite3
 apt-get install php7.0-sqlite3
 sudo service lighted restart
```

## Environnement technique du projet
###### matériel utilisé:
 carte électronique Raspberry Pi 3 b+
 capteur de mouvement PIR,led,utlrasonic,buzzer
###### les langages et la plateforme
 langages:php,pyton,C
 serveur:ligthppd
 base de donée:SQLITE3
 j'ai utilisé WiringPi dans le code C de capteur de mouvement,pour avoir une pltae-forme commune est unique et un ensemble de fonctions pour accéder au GPIO de raspberry.***ATTENTION Wirigni Pi utilise son propre schéma de numération des broches.*** vous trouez plus d'inormations sur ce [site](https://fr.pinout.xyz/pinout/wiringpi).

## Compilation et éxecution:
code C :
```
  compulation du code buzzer : gcc -o buzzer buzzer.c io.c
  Execution du code buzzer :./buzzer 1  ou bien ./buzzer 0
  compulation du code de capteur PIR :gcc -Wall PIR.c PIR -lwiringPi
  Execution du code de capteur PIR : sudo ./PIR
 ```
code python:
 > python nom_fichier.py

Il est mieux d'utliser ***cron***
Pour ouvrir et modifier il suffit de taper la commnde suivant:
```
 sudo crontab -e
```
Par exemple pour éxecuter le code python de capteur de distance chaque 3min alors on ajoute le ligne sivant:
```
*/3 * * * * sudo python /www/code/acquisition-distance.py > /www/code/resultat.txt
```
