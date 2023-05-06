<?php
session_start();

$host = 'localhost';
$dbname = 'projetsang';
$username = 'root';
$password = '';
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

try {
    $connexion = new PDO($dsn, $username, $password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $stmt = $connexion->prepare("SELECT * FROM sang3 WHERE id = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    $dons = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Historique de dons</title>
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

      table {
        border-collapse: collapse;
        width: 100%;
        background-color: var(--second-bg-color);
        margin: 20px auto;
        max-width: 1200px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        overflow: hidden;
      }

      th, td {
        text-align: left;
        padding: 12px;
        border: none;
        border-bottom: 1px solid #ddd;
        font-size: 13px;
      }

      th {
        background-color: var(--main-color);
        color: #fff;
        font-weight: normal;
        
        letter-spacing: 2px;
      }

      tbody tr:nth-child(even) {
        background-color: #f2f2f2;
      }

      .print-button {
        background-color: var(--main-color);
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin: 20px auto;
        display: block;
      }

      .print-button:hover {
        background-color: #0bd;
      }
    </style>
</head>
<body>
    <h1>Historique de dons</h1>
    <?php if (isset($dons) && count($dons) > 0) { ?>
    <table>
        <thead>
            <tr>
                <th>Date de don</th>
                <th>Heure de don</th>
                <th>Centre de collecte</th>
                <th>État de la donation</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($dons as $don) { ?>
            <tr>
                <td><?= $don['daterdv'] ?></td>
                <td><?= $don['dateheu'] ?></td>
                <td><?= $don['Centre'] ?></td>
                <td><?= $don['etatrdv'] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <button class="print-button" onclick="window.print()">Imprimer l'historique de dons</button>
    <?php } else { ?>
    <p>Aucun don trouvé pour cet utilisateur.</p>
    <?php } ?>
</body>
</html>