<?php
	include_once('../config/config.php');
	include_once('../class/data.class.php');

	//Connessione al DB, si prende i dati tramite POST
	$mysqli = new data(HOST, USERNAME, PASSWORD, DATABASE);

	//Seleziona le regioni dal database (vedi riga 6)
	if(isset($_POST['regione']))
	{
		$datastore = $mysqli->getProvince($_POST['regione']);
	}
	//Seleziona le provincie
	if(isset($_POST['provincia']))
	{
		$datastore = $mysqli->getComuni($_POST['provincia']);
	}
	//Seleziona il cap
	if(isset($_POST['cod_istat']))
	{
		$datastore = $mysqli->getCap($_POST['cod_istat']);
	}
	//codifica in json i risultati ottenuti dalle funzioni
	echo json_encode($datastore);
?>
