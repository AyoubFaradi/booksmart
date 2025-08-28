# BookSmart - Système de Gestion de Bibliothèque

BookSmart est une application web moderne de gestion de bibliothèque développée avec Laravel et Tailwind CSS. Elle permet aux utilisateurs de parcourir un catalogue de livres, de faire des réservations, de recevoir des recommandations personnalisées, et aux administrateurs de gérer les adhérents, les emprunts, et les stocks.

## Fonctionnalités principales

- **Catalogue de livres** : Parcourez, recherchez et consultez les détails des livres disponibles.
- **Réservations** : Réservez des livres indisponibles, suivez le statut de vos réservations, annulez ou modifiez-les.
- **Système de recommandations** : Recevez des suggestions de lecture personnalisées grâce à un modèle de recommandation intégré.
- **Gestion des adhérents** : Les administrateurs peuvent gérer les utilisateurs, les réservations, les emprunts et les retours.
- **Tableau de bord** : Visualisez les statistiques clés de la bibliothèque (nombre de livres, réservations, adhérents, etc.).
- **Notifications** : Recevez des alertes lors de la disponibilité d'un livre réservé ou d'une action importante.
- **Interface moderne** : UI/UX premium avec Tailwind CSS, design responsive, thèmes verts et effets visuels avancés.

## Technologies utilisées

- **Backend** : Laravel (PHP)
- **Frontend** : Blade, Tailwind CSS, Alpine.js
- **Recommandation** : Python (modèle ML), API Flask
- **Base de données** : MySQL

## Installation rapide

1. Clonez le dépôt :
    ```bash
    git clone https://github.com/AyoubFaradi/booksmart.git
    cd booksmart
    ```
2. Installez les dépendances PHP :
    ```bash
    composer install
    ```
3. Installez les dépendances Node.js :
    ```bash
    npm install && npm run build
    ```
4. Configurez votre fichier `.env` (copiez `.env.example` et adaptez-le).
5. Générez la clé d'application :
    ```bash
    php artisan key:generate
    ```
6. Lancez les migrations et seeders :
    ```bash
    php artisan migrate --seed
    ```
7. Démarrez le serveur :
    ```bash
    php artisan serve
    ```
8. (Optionnel) Lancez l'API de recommandation :
    ```bash
    python recommendation_api.py
    ```

## Structure du projet

- `app/` : Contrôleurs, modèles et logique métier Laravel
- `resources/views/` : Vues Blade (pages catalogue, réservations, dashboard...)
- `public/` : Fichiers accessibles publiquement (index.php, assets)
- `routes/` : Fichiers de routes Laravel
- `recommendation_model.py` : Modèle de recommandation (Python)
- `train_and_save_model.py` : Script d'entraînement du modèle

