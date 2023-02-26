CREATE DATABASE Classe;
USE Classe;

CREATE TABLE Eleve (
  id_eleve INT(11) AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(20) NOT NULL,
  prenom VARCHAR(20) NOT NULL,
  genre VARCHAR(20) NOT NULL,
  adresse TEXT NOT NULL,
  email VARCHAR(125) NOT NULL,
  date_naissance DATE NOT NULL
);
CREATE TABLE Note (
  id_note INT AUTO_INCREMENT PRIMARY KEY,
  id_eleve INT,
  nom_matiere VARCHAR(20) NULL,
  note DECIMAL(4, 2),
  coefficient INT DEFAULT 2,
  date_exam DATE DEFAULT CURRENT_DATE,
  FOREIGN KEY (id_eleve) REFERENCES Eleve(id_eleve)
);



