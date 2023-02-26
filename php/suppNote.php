<?php
    $id_note = $_POST['note_id'];
    $pdo = new PDO("mysql:host=localhost;dbname=classe", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM Note
        WHERE id_note = $id_note";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    echo "bien Supprimer";
