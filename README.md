# contact_gestion_php
 
# Application de Gestion des Contacts

Cette application PHP permet de gérer une liste de contacts avec les fonctionnalités suivantes :
- Ajouter un contact
- Modifier un contact
- Supprimer un contact
- Afficher tous les contacts dans un tableau

## Structure des Fichiers

### 1. `db.php`
Ce fichier gère la connexion à la base de données et définit des fonctions réutilisables pour les opérations sur la table `contacts`.

#### Fonctions :
- `connectDB()`: Établit une connexion à la base de données en utilisant PDO.
- `addContact($nom, $email, $telephone)`: Ajoute un nouveau contact à la base de données.
- `getContact($id)`: Récupère les informations d'un contact spécifique par son ID.
- `updateContact($id, $nom, $email, $telephone)`: Met à jour les informations d'un contact dans la base de données.
- `deleteContact($id)`: Supprime un contact de la base de données par son ID.
- `getAllContacts()`: Récupère la liste de tous les contacts de la base de données.

### 2. `add_contact.php`
Ce fichier affiche un formulaire pour ajouter un nouveau contact et traite l'ajout des données à la base de données.

#### Fonctionnement :
- Affiche un formulaire avec les champs `Nom`, `Email`, et `Téléphone`.
- Envoie les données via `POST` et utilise la fonction `addContact()` pour insérer le contact.
- Redirige l'utilisateur vers `index.php` après l'ajout.

### 3. `edit.php`
Ce fichier permet de modifier les informations d'un contact existant.

#### Fonctionnement :
- Récupère l'ID du contact à modifier depuis l'URL (`edit.php?id=ID`).
- Affiche un formulaire pré-rempli avec les informations actuelles du contact.
- Utilise la fonction `updateContact()` pour mettre à jour les données dans la base de données.
- Redirige vers `index.php` après la mise à jour.

### 4. `delete_contact.php`
Ce fichier traite la suppression d'un contact.

#### Fonctionnement :
- Récupère l'ID du contact à supprimer depuis l'URL (`delete_contact.php?id=ID`).
- Utilise la fonction `deleteContact()` pour supprimer le contact de la base de données.
- Redirige vers `index.php` après la suppression.

### 5. `index.php`
Ce fichier affiche la liste de tous les contacts sous forme de tableau HTML.

#### Fonctionnement :
- Utilise la fonction `getAllContacts()` pour récupérer tous les contacts de la base de données.
- Affiche les contacts dans un tableau HTML avec des boutons pour "Modifier" et "Supprimer".
- Le bouton "Modifier" redirige vers `edit.php` avec l'ID du contact.
- Le bouton "Supprimer" redirige vers `delete_contact.php` avec l'ID du contact, en demandant confirmation avant la suppression.

## Structure de la Base de Données

Assurez-vous que la base de données `contacts_db` et la table `contacts` sont créées avec la structure suivante :

```sql
CREATE DATABASE IF NOT EXISTS contacts_db;
USE contacts_db;

CREATE TABLE IF NOT EXISTS contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telephone VARCHAR(20) NOT NULL
);
