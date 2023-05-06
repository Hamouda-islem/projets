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


if(isset($_POST['Faire']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    $daterdv = $_POST['daterdv'];
    $dateheu = $_POST['dateheu'];
    $centre = $_POST['centre'];
    $id_rdv = uniqid();
    $sql = "SELECT * FROM sang WHERE id = :id AND etat = 'Accepter'";
    $stmt = $connexion->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $donneur = $stmt->fetch();
    if(!$donneur) {
        echo "Donneur introuvable";
    } else {
        $sql = 'INSERT INTO sang3 (id,id_rdv,daterdv, dateheu, centre) VALUES (:id,:id_rdv,:daterdv, :dateheu, :centre)';
        $stmt = $connexion->prepare($sql);
        $result = $stmt->execute([
            'id' => $id,
            'id_rdv' => $id_rdv,
            'daterdv' => $daterdv,
            'dateheu' => $dateheu,
            'centre' => $centre,
        ]);
        if ($result) {
            echo "<h2>RDV de don ajouté avec succès</h2>";
        } else {
            echo "Erreur lors de l'ajout du don";
        }
    }
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
<script>
var typed = new Typed('#typed-title', {
strings: ['RDV'],
typeSpeed: 100,
backSpeed: 100,
backDelay: 0,
loop: true
});
</script>
</body>
</html>
