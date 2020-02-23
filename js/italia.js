/*
Framework per Front-end e Back-end Lavarel, Yii
Template di JS, Nunjucks, EJS, Handlebars

Per info: domanda di stackoverflow pianeti di SW
*/

/*
Il problema è: le funzioni richiedono come input valori numerici per essere usati nelle query sql
Questi valori sono associati ad un nome, una stringa (noi vogliamo la stringa)
Se però si modifica il contenuto del valore di un campo, il prossimo campo che deve utilizzare
quel valore per eseguire una query nel db non potrà usare una stringa come il nome della provincia
perché necessita di un indice numerico come cod_regione
*/

$(document).ready(function(){
	$('#regione').change(function(){
		//IL POST SI PRENDE IL VALUE, NON IL NOME
		var elem = $(this).val();
		$('#spanregione').append($(this).val());
		
		
		//Tramite POST passo all'oggetto http una stringa 'regione'
		//in tale modo in select.php viene chiamata la funzione getProvince
		$.ajax({
			type: 'POST',
			url:'ajax/select.php',
			dataType: 'json',
			data: {'regione':elem},
			//elem è il valore del codice della regione, passato tramite post
			//alla funzione che cerca le provincie
			success: function(res)
			{
				$('#provincia option').each(
					function(){
						$(this).remove()
					}
				);
				//Aggiungi al campo di scelte
				$('#provincia').append('<option selected="selected">Seleziona...</option>');
				//Togli tutte le opzioni precedenti
				$('#comune option').each(function(){$(this).remove()});
				//Aggiungi di nuovo la funzione di default
				$('#comune').append('<option selected="selected">Seleziona...</option>');
				//Svuota il cap
				$('#cap').attr('value','');
				$.each(res, function(i, e)
				{
					$('#provincia').append('<option name="'+e.codice+'"value="' + e.codice + '">' + e.nome + '</option>');
					$('#spanprovincia').append(e.nome);
				});
			}
		});
	});
	
	$('#provincia').change(function(){
		var elem = $(this).val();
		
		$.ajax({
			type: 'POST',
			url:'ajax/select.php',
			dataType: 'json',
			data: {'provincia':elem},
			success: function(res){
				$('#comune option').each(function(){$(this).remove()});
				$('#comune').append('<option selected="selected">Seleziona...</option>');
				$('#cap').attr('value','');
				$.each(res, function(i, e){
					$('#comune').append('<option value="' + e.codice + '">' + e.nome + '</option>');
					$('#spancomune').append(e.nome);
				});
			}
		});
	});
	
	$('#comune').change(function(){
		var elem = $(this).val();
		
		$.ajax({
			type: 'POST',
			url:'ajax/select.php',
			dataType: 'json',
			data: {'cod_istat':elem},
			success: function(res){
				$('#cap').attr('value',res);
				$('#spancap').append(res);
			}
		});
	});
});