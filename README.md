# Connect'In — Réseau social interne

Projet Epitech — Développement d'un réseau social.

## Stack technique

- **Back-end** : Laravel (PHP, API REST)
- **Front-end** : HTML / CSS / JavaScript (Vanilla)
- **Base de données** : MySQL
- **CSS** : Tailwind CSS

---

## Installation

### Prérequis

- PHP 8.2+
- Composer
- MySQL
- Node.js (optionnel)

### Cloner le projet

```bash
git clone git clone https://github.com/EpitechWebAcademiePromo2027/W-WEB-103-PAR-1-1-connect_in-17.git
cd Connect_in
```

### Installer les dépendances

```bash
composer install
```

---

## Configuration

Copie le fichier `.env.example` et configure ta base de données :

```bash
cp .env.example .env
```

Modifie les variables suivantes dans `.env` :

```env
DB_DATABASE=connect_in
DB_USERNAME=root
DB_PASSWORD=ton_mot_de_passe
```

Génère la clé de l'application :

```bash
php artisan key:generate
```

---

## Lancement

### Migrations et seeders

```bash
php artisan migrate:fresh --seed
```

Cela crée 10 utilisateurs, 30 posts, 60 commentaires et 50 likes de test.

### Lancer le serveur

```bash
php artisan serve
```

L'API est disponible sur `http://localhost:8000`

### Lancer le front-end

```bash
cd frontend
php -S localhost:8001
```

---

## Endpoints API

Toutes les routes (sauf register et login) nécessitent un token Bearer.

### Auth

| Méthode | Endpoint | Description |
|---------|----------|-------------|
| POST | `/api/register` | Créer un compte |
| POST | `/api/login` | Se connecter |
| POST | `/api/logout` | Se déconnecter |
| GET | `/api/me` | Infos utilisateur connecté |

### Posts

| Méthode | Endpoint | Description |
|---------|----------|-------------|
| GET | `/api/posts` | Liste des posts |
| POST | `/api/posts` | Créer un post |
| PUT | `/api/posts/{id}` | Modifier un post |
| DELETE | `/api/posts/{id}` | Supprimer un post |

### Commentaires

| Méthode | Endpoint | Description |
|---------|----------|-------------|
| GET | `/api/posts/{id}/comments` | Liste des commentaires |
| POST | `/api/posts/{id}/comments` | Ajouter un commentaire |
| PUT | `/api/comments/{id}` | Modifier un commentaire |
| DELETE | `/api/comments/{id}` | Supprimer un commentaire |

### Likes

| Méthode | Endpoint | Description |
|---------|----------|-------------|
| POST | `/api/posts/{id}/like` | Liker / unliker un post |

### Utilisateurs

| Méthode | Endpoint | Description |
|---------|----------|-------------|
| GET | `/api/users/{id}` | Voir un profil |
| PUT | `/api/users/{id}` | Modifier son profil |
| DELETE | `/api/users/{id}` | Supprimer son compte |
| POST | `/api/users/{id}/avatar` | Changer sa photo de profil |

---

## Comptes de test

Après le seeding, tous les utilisateurs ont le mot de passe : `password`

Pour trouver un email de test :

```bash
php artisan tinker
App\Models\User::first()->email;
```
