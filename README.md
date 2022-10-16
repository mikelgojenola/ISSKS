# WEB-SISTEMA
## Indizea
* [Sarrera](#Sarrera)
* [Erabilitko teknologia](#Teknologia)
* [Nola hasieratu](#Hasieratu)
* [Datu basea inportatu](#Inportatu)
* [Web-a ireki](#Sartu)
* [Funtzionalitateak](#Funtzionalitateak)
* [Taldekideen informazioa](#Taldekideak)

## Sarrera
Web-sistema garatzeko lan-taldea, Informazio Sistemen Segurtasuna Kudeatzeko Sistemak (ISSKS) ikasgaiari dagokion proiektua.
	
## Teknologia
Proiektua hurrengo baliabide teknologikoekin sortu egin da:
* Ubuntu 22.04.1 LTS
* Docker 20.10.18
* PHP 5-7
	
## Hasieratu
Proiektua hasieratzeko eta erabiltzeko, hurrengo komandoak erabili behar dira Docker-a hasierazteko:

```
$ git clone https://github.com/mikelgojenola/ISSKS
$ cd ISSKS
$ cd docker-lamp
$ docker build -t="web" .
$ docker-compose up
```

## Inportatu
Aurreko komandoak exekutatu ondoren, nabigatzailean localhost:8890 idatzi behar da phpmyadmin-era heltzeko. Hor "Importar" botoia sakatu. "Examinar..." botoia sakatu, eta lehen klonatutako ISSKS karpetan dagoen database.sql fitxategia aukeratu. Azkenik beheko aldean dagoen "Importar" botoia sakatu.

## Sartu
Nabigatzailean localhost:81 jartzean, web orria irekiko da

## Funtzionalitateak
Web-sisteman bezeroa hurrengoa egiteko ahalmena izango du:
* Web-sisteman logeatu eta datu pertsonalak aldatu
* Web-sistematik log out
* Jokuen zerrenda propio bat sortu, eta bertatik jokoen datuak aldatu edo zerrendatik kendu
* Jokuak sistemara gehitu

## Taldekideak
* Ander Casales de la Torre
* Galder Rodríguez Lafuente
* Mikel Gojenola Caro
