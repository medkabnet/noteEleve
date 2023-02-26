<?php
    $note_id = $_POST['note_id'];
    $matier = $_POST['matier'];
    $note = $_POST['note'];
    $pdo = new PDO("mysql:host=localhost;dbname=classe", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE NOTE
        SET nom_matiere = '$matier' , note = $note
        WHERE id_note = $note_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    echo "bien Modifier";