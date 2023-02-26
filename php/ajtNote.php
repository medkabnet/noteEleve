<?php

try {
    $eleve_id = $_POST['eleve_id'];
    $matiere = $_POST['matiere'];
    $note = $_POST['note'];
    $coefficient = $_POST['coefficient'];
    $date_exam = $_POST['date_exam'];
    
    // Établissement de la connexion à la base de données
    $conn = new PDO("mysql:host=localhost;dbname=classe", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Préparation de la requête d'insertion
    $stmt = $conn->prepare("INSERT INTO note (id_eleve,nom_matiere,note,coefficient,date_exam) VALUES (?, ?,?,?,?)");
    //echo "INSERT INTO Eleve (nom, prenom, genre,adresse,email,date_naissance) VALUES ('$nom', '$prenom', '$genre','$adresse','$email','$naissance')";
    // Liaison des valeurs
    $stmt->bindParam(1, $eleve_id);
    $stmt->bindParam(2, $matiere);
    $stmt->bindParam(3, $note);
    $stmt->bindParam(4, $coefficient);
    $stmt->bindParam(5, $date_exam);
 
 
    // Exécution de la requête
    $stmt->execute();
    
    // Affichage d'un message de confirmation
    echo "Données insérées avec succès.";
 
 } catch(PDOException $e) {
 // Affichage de l'erreur
 echo "Erreur : " . $e->getMessage();
//print_r($e);
 }
?>