<!DOCTYPE html>
<html>
<head>
<title>Ma page de rendez-vous</title>
<!-- Ajout de la bibliothèque Typed.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
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
<!-- Ajout de l'attribut id pour le titre h1 -->
<h1 id="typed-title"></h1>
    <?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projetsang";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['annuler_rdv'])) {
    $id = $_POST['id_rdv'];
    $sql = "DELETE FROM sang3 WHERE id = '$id'";
    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Le rendez-vous a été annulé avec succès.");</script>';
    } else {
        echo "Erreur: " . mysqli_error($conn);
    }
}

$id = $_POST['id'];
$sql = "SELECT * FROM sang3 WHERE id = '$id' ";
$result = mysqli_query($conn, $sql); // Correction de l'erreur ici
if (!$result) {
    echo "Erreur : " . mysqli_error($conn);
} else {
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        echo '<table style="border-collapse: collapse; width: 100%;">';
        echo '<thead>';
        echo '<tr>';
        echo '<th style="border: 1px solid black; padding: 5px; border-bottom: 1px solid black;"> ID de RDV : </th>';
        echo '<th style="border: 1px solid black; padding: 5px; border-bottom: 1px solid black;"> La date de RDV : </th>';
        echo '<th style="border: 1px solid black; padding: 5px; border-bottom: 1px solid black;"> L heure de RDV : </th>';
        echo '<th style="border: 1px solid black; padding: 5; border-bottom: 1px black;"> Le Centre de RDV :  </th>';
        echo '<th style="border: 1px solid black; padding: 5px; border-bottom: 1px solid black;"> Passage de RDV (Oui) :  </th>';
        echo '<th style="border: 1px solid black; padding: 5px; border-bottom: 1px solid black;"> Action : </th>';
        echo '</tr>';
        echo '</thead>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tbody>';
            echo '<tr>';
            echo '<td style="border: 1px solid black; padding: 8px;">' .$row['id_rdv']. '</td>';
            echo '<td style="border: 1px solid black; padding: 8px;">' .$row['daterdv']. '</td>';
            echo '<td style="border: 1px solid black; padding: 8px;">' .$row['dateheu'].'</td>';
            echo '<td style="border: 1px solid black; padding: 8px;">' .$row['Centre'].'</td>';
            echo '<td style="border: 1px solid black; padding: 8px;">' .$row['etatrdv'].'</td>';
            echo '<td style="border: 1px solid black; padding: 8px;">';
            echo '<div class="action-buttons">';
            echo '<form method="GET" action="annuler_rdv.php">';
            echo '<input type="hidden" name="id_rdv" value="'.$row['id_rdv'].'">';
            /* Ajout de l'icône et de la classe danger pour le bouton "Annuler" */
            echo '<button type="submit" name="annuler_rdv" class="danger"> Annuler </button>';
            echo '</form>';         
            echo '<form method="GET" action="imprimer_convocation.php">';
            echo '<input type="hidden" name="id_rdv" value="'.$row['id_rdv'].'">';
            /* Ajout de l'icône pour le bouton "Imprimer" */
            echo '<button type="submit" name="imprimer_rdv"> Imprimer </button>';
            echo '</form>'; 
            echo '</div>';
            echo '</td>';
            echo '</tr>';
            echo '</tbody>';
        }
        echo '</table>';
    } else {
        echo '<div class="notification">Vous n\'avez pas de rendez-vous à venir.</div>';
    }
}
?>
<!-- Script pour utiliser la bibliothèque Typed.js -->
<script>
var typed = new Typed('#typed-title', {
  strings: ['Mes Rendez-Vous'],
  typeSpeed: 100,
  backSpeed: 100,
  backDelay: 0,
  loop: false
});

</script>
</>
</html>
