<?php

try {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $genre = $_POST['genre'];
    $adresse = $_POST['adresse'];
    $email = $_POST['email'];
    $naissance = $_POST['naissance'];
    
 // Établissement de la connexion à la base de données
 $conn = new PDO("mysql:host=localhost;dbname=classe", "root", "");
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
 // Préparation de la requête d'insertion
 $stmt = $conn->prepare("INSERT INTO eleve (nom, prenom, genre ,adresse ,email ,date_naissance) VALUES (?, ?, ?,?,?,?)");
 //echo "INSERT INTO Eleve (nom, prenom, genre,adresse,email,date_naissance) VALUES ('$nom', '$prenom', '$genre','$adresse','$email','$naissance')";
 // Liaison des valeurs
 $stmt->bindParam(1, $nom);
 $stmt->bindParam(2, $prenom);
 $stmt->bindParam(3, $genre);
 $stmt->bindParam(4, $adresse);
 $stmt->bindParam(5, $email);
 $stmt->bindParam(6, $naissance);
 
 
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