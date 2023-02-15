DROP DATABASE IF EXISTS quizzeo;
CREATE DATABASE quizzeo;
USE quizzeo;

CREATE TABLE Quizz(
   id INT,
   titre VARCHAR(50) ,
   difficulte INT,
   date_creation DATETIME,
   PRIMARY KEY(id)
);

CREATE TABLE Choix(
   id INT,
   reponse VARCHAR(50) ,
   bonneReponse BOOLEAN,
   PRIMARY KEY(id)
);

CREATE TABLE Utilisateur(
   id INT,
   pseudo VARCHAR(50) ,
   email VARCHAR(50) ,
   password VARCHAR(50) ,
   role VARCHAR(50) ,
   id_1 INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_1) REFERENCES Quizz(id)
);

CREATE TABLE Question(
   id VARCHAR(50) ,
   date_creation DATETIME,
   intituleQuestion VARCHAR(50) ,
   difficulte INT,
   id_1 INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_1) REFERENCES Choix(id)
);

CREATE TABLE Prend(
   id INT,
   id_1 VARCHAR(50) ,
   PRIMARY KEY(id, id_1),
   FOREIGN KEY(id) REFERENCES Quizz(id),
   FOREIGN KEY(id_1) REFERENCES Question(id)
);

CREATE TABLE Jouer(
   id INT,
   id_1 INT,
   id_user INT,
   score VARCHAR(50) ,
   id_quizz INT,
   PRIMARY KEY(id, id_1),
   FOREIGN KEY(id) REFERENCES Utilisateur(id),
   FOREIGN KEY(id_1) REFERENCES Quizz(id)
);
