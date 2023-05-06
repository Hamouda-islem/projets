<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projetsang";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
	$groupe = $_POST['groupe'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Receveur de sang</title>
<meta charset="utf-8">
<!-- Lien vers la bibliothèque Typed.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
<style>
/* Utilisation des variables de couleurs */
:root {
  --bg-color: #1f242d;
  --second-bg-color: #323946;
  --text-color: #fff;
  --main-color: #0ef;
}

/* Style général de la page */
body {
  background-color: var(--bg-color);
  color: var(--text-color);
  font-family: Arial, sans-serif;
  font-size: 16px;
  line-height: 1.5;
  margin: 0;
  padding: 0;
}

/* Titre de la page */
h1 {
  color: var(--main-color);
  font-size: 36px;
  margin: 0;
  padding: 20px;
  text-align: center;
}

/* Sous-titres */
h2 {
  color: var(--main-color);
  font-size: 24px;
  margin: 40px 0 20px;
  padding: 0 20px;
}

/* Formulaire */
form {
  display: flex;
  flex-direction: column;
  margin: 20px;
}

label {
  color: var(--main-color);
  font-size: 18px;
  margin-bottom: 10px;
}

input[type="hidden"],
select,
button {
  background-color: var(--second-bg-color);
  border: none;
  border-radius: 5px;
  color: var(--text-color);
  font-size: 16px;
  margin-bottom: 20px;
  padding: 10px;
}

button {
  cursor: pointer;
  transition: background-color 0.3s ease-in-out;
}

button:hover {
  background-color: var(--main-color);
}

/* Liste à puces */
ul {
  list-style: disc;
  margin: 20px;
  padding: 0 20px;
}

li {
  margin-bottom: 10px;
}

/* Contact */
ul:last-of-type {
  margin-bottom: 40px;
}

/* Bibliothèque Typed.js */
.typed-cursor {
  color: var(--main-color);
}

/* Animation de la bibliothèque Typed.js */
.typed-fade-out {
  opacity: 0;
  transition: opacity 0.5s;
}
</style>
</head>
<body>
<!-- Titre de la page avec la bibliothèque Typed.js -->
<h1><span id="typed"></span></h1>
<script>
var typed = new Typed('#typed', {
  strings: ['Bienvenue dans l\'espace Receveur'],
  typeSpeed: 50,
  backSpeed: 50,
  loop: false,
  showCursor: true,
  cursorChar: '|',
  onComplete: function(self) {
    self.cursor.remove();
  }
});
</script>

<h2>Rechercher des donneurs de sang</h2>
<form method="POST" action="rechD.php">
<?php $groupe = isset($_POST['groupe']) ? $_POST['groupe'] : ''; ?>
<input type="hidden" name="groupe" value="<?php echo $groupe; ?>">

<p>Groupe sanguin : <?php echo $groupe; ?></p>

<label for="centre">Centre de don :</label>
<select name="centre" id="centre" required>
<option value="">Choisir Le Centre</option>
<option value="Centre 1014">DSP SETIF 1014</option>
<option value="Centre lhchama">CHU SETIF lhchama</option>
<option value="Centre Bizzare">CHU SETIF Bizzare</option>
<option value="Centre kaaboub">CHU SETIF kaaboub</option>
<option value="Centre saadna abdenour">CHU SETIF Saadna Abdenour</option>
<option value="AIN_KBIRA">EPH AIN ELEBIRA</option>
<option value="EL_EULMA">EPH EL EULMA</option>
<option value="BENI_OURTHILANE">EPH BENI OURTILANE</option>
<option value="AIN_OULMENE">EPH AIN OULMENE</option>
<option value="RAS_EL_MA">EHS RAS EL MA</option>
<option value="AIN_ABESSA">EPSP AIN ABESSA</option>
<option value="AIN_AZEL">EPSP AIN AZEL</option>
<option value="BENI_AZIZ">EPSP BENI AZIZ</option>
</select>

<button type="submit" name="rechercherD">Rechercher des donneurs de sang</button>
</form>

<h2>Consulter les donneurs de sang</h2>
<form method="POST" action="rechD.php">
<label for="groupe_sanguin">Sélectionnez le groupe sanguin :</label>
<select name="groupe" id="groupe">
  <?php 
    if ($groupe == "O+") {
      echo '<option value="O+">O+</option>
            <option value="O-">O-</option>';
    } else if ($groupe == "O-") {
      echo '<option value="O-">O-</option>';
    } else if ($groupe == "A+") {
      echo '<option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>';
    } else if ($groupe == "A-") {
      echo '<option value="O-">O-</option>
            <option value="A-">A-</option>';
    } else if ($groupe == "B+") {
      echo '<option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>';
    } else if ($groupe == "B-") {
      echo '<option value="O-">O-</option>
            <option value="B-">B-</option>';
    } else if ($groupe == "AB+") {
      echo '<option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>';
    } else if ($groupe == "AB-") {
      echo '<option value="O-">O-</option>
            <option value="A-">A-</option>
            <option value="B-">B-</option>
            <option value="AB-">AB-</option>';
    }
  ?>
</select>

<button type="submit" name="rechercherD2">Consulter les donneurs de sang</button>
</form>

<h2>Dernières actualités</h2>
<p>Voici les dernières actualités relatives au don de sang :</p>
<ul>
<li>Organisation d'une collecte de sang le 1er mai dans le centre-ville</li>
<li>Les critères pour devenir donneur de sang ont été assouplis</li>
<li>Les stocks de sang sont actuellement suffisants, mais n'hésitez pas à donner si vous le pouvez</li>
</ul>

<h2>Contact</h2>
<p>N'hésitez pas à nous contacter si vous avez des questions :</p>
<ul>
<li>Téléphone : 01 23 45 67 89</li>
<li>Email : contact@sang.org</li>
</ul>
</body>
</html>