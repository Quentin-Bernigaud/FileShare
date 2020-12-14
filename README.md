# Exercice PHP - Création d'une plateforme de partage de fichier
## Sommaire
1. [Live demo](#live-demo)
2. [Consignes de l'exercice](#consignes-de-lexercice)
3. [Initialisation du projet](#initialisation-du-projet)
4. [Bonus supplémentaires](#bonus-supplémentaires)

## Live demo
http://quentin.bernigaud.fr/projet/fileshare/
## Consignes de l'exercice
Réaliser une plateforme de partage de fichier.
### Fonctionnalités :
 - Inscription, connexion, déconnexion
 - Page pour uploader un fichier (titre, description)
 - Page listant les fichiers disponibles
 - Au clic sur un fichier de la liste : page de description du fichier (titre, description taille du fichier, poids, format (mime-type)), ainsi qu'un lien pour le télécharger
 - Page listant uniquement les fichiers de l'utilisateur connecté
 - Chaque fichier de la liste est accompagné d'un bouton "supprimer"
 - Le propriétaire d'un fichier peut le supprimer (et uniquement le propriétaire)
 - Page de modification du profil
### Points attendus :
 - Toutes les features fonctionnelles
 - Avoir une navigation permettant d'accéder à toutes les pages
 - Validation des informations reçues via POST et GET (Les variables existent-elles, sont-elles vides, etc...)
 - Validation avant de faire une action (supprimer une annonce qui ne nous appartient pas, créer une annonce sans être connecté, etc... Liste non exhaustive)
 - Validation du fichier uploadé
 - Pas de notice, warning, ou fatal_error (excepté celles créées volontairement)
## Initialisation du projet
 1. `git clone` https://github.com/Quentin-Bernigaud/FileShare.git
 2. Créer la base de données avec le contenu du fichier `./database/iim_php_fileshare.sql`
 3. Éditer les paramètres de connexion dans le fichier `./database/connection.php`
## Bonus supplémentaires
- Ajout d'une démo live
- Ajout d'une mise en page CSS
- Ajout d'une photo de profil
- Ajout d'une preview des fichiers de type "image"
- Version mobile