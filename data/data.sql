USE gentle_care;

CREATE TABLE users (
    id_utilisateur INT NOT NULL AUTO_INCREMENT,
    nom VARCHAR(30),
    prenom VARCHAR(20),
    email VARCHAR(255),
    password_hash VARCHAR(255),
    role VARCHAR(50)
);

CREATE TABLE questionnaire (
    id_questionnaire INT NOT NULL AUTO_INCREMENT,
    titre_questionnaire VARCHAR(100),
    description VARCHAR(255)
);

CREATE TABLE question (
    id_question INT NOT NULL AUTO_INCREMENT,
    titre_question VARCHAR(255),
    ordre INT,
    FOREIGN KEY (id_questionnaire) REFERENCES questionnaire(id_questionnaire)
);

CREATE TABLE choix_predefinis (
    id_choix INT NOT NULL AUTO_INCREMENT,
    choix VARCHAR(100),
    valeur_score INT,
    FOREIGN KEY (id_question) REFERENCES question(id_question)
);

CREATE TABLE reponses_utilisateurs (
    id_reponse INT NOT NULL AUTO_INCREMENT,
    FOREIGN KEY (id_utilisateur) REFERENCES users(id_utilisateur),
    FOREIGN KEY (id_choix) REFERENCES choix(id_choix),
    date_reponse DATETIME
);