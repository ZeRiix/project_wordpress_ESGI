# Thème graphique WordPress

## Introduction

L'objectif de ce projet est de créer un thème graphique personnalisé pour WordPress. Le thème sera développé en suivant les maquettes fournies, accessibles à l'adresse suivante : [maquette](https://www.figma.com/file/XJV85eUeGjKuLfjHxSyRqQ/Th%C3%A8me-Exam-WP?node-id=0%3A1)

## Objectif

L'objectif principal est de réaliser un thème graphique WordPress qui soit en accord avec les maquettes fournies. Le thème doit s'intégrer harmonieusement à WordPress tout en offrant des fonctionnalités et des designs spécifiques.

## Principes

Le thème graphique doit respecter les principes suivants :

__Conservation des champs natifs de publication :__ Les champs natifs de WordPress tels que le titre, le contenu et l'image mise en avant doivent être conservés et rester éditables. Ces champs seront utilisés par le thème pour afficher le contenu des publications.

__Contenu personnalisé :__ En plus des champs natifs, certaines pages nécessitent l'affichage d'un contenu personnalisé. Ce contenu doit être administré via des paramètres spécifiques du thème. Il est important de noter qu'il n'est pas autorisé de créer des types de publication personnalisés.

## Étapes indicatives

__Création des templates de page :__ Il est nécessaire de créer quatre modèles de page personnalisés pour les pages "About us", "Services", "Partners" et "Contacts". La page 36 du support de cours disponible sur myGES peut servir de référence pour la création de ces modèles.

__Définition des paramètres du thème :__ Les paramètres du thème doivent être définis en ajoutant les champs nécessaires au "customizer" de WordPress. Il est recommandé de regrouper les champs liés dans différentes sections pour une meilleure ergonomie. Pour simplifier le développement, il est possible de limiter le nombre d'éléments tels que les membres de l'équipe (4) et les logos des partenaires (6).

__Rendu responsive design :__ Le thème doit être responsive design, c'est-à-dire qu'il doit s'adapter aux différents appareils (ordinateurs, tablettes, smartphones). Sur les appareils mobiles, le contenu devra être affiché en pile (stack) pour optimiser l'expérience utilisateur.

## Conclusion

Ce projet vise à créer un thème graphique WordPress en respectant les maquettes fournies. En conservant les champs natifs de publication et en permettant l'administration de contenu personnalisé via les paramètres du thème, le résultat final offrira une expérience utilisateur attrayante et fonctionnelle.

## Installation

installation avec docker

```bash
docker-compose up -d
```

## Config file

```bash
./docker-compose.yml
./Dockerfile
./.env
```

## Warning

installer le project docker-clean version wordpress et cloner le repo dans le dossier theme
remplacer le docker-compose de docker-clean par celui du theme en cas de problème

## License

[MIT](https://choosealicense.com/licenses/mit/)

## Caloboration

[Vitaalx](https://github.com/Vitaalx)
[mathcovax](https://github.com/mathcovax)
[Maubry94](https://github.com/Maubry94)
