<?php
$id_eleve = $_POST["eleve_id"];
$pdo = new PDO("mysql:host=localhost;dbname=classe", "root", "");

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM eleve where id_eleve = $id_eleve";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();
if(count($result)>0){
    foreach($result as $row) {
        //echo $row['column_name'] . " ";
        //print_r($row);
        echo "Nom :" .$row["nom"]."<br>";
        echo "Prénom :" .$row["prenom"]."<br>";
        echo "Genre :" .$row["genre"]."<br>";
        echo "Adresse :" .$row["adresse"]."<br>";
        echo "Email :" .$row["email"]."<br>";
    }
}
else{
    echo "Pas de resulta";
}

//print_r($result);
?>