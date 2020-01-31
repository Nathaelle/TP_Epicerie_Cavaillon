# TP Epicerie : réaliser un site de vente en ligne de produits locaux

En préambule, je vous rappelle que vous pouvez consulter sans restriction aucune cette documentation ésotérique [Symfony](https://symfony.com/doc/current/index.html#gsc.tab=0) ; )

## Enoncé initial

L'entreprise FromLocal désire vendre ses produits sur internet, et faire découvrir la richesse de notre Provence... au reste du monde. Il y aura plusieurs catégories de produits : Miel, Huiles d'olives, etc... Ainsi qu'un forum de partage autour des produits (recettes, etc...). Un client aura un espace personnel, et pourra ajouter des produits dans son e-panier... produits restitués lors de la génération de son bon de commande.

## Symfony : INSTALLATION (une seule fois)

Pour installer Symfony (v5) vous devez :
1. Vérifiez que vous disposez de php en ligne de commande (CLI) : `php -v` 
    Vous devriez avoir quelque chose du genre :
    `PHP 7.3.12 (cli) (built: Nov 19 2019 13:58:02) ( ZTS MSVC15 (Visual C++ 2017) x64 )`
    `Copyright (c) 1997-2018 The PHP Group`
    `Zend Engine v3.3.12, Copyright (c) 1998-2018 Zend Technologies`
        `with Xdebug v2.8.0, Copyright (c) 2002-2019, by Derick Rethans`

    Avec une **version php minimale 7.2.5** (en évitant la 7.4.0), si ce n'est pas le cas, veuillez suivre la procédure suivante, sinon, passer directement à la 3ème étape.

2. Ajoutez php aux variables d'environnement :
    - Copiez le lien du répertoire de votre version de php (généralement ~ `C:\wamp64\bin\php\php7.3.12`)
    - Dans **_Menu>Système windows>Panneau de configuration>Système et sécurité>Système_** cliquez dans le menu de gauche sur **_paramètres système avancés_** puis sur **_variables d'environnement_**
    - Localisez la variable PATH, puis **_modifier_**, puis, dans la fenêtre suivante, créez une nouvelle entrée et collez-y le chemin copié précédemment
    - **Fermez puis réouvrez votre terminal**

3. Téléchargez et installez [Composer](https://getcomposer.org/download/)

4. Téléchargez et installez [Symfony installer](https://symfony.com/download) (désormais il nous faudra lancer notre serveur via la commande `symfony`)

## Symfony : CREER UN NOUVEAU PROJET (à chaque nouveau projet)

1. Placer vous dans le répertoire qui va accueillir votre projet (le dossier www de Wamp est **fortement** conseillé), puis lancez la commande suivante :
`composer create-project symfony/website-skeleton **nom_de_votre_projet**`

2. Une fois l'installation du projet terminée, déplacez-vous dans votre projet :
`cd **nom_de_votre_projet**`

3. Lancez le serveur
`symfony serve`
Et ne fermez pas le terminal !!

## Symfony : Récupérer un projet sur GitHub

1. Copiez l'adresse de repository : `https://github.com/Nathaelle/TP_Epicerie_Cavaillon.git`
2. Ouvrez un terminal dans répertoire www et taper la commande : `git clone https://github.com/Nathaelle/TP_Epicerie_Cavaillon.git`
3. Ouvrir le projet dans VSC puis entrez la commande : `composer install`
4. Lancez le serveur `symfony serve`
4. Lancez la commande : `php bin/console doctrine:database:create`
5. Executez les migrations : `php bin/console doctrine:migration:migrate`
5. Executez les fixtures : `php bin/console doctrine:fixtures:load`