## Auteurs
- Ayoub Faradi
- [Contributeurs sur GitHub](https://github.com/AyoubFaradi/booksmart/graphs/contributors)

## Licence
Ce projet est sous licence MIT.
│   ├── Interface utilisateur responsive
│   ├── Dashboard administrateur
│   ├── Formulaires de recommandations IA
│   └── Affichage des résultats
└── 🗄️ Base de données MySQL
    ├── Tables de gestion (livres, adhérents, etc.)
    ├── Historique des emprunts
    └── Données pour l'IA
```

## 🚀 Installation et configuration

### Prérequis système

- **PHP** : 8.1 ou supérieur
- **Composer** : 2.0 ou supérieur
- **Python** : 3.8 ou supérieur
- **MySQL** : 8.0 ou supérieur
- **Node.js** : 16.0 ou supérieur (pour Tailwind CSS)
- **Git** : Pour le contrôle de version

### 1. Clonage et configuration

```bash
# Cloner le projet
git clone https://github.com/Saidouchrif/ApplicationGestionAi.git
cd ApplicationGestionAi

# Configuration Laravel
composer install
cp .env.example .env
php artisan key:generate

# Configuration de la base de données dans .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gestionbeb
DB_USERNAME=votre_username
DB_PASSWORD=votre_password

# Migration et seeding
php artisan migrate
php artisan db:seed

# Installation des dépendances Node.js
npm install
npm run dev
```

### 2. Configuration Python/IA

```bash
# Création d'un environnement virtuel Python
python -m venv venv

# Activation de l'environnement virtuel
# Windows
venv\Scripts\activate
# Linux/Mac
source venv/bin/activate

# Installation des dépendances Python
pip install -r requirements.txt

# Entraînement du modèle IA
python train_and_save_model.py
```

### 3. Configuration de la base de données

```sql
-- Création de la base de données
CREATE DATABASE gestionbeb CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Utilisateur avec privilèges (optionnel)
CREATE USER 'bibliotheque_user'@'localhost' IDENTIFIED BY 'votre_password';
GRANT ALL PRIVILEGES ON gestionbeb.* TO 'bibliotheque_user'@'localhost';
FLUSH PRIVILEGES;
```

## 🎮 Utilisation

### Démarrage des services

#### 1. Serveur Laravel
```bash
php artisan serve
# Accès : http://localhost:8000
```

#### 2. API FastAPI (Recommandations IA)
```bash
# Démarrage manuel
python recommendation_api.py

# Ou avec le script automatique
start_api.bat  # Windows
./start_api.sh  # Linux/Mac

# Accès : http://localhost:5000
# Documentation : http://localhost:5000/docs
```

#### 3. Compilation des assets (développement)
```bash
npm run dev
```

### Accès à l'application

- **Interface utilisateur** : http://localhost:8000
- **API FastAPI** : http://localhost:5000
- **Documentation API** : http://localhost:5000/docs
- **Test de santé API** : http://localhost:5000/health

## 📊 Fonctionnalités détaillées

### 🔐 Système d'authentification

#### Rôles utilisateur
- **Administrateur** : Accès complet à toutes les fonctionnalités
- **Adhérent** : Accès limité aux emprunts et réservations
- **Utilisateur non connecté** : Consultation du catalogue

#### Sécurité
- Authentification Laravel Sanctum
- Protection CSRF
- Validation des données
- Hachage des mots de passe

### 📚 Gestion des livres

#### Fonctionnalités
- **CRUD complet** : Création, lecture, mise à jour, suppression
- **Recherche avancée** : Par titre, description, genre
- **Filtrage** : Par disponibilité, rating, prix
- **Images** : Upload et gestion des couvertures
- **Métadonnées** : Titre, description, stock, rating, prix

#### Interface
- Grille responsive des livres
- Cartes avec informations complètes
- Actions rapides (emprunter, réserver)
- Pagination automatique

### 👥 Gestion des adhérents

#### Profils adhérents
- Informations personnelles
- Historique des emprunts
- Préférences de lecture
- Statut d'adhésion

#### Fonctionnalités
- Inscription et connexion
- Gestion du profil
- Suivi des emprunts actifs
- Historique complet

### 📖 Système d'emprunts

#### Processus d'emprunt
1. Sélection du livre
2. Vérification de disponibilité
3. Création de l'emprunt
4. Mise à jour du stock
5. Notification de confirmation

#### Gestion des retours
- Calcul automatique des retards
- Notifications de rappel
- Historique des emprunts
- Statistiques d'utilisation

### 🔄 Système de réservations

#### Fonctionnalités
- Réservation de livres indisponibles
- File d'attente automatique
- Notifications de disponibilité
- Gestion des priorités

### 🤖 Recommandations IA

#### Algorithme de recommandation
- **TF-IDF Vectorization** : Transformation du texte en vecteurs
- **Similarité cosinus** : Calcul de similarité entre livres
- **Content-based filtering** : Recommandations basées sur le contenu

#### Types de recommandations
1. **Recommandations par livre** : Livres similaires à un ouvrage spécifique
2. **Recommandations personnalisées** : Basées sur les préférences utilisateur
3. **Recommandations populaires** : Livres les plus appréciés

#### Interface utilisateur
- Formulaire de saisie des préférences
- Ajout dynamique de livres
- Affichage des scores de similarité
- Actions directes sur les recommandations

## 🛠️ API Endpoints

### FastAPI (Port 5000)

#### Endpoints de base
```http
GET /                    # Informations sur l'API
GET /health             # Test de santé
GET /docs               # Documentation interactive
```

#### Gestion des livres
```http
GET /books              # Liste de tous les livres
GET /books/{book_id}    # Détails d'un livre
```

#### Recommandations
```http
POST /recommendations   # Recommandations pour un livre
POST /personal          # Recommandations personnalisées
POST /reload-model      # Rechargement du modèle
```

### Laravel (Port 8000)

#### Authentification
```http
POST /login             # Connexion
POST /register          # Inscription
POST /logout            # Déconnexion
```

#### Gestion des livres
```http
GET /livres             # Liste des livres
GET /livres/{id}        # Détails d'un livre
POST /livres            # Créer un livre (admin)
PUT /livres/{id}        # Modifier un livre (admin)
DELETE /livres/{id}     # Supprimer un livre (admin)
```

#### Emprunts et réservations
```http
GET /emprunts           # Liste des emprunts
POST /emprunts          # Créer un emprunt
PUT /emprunts/{id}      # Modifier un emprunt
GET /reservations       # Liste des réservations
POST /reservations      # Créer une réservation
```

## 📁 Structure du projet

```
APPBOOK/
├── 📁 app/
│   ├── 📁 Http/Controllers/
│   │   ├── AdherentController.php
│   │   ├── DashboardController.php
│   │   ├── EmpruntController.php
│   │   ├── HomeController.php
│   │   ├── LivreController.php
│   │   ├── PersonalRecommendationController.php
│   │   └── ReservationController.php
│   ├── 📁 Models/
│   │   ├── Adherent.php
│   │   ├── Emprunt.php
│   │   ├── Livre.php
│   │   └── Reservation.php
│   └── 📁 Middleware/
├── 📁 database/
│   ├── 📁 migrations/
│   └── 📁 seeders/
├── 📁 resources/views/
│   ├── 📁 Dashboard/
│   ├── 📁 HomePage/
│   ├── 📁 PageLivres/
│   └── 📁 layouts/
├── 🐍 Python Files (IA)
│   ├── recommendation_model.py
│   ├── recommendation_api.py
│   ├── train_and_save_model.py
│   └── requirements.txt
├── 📋 Documentation
│   ├── SYSTEME_RECOMMANDATIONS.md
│   ├── MODIFICATIONS_PAGE_CATALOGUE.md
│   └── COMMANDS.md
├── 🚀 Scripts
│   ├── start_api.bat
│   └── train_model.bat
└── 📖 README.md
```

## 🔍 Modèles de données

### Structure de la base de données

#### Table `users`
```sql
CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'adherent') DEFAULT 'adherent',
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);
```

#### Table `adherents`
```sql
CREATE TABLE adherents (
    id_adherent BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    telephone VARCHAR(20) NULL,
    adresse TEXT NULL,
    date_naissance DATE NULL,
    date_inscription TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    statut ENUM('actif', 'inactif', 'suspendu') DEFAULT 'actif',
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);
```

#### Table `livres`
```sql
CREATE TABLE livres (
    id_livre BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    description TEXT NULL,
    image_url VARCHAR(500) NULL,
    stock INT DEFAULT 0,
    rating DECIMAL(3,2) DEFAULT 0.00,
    price DECIMAL(10,2) DEFAULT 0.00,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);
