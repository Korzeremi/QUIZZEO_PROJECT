CREATE TABLE Quizz(
   id INT,
   titre VARCHAR(50) ,
   difficulte SMALLINT,
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
   id INT,
   date_creation DATETIME,
   intituleQuestion VARCHAR(50) ,
   difficulte SMALLINT,
   id_1 INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_1) REFERENCES Choix(id)
);

CREATE TABLE Prend(
   id INT,
   id_1 INT,
   PRIMARY KEY(id, id_1),
   FOREIGN KEY(id) REFERENCES Quizz(id),
   FOREIGN KEY(id_1) REFERENCES Question(id)
);

CREATE TABLE Jouer(
   id INT,
   id_1 INT,
   id_user SMALLINT,
   id_quizz SMALLINT,
   score VARCHAR(50) ,
   PRIMARY KEY(id, id_1),
   FOREIGN KEY(id) REFERENCES Utilisateur(id),
   FOREIGN KEY(id_1) REFERENCES Quizz(id)
);
