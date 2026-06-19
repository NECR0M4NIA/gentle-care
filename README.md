# 🌸 Gentle Care

**Gentle Care** est une plateforme web bienveillante conçue pour accompagner au quotidien les personnes qui traversent des moments difficiles ou ne se sentent pas bien. Notre objectif est d'offrir un espace interactif et apaisant pour aider chacun à retrouver un peu de sérénité et à prendre soin de sa santé mentale.

---

### 🚀 Fonctionnalités principales

* **🕹️ Activités ludiques :** Des mini-jeux simples et interactifs pour se changer les idées et stimuler positivement l'esprit.
* **✨ Citation du jour :** Une dose quotidienne d'inspiration, de motivation et de pensées positives pour bien commencer la journée.
* **🧘 Exercices de respiration :** Des guides visuels pour se détendre, relâcher la pression et gérer le stress ou l'anxiété en temps réel.
* **🎥 Vidéos explicatives personnalisées :** Du contenu vidéo ciblé et adapté pour comprendre et surmonter ses problématiques spécifiques.

---

### 🛠️ Tech Stack

* **Frontend :** HTML5, CSS3, JavaScript
* **Backend :** PHP
* **Base de données :** MySQL

---

### 👥 L'Équipe

Ce projet a été réalisé avec ❤️ par une équipe de 4 personnes :
* [JajouDev](https://github.com/jajoudev)
* [FonceurOk](https://github.com/FonceurOk)
* [Forcerion](https://github.com/Forcerion)
* [NECR0M4NIA](https://github.com/NECR0M4NIA)

---

_JajouDev — Parler, c'est déjà commencer à guérir._

### Commandes à éxécuter lors du lancement du projet :
``` bash
docker compose exec app php artisan key:generate
```
``` bash
docker compose exec app php artisan migrate
```
``` bash
docker compose exec app php artisan config:clear
```

### Si le css ne marche pas ?
``` bash 
npm install
```
``` bash
npm run dev
```

### Breeze:
``` bash
php artisan breeze:install
```

---

## Faire fonctionner le projet sous Ubuntu / Linux
Depuis la racine du projet dans le terminal:

``` bash
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.7/install.sh | bash

source ~/.bashrc 

nvm install --lts

nvm use --lts
```

Ensuite:

``` bash
rm -rf node_modules
rm package-lock.json

npm install

npm run dev

npm.cmd run dev
```

Éventuellement, modifier ces données dans le fichier .env si il y a des erreurs avec Breeze:

* Remplacer **CACHE_STORE=database** par **CACHE_STORE=file**
* Remplacer **SESSION_DRIVER=database** par **SESSION_DRIVER=file**
* Remplacer **QUEUE_CONNECTION=database** par **QUEUE_CONNECTION=sync**