```

#### Table `emprunts`
```sql
CREATE TABLE emprunts (
    id_emprunt BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_adherent BIGINT UNSIGNED NOT NULL,
    id_livre BIGINT UNSIGNED NOT NULL,
    date_emprunt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    date_retour_prevue TIMESTAMP NOT NULL,
    date_retour_effective TIMESTAMP NULL,
    statut ENUM('en_cours', 'retourne', 'en_retard') DEFAULT 'en_cours',
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (id_adherent) REFERENCES adherents(id_adherent),
    FOREIGN KEY (id_livre) REFERENCES livres(id_livre)
);
```

#### Table `reservations`
```sql
CREATE TABLE reservations (
    id_reservation BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_adherent BIGINT UNSIGNED NOT NULL,
    id_livre BIGINT UNSIGNED NOT NULL,
    date_reservation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    statut ENUM('en_attente', 'disponible', 'annulee') DEFAULT 'en_attente',
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (id_adherent) REFERENCES adherents(id_adherent),
    FOREIGN KEY (id_livre) REFERENCES livres(id_livre)
);
```

## 🤖 Système de recommandations IA

### Architecture du modèle

#### Composants principaux
1. **BookRecommendationModel** : Classe principale du modèle
2. **TF-IDF Vectorizer** : Vectorisation du texte
3. **Cosine Similarity** : Calcul de similarité
4. **FastAPI** : API de recommandations

#### Processus de recommandation
```
1. Chargement des données
   ↓
2. Nettoyage du texte
   ↓
3. Vectorisation TF-IDF
   ↓
4. Calcul de similarité cosinus
   ↓
5. Génération des recommandations
   ↓
