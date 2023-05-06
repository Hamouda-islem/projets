<!DOCTYPE html>
<html>
<head>
<title>Convocation de RDV Don de Sang</title>
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
  margin-top: 50;
}

.container {
  background-color: var(--second-bg-color);
  border-radius: 10px;
  padding: 20px;
  margin: 20px auto;
  max-width: 600px;
  box-shadow: 0 0 10px rgba(0, 0,0.2);
}

p {
  margin: 10px 0;
}

.print-button {
  background-color: var(--main-color);
  color: #fff;
  border: none;
  border-radius:5px;
  padding: 10px 20px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.print-button:hover {
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
    $id_rdv = $_GET['id_rdv'];
    
    // Récupération des informations du rendez-vous et du donneur de sang correspondant
    $sql = "SELECT sang.nom, sang.prenom,sang.telephone,sang.email,sang3.id_rdv, sang3.daterdv, sang3.dateheu, sang3.Centre 
    FROM sang3    JOIN sang ON sang.id=sang3.id 
    WHERE sang3.id_rdv = '$id_rdv'";

    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        // Affichage de la convocation de RDV
        while($row = mysqli_fetch_assoc($result)) {
            echo '<h1>Convocation de RDV de Don de Sang</h1>';
            echo '<p>Nom et prénom : '.$row['nom'].' '.$row['prenom'].'</p>';
            echo '<p>Téléphone : '.$row['telephone'].'</p>';
            echo '<p>Email : '.$row['email'].'</p>';
            echo '<p>ID de RDV : '.$row['id_rdv'].'</p>';
            echo '<p>Date et heure de rendez-vous : '.$row['dateheu'].' '.$row['daterdv'].'</p>';
            echo '<p>Centre de collecte : '.$row['Centre'].'</p>';
            echo '<button class="print-button" onclick="printConvocation()">Imprimer la convocation</button>';
        }
    } else {
        echo "Aucun rendez-vous correspondant à cet identifiant n'a été trouvé.";
    }
} else {
    echo "L'identifiant du rendez-vous n'a pas été spécifié.";
}

// Fermeture de la connexion
mysqli_close($conn);
?>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
<script>
var typed = new Typed('#typed-title', {
strings: ['Imprimez RDV'],
typeSpeed: 100,
backSpeed: 100,
backDelay: 0,
loop: true
});

function printConvocation() {
    window.print();
}
</script>
</body>
</html>
