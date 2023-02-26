<?php
    $eleve_id = $_POST['eleve_id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $pdo = new PDO("mysql:host=localhost;dbname=classe", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE Eleve
        SET nom = '$nom' , prenom = '$prenom'
        WHERE id_eleve = $eleve_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    echo "bien Modifier";