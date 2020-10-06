# Minecraft-api

## Description

Le projet à pour objectif de fournir une API en self-hosted afin de récupérer les données d'un serveur minecraft en fonctionnement.
Il permet également d'interroger l'api officielle de [Mojang](https://wiki.vg/Mojang_API) afin de récupérer le nom, l'id est le skin d'un joueur.

## Pour Commencer
### Prérequis

Le projet a été créé avec symfony il faut donc les logiciels de base.
De quoi avez-vous besoin pour installer et lancer le projet.

- L'exécutable [Composer](https://getcomposer.org/Composer-Setup.exe)
- L'exécutable [Symfony](https://get.symfony.com/cli/setup.exe) pour lancer le serveur
- git pour le versioning
- docker et docker-compose

### Installation

Dans cette partie nous allons vous expliquer pas-à-pas comment paramétrer votre environnement de développement

Première étape vous devez cloner le projet sur votre machine en tapant la commande suivante dans un shell avec git

```shell script
git clone https://github.com/SepraDC/minecraft-api
```
Dupliquez-le .env.example et le renommer en .env.

Quand le projet est cloné dans un dossier local, se rendre dans celui-ci et lancez la commande d'installation de composer

```shell script
composer install
```

Afin de mettre à jour les paquets entrez la commande de mise à jour 

```shell script
composer update
```

Une fois toutes les étapes complétées entrez la commande de lancement du serveur

```shell script
symfony server:start
```

## Docker
Le projet peut utiliser Docker si vous le souhaitez.
Pour lancer les conteneurs vous devez taper la commande suivante en étant à la racine du projet. Elle va monter le projet dans des conteneurs.
```shell script
docker-compose up --build
```

Pour couper les conteneurs il suffit de taper
```shell script
docker-compose down
```


## Routes
###Chemin
L'API dispose actuellement de deux routes.

| Route  | chemin |
|:------:|:------:|
| Player | /api/player/{name} |
| Server | /api/server/{ip}/{port}|

###Retour
Quand on interroge les routes l'API va nous renvoyer les données au format *JSON*.

> Player
> La route va renvoyer les données de base d'un player
>```json
>{
>  "name":"string",
>  "id":"string",
>  "skin":"string"
>} 
>```
 Et la route server
> Server
>```json
>{
>  "hostname":"string",
>  "port":"string",
>  "ping":"number",
>  "version":"string",
>  "protocol":"number",
>  "players":{
>    "max":"number",
>    "online":"number"
>  },
>  "description":"string",
>  "description_raw":
>  {
>    "extra":[
>      {
>        "bold":"boolean",
>        "italic":"boolean",
>        "underlined":"boolean",
>        "strikethrough":"boolean",
>        "obfuscated":"boolean",
>        "color":"string",
>        "text":"string"
>      }
>    ],
>    "text":""
>  },
>  "favicon":"base64 Image",
>  "modinfo":"boolean",
>  "online":"boolean"
>}
>```

## Auteurs

* **Birac Lucas** - *Développeur* - [SepraDC](https://github.com/SepraDC)
* **Theodore Matthieu** - *Rédacteur* - [Maffiouso](https://github.com/Maffiouso)