6. Retour des résultats
```

### Algorithme détaillé

#### TF-IDF (Term Frequency-Inverse Document Frequency)
- **Term Frequency** : Fréquence d'un terme dans un document
- **Inverse Document Frequency** : Importance d'un terme dans l'ensemble des documents
- **Vectorisation** : Transformation du texte en vecteurs numériques

#### Similarité cosinus
- Calcul de l'angle entre deux vecteurs
- Score de similarité entre 0 et 1
- Recommandations basées sur la similarité de contenu

### Configuration du modèle

#### Paramètres TF-IDF
```python
tfidf_config = {
    'max_features': 5000,      # Nombre maximum de features
    'ngram_range': (1, 2),     # N-grams (1-2 mots)
    'min_df': 2,               # Fréquence minimale
    'max_df': 0.95,            # Fréquence maximale
    'stop_words': 'french'     # Mots vides français
}
```

#### Nettoyage du texte
- Suppression des caractères spéciaux
- Conversion en minuscules
- Suppression des mots vides
- Lemmatisation (optionnelle)

## 🎨 Interface utilisateur

### Design System

#### Couleurs principales
- **Primaire** : Indigo (#4F46E5)
- **Secondaire** : Bleu (#3B82F6)
- **Succès** : Vert (#10B981)
- **Attention** : Orange (#F59E0B)
- **Erreur** : Rouge (#EF4444)
- **Neutre** : Gris (#6B7280)

#### Typographie
- **Titres** : Inter, font-bold
- **Corps** : Inter, font-normal
- **Code** : JetBrains Mono, font-mono

#### Composants
- **Cartes** : Coins arrondis, ombres subtiles
- **Boutons** : États hover, focus, disabled
- **Formulaires** : Validation en temps réel
- **Navigation** : Responsive, accessible

### Pages principales

#### Page d'accueil
- Hero section avec présentation
- Section de recommandations IA
- Livres populaires
- Statistiques rapides

#### Catalogue de livres
- Grille responsive des livres
- Filtres et recherche
- Tri par différents critères
- Pagination automatique

#### Dashboard administrateur
- Vue d'ensemble des statistiques
- Gestion des livres
- Gestion des adhérents
- Suivi des emprunts

#### Profil utilisateur
- Informations personnelles
- Historique des emprunts
- Préférences de lecture
- Actions rapides

## 🔧 Développement

### Environnement de développement

#### Outils recommandés
- **IDE** : Visual Studio Code, PHPStorm
- **Terminal** : Windows Terminal, iTerm2
- **Base de données** : MySQL Workbench, phpMyAdmin
- **API Testing** : Postman, Insomnia

#### Extensions VS Code recommandées
- Laravel Extension Pack
- Python
- Tailwind CSS IntelliSense
- GitLens
- Auto Rename Tag

### Workflow de développement

#### 1. Configuration initiale
```bash
# Cloner le projet
git clone <repository>
cd ApplicationGestionAi

# Installer les dépendances
composer install
npm install
pip install -r requirements.txt

# Configuration de l'environnement
cp .env.example .env
# Éditer .env avec vos paramètres

# Migration et seeding
php artisan migrate --seed
```

#### 2. Développement quotidien
```bash
# Démarrer les serveurs
php artisan serve
python recommendation_api.py
npm run dev

# Créer une migration
php artisan make:migration nom_de_la_migration

# Créer un contrôleur
php artisan make:controller NomController

# Créer un modèle
php artisan make:model NomModel -m
```

#### 3. Tests
```bash
# Tests PHP
php artisan test

# Tests Python
python -m pytest tests/

# Tests d'intégration
php artisan test --testsuite=Feature
```

### Standards de code

#### PHP (Laravel)
- PSR-12 coding standards
- Laravel conventions
- Documentation PHPDoc
- Tests unitaires et d'intégration

#### Python
- PEP 8 style guide
- Type hints
- Docstrings
- Tests avec pytest

#### JavaScript/CSS
- ESLint configuration
- Prettier formatting
- Tailwind CSS classes
- Responsive design

## 🚀 Déploiement

### Environnement de production

#### Serveur web
- **Nginx** ou **Apache**
- **PHP-FPM** pour les performances
- **SSL/TLS** pour la sécurité
- **CDN** pour les assets statiques

#### Base de données
- **MySQL** 8.0+ ou **MariaDB** 10.5+
- **Redis** pour le cache
- **Backup** automatique
- **Monitoring** des performances

#### Python/IA
- **Gunicorn** ou **uvicorn** pour FastAPI
- **Supervisor** pour la gestion des processus
- **Load balancing** si nécessaire
- **Monitoring** des performances

### Configuration de production

#### Variables d'environnement
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://votre-domaine.com

DB_HOST=production-db-host
DB_DATABASE=production_db
DB_USERNAME=production_user
DB_PASSWORD=secure_password

CACHE_DRIVER=redis
SESSION_DRIVER=redis
QUEUE_CONNECTION=redis

MAIL_MAILER=smtp
MAIL_HOST=smtp.votre-provider.com
MAIL_PORT=587
MAIL_USERNAME=votre_email
MAIL_PASSWORD=votre_password
MAIL_ENCRYPTION=tls
```

