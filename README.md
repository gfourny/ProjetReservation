## Serveur API RESTFULL <Br/> Groupe Camping Vacance Europe
> Guillaume Fourny - Alexandre Desvallées

## Table des matières
1. [Les Fonctionnalités](#features)
2. [Les Méthodes de l'API](#callAPI)
3. [Modélisation BDD](#mcd)
4. [Sécurité sur le Projet](#projSecure)
4. [TODO - Cinématiques User](#roads)

### Fonctionnalités <a name="features"></a>
* Facturation (création / édition / suppression)
* Réservation des emplacements (sur site et en ligne)
* Gestion des prestations dans le Camping
* Sécurité des échanges via Authentification
* Lisibilité des informations utiles en ligne

### Types de méthodes <a name="callAPI"></a>

#### GET

##### Ma Methode.Name

#### POST

##### Ma Methode.Name

#### PATCH

##### Ma Methode.Name

#### DELETE

##### Ma Methode.Name

### Modélisation <a name="mcd"></a>
[Insert Schéma there](myUri...)

### Sécurité <a name="projSecure"></a>
Le serveur pour nos API RESTful utilise le framework PHP Restler 3.0 qui est à cheval sur le respect des normes de sécurité pour les API de type REST. Une base de données MySQL supportera notre site et sera administrée via l'interface PhpMyAdmin fourni par Restler. Au niveau transactionnel, on utilisera (si possible) les protocoles SSL/TLS.

#### Transactions
(petit détail sur les modes de sécurisation des appels -> reprendre le cours sur htmlelement et SSL/TLS)

#### BDD
(petit détail sur les contraintes colonnes/champs en base -> garantie véracitée des données)

### Cinématiques <a name="roads"></a>
[Insert Schéma there](myUri...)

### FAQ

#### Erreur lancement du projet

En cas de soucis avec le projet, si vous avez ce message d'erreur :
> Warning: require(C:\wamp\www\ProjetReservation\vendor/symfony/polyfill-ctype/bootstrap.php): failed to open stream: No such file or directory in C:\wamp\www\ProjetReservation\vendor\composer\autoload_real.php on line 66 

Vous devez réaliser les instructions suivantes :
* Allez dans votre répertoire **{ProjetReservartion}** puis assurez-vous de disposer de *composer.json*
* Si vous disposez d'un *composer.phar* passez à l'étape suivante sinon, vous devez le télécharger [ici](https://getcomposer.org/download/) 
* Faites une copie (ou déplacez) *composer.phar* dans **{ProjetReservation}** 
* Dans le répertoire **{vendor}**, supprimez le répertoire **{composer}** 
* Dans votre terminal (Windows, Linux, OSX) utilisez la commande :
> php composer.phar install

Veillez à avoir une version de PHP à jour !! (à date Juin 2019 nous utilisons PHP 7.1.23 (cli) (built: Feb 22 2019 22:19:32) ( NTS ))
* Votre projet est normalement de nouveau opérationnel
