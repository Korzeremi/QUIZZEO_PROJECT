DROP DATABASE IF EXISTS quizzeo;
CREATE DATABASE quizzeo;
CREATE TABLE Quizz(
   id INT auto_increment,
   titre VARCHAR(50) ,
   difficulte SMALLINT,
   date_creation DATETIME,
   PRIMARY KEY(id)
);

CREATE TABLE Choix(
   id INT auto_increment,
   reponse VARCHAR(50) ,
   bonneReponse BOOLEAN,
   PRIMARY KEY(id)
);

CREATE TABLE Utilisateur(
   id INT auto_increment,
   pseudo VARCHAR(50) ,
   email VARCHAR(50) ,
   password VARCHAR(50) ,
   role VARCHAR(50) ,
   id_1 INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_1) REFERENCES Quizz(id)
);

CREATE TABLE Question(
   id INT auto_increment,
   date_creation DATETIME,
   intituleQuestion VARCHAR(50) ,
   difficulte SMALLINT,
   id_1 INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_1) REFERENCES Choix(id)
);

CREATE TABLE Prend(
   id INT auto_increment,
   id_1 INT,
   PRIMARY KEY(id, id_1),
   FOREIGN KEY(id) REFERENCES Quizz(id),
   FOREIGN KEY(id_1) REFERENCES Question(id)
);

CREATE TABLE Jouer(
   id INT auto_increment,
   id_1 INT,
   id_user SMALLINT,
   id_quizz SMALLINT,
   score VARCHAR(50) ,
   PRIMARY KEY(id, id_1),
   FOREIGN KEY(id) REFERENCES Utilisateur(id),
   FOREIGN KEY(id_1) REFERENCES Quizz(id)
);