#### Optimisations
- **Cache** : Redis pour les sessions et cache
- **Assets** : Minification et compression
- **Images** : Optimisation et CDN
- **Database** : Indexation et requêtes optimisées

### Scripts de déploiement

#### Déploiement automatique
```bash
#!/bin/bash
# deploy.sh

echo "🚀 Déploiement en cours..."

# Pull des dernières modifications
git pull origin main

# Installation des dépendances
composer install --no-dev --optimize-autoloader
npm install
npm run build

# Migration de la base de données
php artisan migrate --force

# Optimisation
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Redémarrage des services
sudo systemctl restart nginx
sudo systemctl restart php8.1-fpm
sudo systemctl restart supervisor

echo "✅ Déploiement terminé !"
```

## 📊 Monitoring et maintenance

### Métriques à surveiller

#### Performance
- Temps de réponse des pages
- Temps de réponse de l'API
- Utilisation de la mémoire
- Charge CPU

#### Base de données
- Temps de requête
- Connexions actives
- Taille de la base
- Performances des index

#### IA/Recommandations
- Précision des recommandations
- Temps de génération
- Utilisation de l'API
- Erreurs de prédiction

### Logs et debugging

#### Logs Laravel
```bash
# Logs d'application
tail -f storage/logs/laravel.log

# Logs d'erreurs
tail -f storage/logs/error.log

# Logs de debug
tail -f storage/logs/debug.log
```

#### Logs Python/FastAPI
```python
import logging

logging.basicConfig(
    level=logging.INFO,
    format='%(asctime)s - %(name)s - %(levelname)s - %(message)s',
    handlers=[
        logging.FileHandler('api.log'),
        logging.StreamHandler()
    ]
)
```

### Maintenance préventive

#### Tâches quotidiennes
- Vérification des logs d'erreur
- Monitoring des performances
- Sauvegarde de la base de données
- Vérification de l'espace disque

#### Tâches hebdomadaires
- Analyse des performances
- Mise à jour des dépendances
- Optimisation de la base de données
- Test de restauration

#### Tâches mensuelles
- Audit de sécurité
- Mise à jour du modèle IA
- Analyse des métriques utilisateur
- Planification des améliorations

## 🔒 Sécurité

### Mesures de sécurité

#### Authentification
- Hachage bcrypt des mots de passe
- Protection CSRF
- Rate limiting
- Sessions sécurisées

#### Autorisation
- Contrôle d'accès basé sur les rôles
- Middleware d'authentification
- Validation des permissions
- Audit des actions

#### Protection des données
- Validation des entrées
- Échappement des sorties
- Protection contre les injections SQL
- Chiffrement des données sensibles

#### API Security
- Authentification par token
- Rate limiting
- Validation des requêtes
- Logs de sécurité

### Bonnes pratiques

#### Développement sécurisé
- Code review obligatoire
- Tests de sécurité automatisés
- Mise à jour régulière des dépendances
- Documentation des vulnérabilités

#### Configuration sécurisée
- Variables d'environnement pour les secrets
- Configuration HTTPS obligatoire
- Headers de sécurité
- Politique de mots de passe forts

## 📈 Performance et optimisation

### Optimisations Laravel

#### Cache
```php
// Cache des configurations
php artisan config:cache

// Cache des routes
php artisan route:cache

// Cache des vues
php artisan view:cache

// Cache des événements
php artisan event:cache
```

#### Base de données
```sql
-- Index pour les requêtes fréquentes
CREATE INDEX idx_livres_titre ON livres(titre);
CREATE INDEX idx_emprunts_date ON emprunts(date_emprunt);
CREATE INDEX idx_adherents_email ON adherents(email);

-- Optimisation des requêtes
EXPLAIN SELECT * FROM livres WHERE titre LIKE '%mot%';
```

