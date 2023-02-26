<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=classe", "root", "");
    //echo "bien connecter";
} 
catch (PDOException $e) {
    echo "Error : " . $e->getMessage();
    die();
}
//http://localhost/noteeleve/php/connexion.php
?>

