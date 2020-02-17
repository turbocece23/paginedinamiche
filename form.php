<?php
    //Il file contiene tutti i dati di accesso al database
    include_once('config/config.php');
    include_once('class/data.class.php');

    //Connessione al database
    $mysqli = new data(HOST, USERNAME, PASSWORD, DATABASE);
    $regioni = $mysqli->getRegioni();
?>
<!doctype html>
<html>
    <head>
		<meta charset="utf-8" />
		<title>Untitled Document</title>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
		<script type="text/javascript" src="js/italia.js"></script>
    </head>

    <body>
	<?php
		echo $_POST['regione'];
		echo $_POST['provincia'];
		echo $_POST['comune'];
		echo $_POST['cap'];
	?>
		<form method="post">
			<p>
				<label for="regione">Regione</label>
				<select name="regione" id="regione" class="dinamiche">
					<option value="">Seleziona...</option>
					<?php foreach($regioni as $val): ?>
						<option name="regione" value="<?php echo $val['cod_regione']; ?>"><?php echo $val['regione']; ?></option>
					<?php endforeach; ?>
				</select>
			</p>
			<p>
				<label for="provincia">Provincia</label>
				<select name="provincia" id="provincia" class="dinamiche">
					<option name="provincia" value="">Seleziona...</option>
				</select>
			</p>
			<p>
				<label for="comune">Comune</label>
				<select name="comune" id="comune">
					<option name="comune" value="">Seleziona...</option>
				</select>
			</p>
			<p>
				<label for="cap">Cap</label>
				<input type="text" name="cap" id="cap" readonly="readonly"/>
			</p>
			<input type="submit" id="invia" value="invia">
		</form>
		<span>REGIONE</span><span id="spanregione"></span><br>
		<span>PROVINCIA</span><span id="spanprovincia"></span><br>
		<span>COMUNE</span><span id="spancomune"></span><br>
		<span>CAP</span><span id="spancap"></span><br>
	</body>
</html>