#### Assets
```bash
# Minification CSS/JS
npm run build

# Compression des images
# Utiliser des outils comme ImageOptim

# CDN pour les assets statiques
# Configuration dans .env
ASSET_URL=https://cdn.votre-domaine.com
```

### Optimisations Python/IA

#### Modèle de recommandation
```python
# Cache des recommandations
import functools
from functools import lru_cache

@lru_cache(maxsize=1000)
def get_recommendations(book_id, n_recommendations=5):
    # Logique de recommandation
    pass

# Optimisation de la mémoire
import gc
gc.collect()

# Profiling des performances
import cProfile
import pstats

def profile_function(func):
    profiler = cProfile.Profile()
    profiler.enable()
    result = func()
    profiler.disable()
    stats = pstats.Stats(profiler)
    stats.sort_stats('cumulative')
    stats.print_stats()
    return result
```

## 🧪 Tests

### Tests Laravel

#### Tests unitaires
```php
<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Livre;

class LivreTest extends TestCase
{
    public function test_livre_creation()
    {
        $livre = Livre::factory()->create([
            'titre' => 'Test Livre',
            'description' => 'Description de test'
        ]);

        $this->assertDatabaseHas('livres', [
            'titre' => 'Test Livre'
        ]);
    }
}
```

#### Tests d'intégration
```php
<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;

class LivreControllerTest extends TestCase
{
    public function test_index_page()
    {
        $response = $this->get('/livres');
        $response->assertStatus(200);
        $response->assertViewIs('PageLivres.Livres');
    }
}
```

### Tests Python

#### Tests du modèle IA
```python
import unittest
from recommendation_model import BookRecommendationModel

class TestBookRecommendationModel(unittest.TestCase):
    
    def setUp(self):
        self.model = BookRecommendationModel()
    
    def test_clean_text(self):
        text = "Test!@#$%^&*()"
        cleaned = self.model.clean_text(text)
        self.assertEqual(cleaned, "test")
    
    def test_get_recommendations(self):
        # Test avec des données mock
        recommendations = self.model.get_recommendations(1, 5)
        self.assertIsInstance(recommendations, list)
```

#### Tests de l'API
```python
from fastapi.testclient import TestClient
from recommendation_api import app

client = TestClient(app)

def test_health_endpoint():
    response = client.get("/health")
    assert response.status_code == 200
    assert response.json()["status"] == "healthy"

def test_recommendations_endpoint():
    response = client.post("/recommendations", json={
        "book_id": 1,
        "n_recommendations": 5
    })
    assert response.status_code == 200
```

## 📚 Documentation API

### FastAPI Documentation

L'API FastAPI génère automatiquement une documentation interactive disponible à l'adresse : http://localhost:5000/docs

#### Exemples de requêtes

##### Obtenir des recommandations
```bash
curl -X POST "http://localhost:5000/recommendations" \
     -H "Content-Type: application/json" \
     -d '{
       "book_id": 1,
       "n_recommendations": 5
     }'
```

##### Recommandations personnalisées
```bash
curl -X POST "http://localhost:5000/personal" \
     -H "Content-Type: application/json" \
     -d '{
       "books": [
         {
           "title": "Le Petit Prince",
           "description": "Un conte philosophique sur l'amitié et l'amour"
         }
       ]
     }'
```

### Laravel API Documentation

#### Routes principales
```php
// Routes pour les livres
Route::get('/livres', [LivreController::class, 'index']);
Route::get('/livres/{id}', [LivreController::class, 'show']);
Route::post('/livres', [LivreController::class, 'store'])->middleware('auth:admin');
Route::put('/livres/{id}', [LivreController::class, 'update'])->middleware('auth:admin');
Route::delete('/livres/{id}', [LivreController::class, 'destroy'])->middleware('auth:admin');

// Routes pour les emprunts
Route::get('/emprunts', [EmpruntController::class, 'index'])->middleware('auth');
Route::post('/emprunts', [EmpruntController::class, 'store'])->middleware('auth');
Route::put('/emprunts/{id}', [EmpruntController::class, 'update'])->middleware('auth');

// Routes pour les recommandations
Route::post('/personal', [PersonalRecommendationController::class, 'getRecommendations']);
```

## 🤝 Contribution

### Guide de contribution

