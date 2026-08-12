-- RevizUp - creation complete de la base de donnees
-- Compatible MySQL 8+ et MariaDB 10.4+

CREATE DATABASE IF NOT EXISTS revizup_db
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE revizup_db;

-- Comptes des utilisateurs de l'application
CREATE TABLE IF NOT EXISTS utilisateurs (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(191) NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    date_creation DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    UNIQUE KEY uq_utilisateurs_email (email)
) ENGINE=InnoDB;

-- Comptes ayant acces a l'espace d'administration
CREATE TABLE IF NOT EXISTS administrateurs (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    identifiant VARCHAR(100) NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    date_creation DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    UNIQUE KEY uq_administrateurs_identifiant (identifiant)
) ENGINE=InnoDB;

-- Meilleur resultat d'un utilisateur pour chaque matiere
CREATE TABLE IF NOT EXISTS resultats_quiz (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    utilisateur_id INT UNSIGNED NOT NULL,
    matiere VARCHAR(50) NOT NULL,
    score INT UNSIGNED NOT NULL DEFAULT 0,
    total_questions INT UNSIGNED NOT NULL DEFAULT 5,
    reussi TINYINT(1) NOT NULL DEFAULT 0,
    date_resultat DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    UNIQUE KEY uq_resultats_utilisateur_matiere (utilisateur_id, matiere),
    KEY idx_resultats_date (date_resultat),
    CONSTRAINT fk_resultats_utilisateur
        FOREIGN KEY (utilisateur_id)
        REFERENCES utilisateurs (id)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT chk_resultats_score
        CHECK (score <= total_questions),
    CONSTRAINT chk_resultats_reussi
        CHECK (reussi IN (0, 1))
) ENGINE=InnoDB;

