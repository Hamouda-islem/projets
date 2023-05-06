<!DOCTYPE html>
<html>
<head>
	<title>Ma page de rendez-vous</title>
	<style>
     

     :root {
  --bg-color: #1f242d;
  --second-bg-color: #323946;
  --text-color: #fff;
  --main-color: #0ef;
  --danger-color: #f44336; /* Couleur rouge pour les boutons "Annuler" */
}

body {
  background-color: var(--bg-color);
  color: var(--text-color);
  font-family: sans-serif;
}

h1 {
  color: #0ef;
  text-align: center;
  /* Ajout de l'attribut id pour le titre h1 */
  /* Ajout de la classe typed pour utiliser la bibliothèque Typed.js */
  /* Ajout de la classe cursor pour afficher le curseur de la bibliothèque Typed.js */
  /* Ajout de la propriété font-size pour augmenter la taille du titre */
  font-size: 36px;
}
/* Ajout de la classe icon pour les icônes */
.icon {
  display: none;
  width: 0px;
  height: 0px;
  margin-right: 5px;
  background-repeat: no-repeat;
  background-position :center;
  background-size: contain;
}
/* Ajout de la classe danger pour les boutons "Annuler" */
.danger {
  background-color: var(--danger-color);
  color: var(--text-color);
}

table {
  border-collapse: collapse;
  width: 100%;
}

th,
td {
  border: 1px solid black;
  padding: 12px;
  text-align: center;
}

th {
  border-bottom: 1px solid;
}

tbody tr:nth-child(even) {
  background-color: var(--second-bg-color);
}

button {
  background-color: var(--main-color);
  border: none;
  border-radius: 4px;
  color: var(--text-color);
  cursor: pointer;
  font-size: 16px;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  transition: background-color 0.3s ease;
}


button:hover {
  background-color:none;
}

.action-buttons {
  display: flex;
  flex-direction: column;
  align-items: center;
}
/* Ajout de la classe icon pour les icônes */
.icon {
  display: inline-block;
  width: 20px;
  height: 20px;
  margin-right: 5px;
  background-repeat: no-repeat;
  background-position: center;
  background-size: contain;
}
/* Ajout de la classe danger pour les boutons "Annuler" */
.danger {
  background-color: var(--danger-color);
  color: var(--text-color);
}


.action-buttons button {
  margin-top: 10px;
}
*{
      font-family: 'Roboto', sans-serif;
    }
.notification {
  background-color: #f44336;
  color: white;
  text-align: center;
  padding: 10px;
  margin-bottom: 10px;
}
    </style>
</head>
<body>


<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'projetsang';
$username = 'root';
$password = '';
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

try {
    $connexion = new PDO($dsn, $username, $password);
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

// Vérifier si le formulaire a été soumis
if(isset($_POST['rechercherD'])) {
    // Récupérer les valeurs du formulaire
    $groupe = $_POST['groupe'];
    $centre = $_POST['centre'];
    
    // Requête pour récupérer les donneurs correspondants aux critères de recherche
    $sql = "SELECT * FROM sang WHERE groupe = :groupe AND centre = :centre AND etat = 'Accepter'";
    $stmt = $connexion->prepare($sql);
    $stmt->bindValue(':groupe', $groupe);
    $stmt->bindValue(':centre', $centre);
    $stmt->execute();
    $resultats = $stmt->fetchAll();
    
    // Vérifier s'il y a des résultats
    if(!$resultats) {
        echo "Aucun donneur trouvé";
    } else {
        // Afficher les résultats sous forme de tableau
        echo "<h1>Résultats de la Recherche</h1>";
        echo '<table style="border-collapse: collapse; width: 100%;">';
        echo '<thead>';
        echo '<tr>';
        echo '<th style="border: 1px solid black; padding: 5px;"> Nom </th>';
        echo '<th style="border: 1px solid black; padding: 5px;"> Prenom </th>';
        echo '<th style="border: 1px solid black; padding: 5px;"> Age </th>';
        echo '<th style="border: 1px solid black; padding: 5px;"> Telephone </th>';
        echo '<th style="border: 1px solid black; padding: 5px;"> Groupe </th>';
        echo '<th style="border: 1px solid black; padding: 5px;"> id </th>';
        echo '<th style="border: 1px solid black; padding: 5px;"> Centre </th>';
        foreach($resultats as $donneur) {
            echo "<tr>";
            echo '<tbody>';
            echo '<tr>';
            echo '<td>' . $donneur['nom'] . '</td>';
            echo '<td>' . $donneur['prenom'] . '</td>';
            echo '<td>' . $donneur['age'] . '</td>';
            echo '<td>' . $donneur['Telephone'] . '</td>';
            echo '<td>' . $donneur['groupe'] . '</td>';
            echo '<td>' . $donneur['id'] . '</td>';
            echo '<td>' . $donneur['centre'] . '</td>';
            echo '</tbody>';
            echo "</tr>";
        echo "</table>";
        }
    }
}
if(isset($_POST['rechercherD2'])) 
{
 
 $groupe = $_POST['groupe'];
    
 // Requête pour récupérer les donneurs correspondants aux critères de recherche
 $sql = "SELECT * FROM sang WHERE groupe = :groupe  AND etat = 'Accepter'";
 $stmt = $connexion->prepare($sql);
 $stmt->bindValue(':groupe', $groupe);
 $stmt->execute();
 $resultats = $stmt->fetchAll();

 echo '<table style="border-collapse: collapse; width: 100%;">';
 echo '<thead>';
 echo '<tr>';
 echo '<th style="border: 1px solid black; padding: 5px;"> Nom </th>';
 echo '<th style="border: 1px solid black; padding: 5px;"> Prenom </th>';
 echo '<th style="border: 1px solid black; padding: 5px;"> Age </th>';
 echo '<th style="border: 1px solid black; padding: 5px;"> Telephone </th>';
 echo '<th style="border: 1px solid black; padding: 5px;"> Groupe </th>';
 echo '<th style="border: 1px solid black; padding: 5px;"> id </th>';
 echo '<th style="border: 1px solid black; padding: 5px;"> Centre </th>';

 
 
 echo '</tr>';
 echo '</thead>';
 echo '<tbody>';
 foreach ($resultats as $row) {
    
     echo '<tr>';
     echo "<h1>Résultats de la Recherche</h1>";
     echo '<td style="border: 1px solid black; padding: 5px;">' . $row['nom'] . '</td>';
     echo '<td style="border: 1px solid black; padding: 5px;">' . $row['prenom'] . '</td>';
     echo '<td style="border: 1px solid black; padding: 5px;">' . $row['age'] . '</td>';
     echo '<td style="border: 1px solid black; padding: 5px;">' . $row['Telephone'] . '</td>';
     echo '<td style="border: 1px solid black; padding: 5px;">' . $row['groupe'] . '</td>';
     echo '<td style="border: 1px solid black; padding: 5px;">' . $row['id'] . '</td>';
     echo '<td style="border: 1px solid black; padding: 5px;">' . $row['centre'] . '</td>';
     echo '</tr>';
 }
 echo '</tbody>';
 echo '</table>';
}

?>
  
  </body>
</html>

