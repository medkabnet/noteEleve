<?php
    $eleve_id = $_POST['eleve_id'];
    $pdo = new PDO("mysql:host=localhost;dbname=classe", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM Eleve
        WHERE id_eleve = $eleve_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    echo "bien Supprimer";