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
    <meta charset="UTF-8">
    <title>Afficher un élève</title>
    <link rel="stylesheet" href="./style/style.css">
  </head>
  <body>
    <form action="./php/afficherEle.php" method="post">
      <h3>Afficher un élève</h3>
      <label for="eleve_id">Numéro d'élève :</label>
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
      <input type="submit" value="Afficher">
    </form>
  </body>
</html>