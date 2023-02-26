<?php
  $pdo = new PDO("mysql:host=localhost;dbname=classe", "root", "");
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT * FROM eleve";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Supprimer un étudiant</title>
    <link rel="stylesheet" href="./style/style.css">
  </head>
  <body>
    <form action="./php/suppElev.php" method="post">
        <h3>Supprimer un étudiant</h3>
        <select name="eleve_id" id="eleve_id">
          <?php
            $result = $stmt->fetchAll();
            if(count($result)>0){
                foreach($result as $row) {
                    echo "<option value ='".$row['id_eleve']."'>".
                    $row["nom"]." ".$row["prenom"]."</option>";
                }
            }
            else{
                echo "<option>Pas de resulta</option>";
            }
          ?>
        </select>
        <input type="text" id="eleve_id" name="eleve_id" required>
        <input type="submit" value="Supprimer">
      </form>
  </body>
</html>
