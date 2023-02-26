<?php
    $id_note = $_POST["note_id"];
    $pdo = new PDO("mysql:host=localhost;dbname=classe", "root", "");

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "
        SELECT Eleve.nom , 
            Eleve.prenom,
            Note.*
        FROM Note,Eleve 
        where id_note = $id_note
        AND Note.id_eleve = Eleve.id_eleve";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    if(count($result)>0){
        foreach($result as $row) {
            //echo $row['column_name'] . " ";
            //print_r($row);
            //echo "Id Eleve :" .$row["id_eleve"]."<br>";
            echo "Nom :" .$row["nom"]."<br>";
            echo "Prénom :" .$row["prenom"]."<br>";
            echo "Matier :" .$row["nom_matiere"]."<br>";
            echo "Note :" .$row["note"]."<br>";
            echo "Coefficient :" .$row["coefficient"]."<br>";
            echo "Date :" .$row["date_exam"]."<br>";
        }
    }
    else{
        echo "Pas de resulta";
    }
?>