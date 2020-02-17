<?php
class data extends mysqli
{
	//Selezione di tutte le regioni
	public function getRegioni()
	{
		//Ritorna le regioni, tutte le regioni, TUTTE
		$query = "SELECT * FROM regioni";
		if($result = parent::query($query))
		{
			//Controlla che il risultato ottenuto non sia 0, quindi ho ottenuto un risultato
			if($result->num_rows > 0)
			{
				//Fetch_array di tutte le righe del comune
				while($row = $result->fetch_array())
				{
					//Crea un array associativo (una sorta di matrice)
					//Due campi, cod_regione e il nome della regione
					//ritorna alla funzione Ajax l'array appena creato
					//che conterrà il nostro array associativo delle regioni
					$regioni[] = array(
						'cod_regione' => $row['cod_regione'],
						'regione' => $row['regione']
					);
				}
				return $regioni;
			}
		}
	}
	
	//Seleziona le province della regione scelta
	public function getProvince($cod_regione)
	{
		//Avendo già specificato una regione, scegli tutte le provincie che
		//appartengono a quella regione (avendo il cod_regione)
		$query = "SELECT * FROM province WHERE cod_regione = '".$cod_regione."'";
		if($result = parent::query($query))
		{
			//Se il risultato non è vuoto
			if($result->num_rows > 0)
			{
				while($row = $result->fetch_array())
				{
					//Crea un array associativo delle provincie
					//due campi, codice della provincia e il nome
					$province[] = array(
						'codice' => $row['cod_provincia'],
						'nome' => $row['provincia']
					);
				}
				//Ritorna il risultato
				return $province;
			}
		}
	}
	
	//Seleziona i comuni della provincia scelta
	public function getComuni($cod_provincia)
	{
		//Seleziona dai comuni tutti i comuni che appartengono a quella provincia
		$query = "SELECT * FROM comuni WHERE cod_provincia = '".$cod_provincia."'";
		if($result = parent::query($query))
		{
			if($result->num_rows > 0)
			{
				while($row = $result->fetch_array())
				{
					//Array associativo con codice del comune e il nome
					$comuni[] = array(
						'codice' => $row['cod_istat'],
						'nome' => $row['comune']
					);
				}
				return $comuni;
			}
		}
	}
	
	//Seleziona il cap del comune scelto
	public function getCap($cod_istat)
	{
		//Seleziona il cap partendo da un codice istat
		$query = "SELECT * FROM cap WHERE cod_istat = '".$cod_istat."'";
		if($result = parent::query($query))
		{
			//Se ha trovato un cap, allora
			if($result->num_rows == 1)
			{
				//assegna alla variabile $cap, il valore della rica $row['cap']
				$row = $result->fetch_array();
				$cap = $row['cap'];
				//Ritorna il risultato
				return $cap;
			}
		}
	}
}
?>