#### 1. Fork du projet
```bash
# Fork sur GitHub
# Cloner votre fork
git clone https://github.com/votre-username/ApplicationGestionAi.git
cd ApplicationGestionAi

# Ajouter le repository original
git remote add upstream https://github.com/original-username/ApplicationGestionAi.git
```

#### 2. Créer une branche
```bash
# Créer une branche pour votre fonctionnalité
git checkout -b feature/nouvelle-fonctionnalite

# Ou pour un bug fix
git checkout -b fix/correction-bug
```

#### 3. Développement
```bash
# Installer les dépendances
composer install
npm install
pip install -r requirements.txt

# Faire vos modifications
# Tester votre code
php artisan test
python -m pytest

# Commiter vos changements
git add .
git commit -m "feat: ajouter nouvelle fonctionnalité"
```

#### 4. Pull Request
- Créer une Pull Request sur GitHub
- Décrire clairement les changements
- Ajouter des tests si nécessaire
- Vérifier que tous les tests passent

### Standards de contribution

#### Messages de commit
```
feat: nouvelle fonctionnalité
fix: correction de bug
docs: mise à jour de la documentation
style: formatage du code
refactor: refactorisation du code
test: ajout de tests
chore: tâches de maintenance
```

#### Code Review
- Vérification de la qualité du code
- Tests unitaires et d'intégration
- Documentation mise à jour
- Performance et sécurité

## 📞 Support et communauté

### Ressources utiles

#### Documentation officielle
- [Laravel Documentation](https://laravel.com/docs)
- [FastAPI Documentation](https://fastapi.tiangolo.com)
- [Tailwind CSS Documentation](https://tailwindcss.com/docs)
- [Python Documentation](https://docs.python.org)

#### Communauté
- [Laravel Community](https://laravel.com/community)
- [Python Community](https://www.python.org/community)
- [Stack Overflow](https://stackoverflow.com)

#### Outils de développement
- [Laravel Debugbar](https://github.com/barryvdh/laravel-debugbar)
- [Laravel Telescope](https://laravel.com/docs/telescope)
- [Python Debugger](https://docs.python.org/3/library/pdb.html)

### Contact et support

#### Équipe de développement
- **Lead Developer** : [Said Ouchrif]
- **Email** : [saidouchrif16@gmail.com]
- **GitHub** : [SaidOuchrif]

#### Signaler un bug
1. Vérifier les issues existantes
2. Créer une nouvelle issue
3. Fournir les détails du problème
4. Ajouter les logs d'erreur

#### Demander une fonctionnalité
1. Créer une issue avec le label "enhancement"
2. Décrire la fonctionnalité souhaitée
3. Expliquer le cas d'usage
4. Proposer une implémentation si possible

## 📄 Licence

Ce projet est sous licence MIT. Voir le fichier [LICENSE](LICENSE) pour plus de détails.

## 🙏 Remerciements

- **Laravel Team** pour le framework PHP exceptionnel
- **FastAPI Team** pour l'API moderne et performante
- **Tailwind CSS Team** pour le framework CSS utilitaire
- **Scikit-learn Team** pour les outils de machine learning
- **Communauté open source** pour les contributions et le support

---

## 🎉 Conclusion

**ApplicationGestionAi** représente une solution moderne et complète pour la gestion de bibliothèque, combinant la robustesse de Laravel avec la puissance de l'intelligence artificielle. Cette application offre une expérience utilisateur exceptionnelle tout en fournissant des outils d'administration puissants.

### Points forts du projet

✅ **Architecture moderne** : Laravel + FastAPI + Python  
✅ **Interface responsive** : Tailwind CSS + Blade  
✅ **Recommandations IA** : TF-IDF + Similarité cosinus  
✅ **Sécurité renforcée** : Authentification + Autorisation  
✅ **Performance optimisée** : Cache + Indexation  
✅ **Documentation complète** : Guides + API docs  
✅ **Tests automatisés** : Unitaires + Intégration  
✅ **Déploiement simplifié** : Scripts + Configuration  

### Prochaines étapes

🚀 **Améliorations futures** :
- Intégration de recommandations collaboratives
- Analyse de sentiment des avis
- Système de notifications push
- Application mobile native
- Intégration avec d'autres bibliothèques
- Analytics avancés

---

**Merci d'utiliser ApplicationGestionAi ! 📚✨**

*Développé avec ❤️ pour la communauté des bibliothèques*
