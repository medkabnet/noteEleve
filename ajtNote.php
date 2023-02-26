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
    <title>Ajouter une note d'examen</title>
    <link rel="stylesheet" href="./style/style.css">
  </head>
  <body>
    <form action="./php/ajtNote.php" method="post">
      <h3>Ajouter une note d'examen</h3>
      <label for="eleve_id">Numéro d'élève :</label>
      <!--<input type="text" id="eleve_id" name="eleve_id" required>-->
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
      <label for="matiere">Nom de la matière :</label>
      <input type="text" id="matiere" name="matiere" required>
      <label for="note">Note :</label>
      <input type="text" id="note" name="note" required>
      <label for="coefficient">Coefficient :</label>
        <input type="text" id="coefficient" name="coefficient" value="2" required>
      <label for="date_exam">Date d'examen :</label>
      <input type="date" id="date_exam" name="date_exam" value="" required>
      <input type="submit" value="Ajouter">
    </form>
    <script>
      var today = new Date();
      var dd = String(today.getDate()).padStart(2, '0');
      var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
      var yyyy = today.getFullYear();
      today = yyyy + '-' + mm + '-' + dd;
      document.querySelector("#date_exam").value = today;
    </script>
  </body>
</html>
