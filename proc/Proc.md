# Installation de CodeHoot

Ce guide vous explique comment installer et configurer le projet CodeHoot sur votre environnement local.

## Prérequis

Avant de commencer, assurez-vous d'avoir installé :

- PHP >= 8.0
- Composer
- Git
- Base de données (MySQL/PostgreSQL)
- Un serveur web (Apache/Nginx) ou utiliser le serveur intégré de PHP

## Installation

### 1. Cloner le repository

```bash
git clone git@github.com:K4yylaah/code-hoot.git

2. Naviguer dans le répertoire du projet
cd www

3. Installer les dépendances PHP
composer install

4. Configuration de l'environnement
Copiez le fichier d'environnement et configurez vos paramètres :

cp .env.example .env

Éditez le fichier .env avec vos paramètres de base de données et autres configurations nécessaires.

5. Générer la clé d'application
php artisan key:generate

6. Exécuter les migrations
php artisan migrate

Lancement du serveur
Pour démarrer le serveur de développement :

php artisan serve

Votre application sera accessible à l'adresse : http://localhost:8000

Dépannage
Si vous rencontrez des problèmes :

Vérifiez que tous les prérequis sont installés
Assurez-vous que votre base de données est accessible
```

## Félicitations ! 🎉 CodeHoot est maintenant installé et prêt à être utilisé.