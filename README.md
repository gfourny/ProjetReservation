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
