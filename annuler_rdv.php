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
}

body {
  background-color: var(--bg-color);
  color: var(--text-color);
  font-family: Arial, sans-serif;
}

h1 {
color: var(--main-color);
text-align: center;
margin-top: 50px;
}

.container {
  background-color: var(--second-bg-color);
  border-radius: 10px;
  padding: 20px;
  margin: 20px auto;
  max-width: 500px;
}

.btn {
  background-color: var(--main-color);
  color: var(--text-color);
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.btn:hover {
  background-color: #0bd;
}
</style>
</head>
<body>
<h1><span id="typed-title"></span></h1>

<div class="container">
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

// Vérification de la soumission du formulaire
if (isset($_GET['id_rdv'])) {
    // Récupération de l'identifiant du rendez-vous à annuler
    $id_rdv = $_GET['id_rdv'];
    
    // Suppression du rendez-vous
    $sql = "DELETE FROM sang3 WHERE id_rdv = '$id_rdv'";
    if (mysqli_query($conn, $sql)) {
        echo '<h2>Le rendez-vous a été annulé avec succès.</h2>';
    } else {
        echo "Erreur: " . mysqli_error($conn);
    }
} else {
    echo "<h2>L'identifiant du rendez-vous n'a pas été spécifié.</h2>";
}


// Vérification de la soumission du formulaire
if (isset($_GET['im_rdv'])) {
    // Récupération de l'identifiant du rendez-vous
    $id_rdv = $_GET['id_rdv'];
    // Récupération des informations sur le rendez-vous
    $sql = "SELECT * FROM sang3 WHERE id_rdv = '$id_rdv'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    // Génération de la convocation
    $convocation = "Convocation de RDV de don de sang\n\n";
    $convocation .= "ID de RDV : " . $row['id_rdv'] . "\n";
    $convocation .= "Date de RDV : " . $row['daterdv'] . "\n";
    $convocation .= "Heure de RDV : " . $row['dateheu'] . "\n";
    $convocation .= "Centre de RDV : " . $row['Centre'] . "\n";

    // Impression de la convocation
    echo "<pre>" . $convocation . "</pre>";
} 


// Fermeture de la connexion
mysqli_close($conn);
?>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
<script>
var typed = new Typed('#typed-title', {
strings: ['Mes Rendez-Vous'],
typeSpeed: 100,
backSpeed: 100,
backDelay: 0,
loop: true
});
</script>
</body>
</html>