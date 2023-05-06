
<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Faire un don de sang</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.css">
<style>
/* Définition des couleurs */
:root {
  --bg-color: #1f242d;
  --second-bg-color: #323946;
  --text-color: #fff;
  --main-color: #0ef;
}

/* Style de la page */
body {
  background-color: var(--bg-color);
  color: var(--text-color);
  font-family: Arial, sans-serif;
  font-size: 16px;
  line-height: 1.5;
}

header {
  background-color: var(--second-bg-color);
  padding: 20px;
  text-align: center;
}

h1 {
  margin: 0;
  font-size: 36px;
  font-weight: bold;
  letter-spacing: 2px;
  text-transform: uppercase;
}

main {
  padding: 20px;
}

form {
  display: flex;
  flex-direction: column;
  align-items: center;
}

label {
  margin-top: 10px;
  font-size: 18px;
  font-weight: bold;
}

input[type="date"],
input[type="time"],
select {
  margin-top: 5px;
  padding: 10px;
  border-radius: 5px;
  border: none;
  background-color: var(--second-bg-color);
  color: var(--text-color);
  font-size: 16px;
  font-weight: bold;
}

input[type="submit"] {
  margin-top: 20px;
  padding: 10px 20px;
  border-radius: 5px;
  border: none;
  background-color: var(--main-color);
  color: var(--text-color);
  font-size: 18px;
  font-weight: bold;
  cursor: pointer;
  transition: background-color 0.2s ease-in-out;
}

input[type="submit"]:hover {
  background-color: #0cf;
}

footer {
  background-color: var(--second-bg-color);
  padding: 10px;
  text-align: center;
}

/* Ajout d'icônes */
@font-face {
  font-family: "FontAwesome";
  src: url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/fonts/fontawesome-webfont.woff2?v=4.7.0") format("woff2"),
       url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/fonts/fontawesome-webfont.woff?v=4.7.0") format("woff");
  font-weight: normal;
  font-style: normal;
}

input[type="date"]::before {
  font-family: "FontAwesome";
  content: "\f073";
  margin-right: 5px;
}

input[type="time"]::before {
  font-family: "FontAwesome";
  content: "\f017";
  margin-right: 5px;
}

select::before {
  font-family: "FontAwesome";
  content: "\f078";
  margin-right: 5px;
}

/* Ajout d'animations */
h1 span {
  display: inline-block;
  color: #0ef;
}

.typed-cursor {
  opacity: 1;
  animation: blink 0.7s infinite;
}

@keyframes blink {
  0% {
    opacity: 1;
  }
  50% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}
</style>
</head>
<body>
<header>
<h1><span></span></h1>
</header>

<main>
<form action="faitdon.php" method="POST">

<input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
<label for="daterdv">Date souhaitée pour le don :</label>
<input type="date" id="daterdv" name="daterdv" min="2023-05-01" max="2023-05-31"
       required pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[7-9]|[12][0-9]|3[01])$">

<label for="dateheu">Heure souhaitée pour le don (Choisir entre 8h et 13h) :</label>
<input type="time" id="dateheu" name="dateheu" min="08:00" max="13:00" 
       required pattern="^[0-7]{2}:[0-9]{2}$">
      
            <label>Le centre où vous voulez faire le don :</label>
            <select id="centre" name="centre" required>
                <option value="">Choisir le centre</option>
                <option value="Centre 1014">DSP SETIF 1014</option>
                <option value="Centre lhchama">CHU SETIF lhchama</option>
                <option value="Centre Bizzare">CHU SETIF Bizzare</option>
                <option value="Centre kaaboub">CHU SETIF kaaboub</option>
                <option value="Centre saadna abdenour">CHU SETIF Saadna Abdenour</option>
                <option value="AIN_KBIRA">EPH AIN EL KEBIRA</option>
                <option value="EL_EULMA">EPH EL EULMA</option>
                <option value="BENI_OURTHILANE">EPH BENI OURTILANE</option>
                <option value="AIN_OULMENE">EPH AIN OULMENE</option>
                <option value="RAS_EL_MA">EHS RAS EL MA</option>
                <option value="AIN_ABESSA">EPSP AIN ABESSA</option>
                <option value="AIN_AZEL">EPSP AIN AZEL</option>
                <option value="BENI_AZIZ">EPSP BENI AZIZ</option>
            </select>
<input type="submit" name="Faire">
</form>
</main>

<footer>
<p>&copy; 2023 Espace Donneur</p>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
<script>
  var typed = new Typed('h1 span', {
    strings: ['Faire un don de sang!'],
    typeSpeed: 80,
    backSpeed: 50,
    loop: true
  });
</script>
</body>
</html>