/*
Framework per Front-end e Back-end Lavarel, Yii
Template di JS, Nunjucks, EJS, Handlebars

Per info: domanda di stackoverflow pianeti di SW
*/

$(document).ready(function(){
	$('#regione').change(function(){
		var elem = $(this).val();
		
		//Tramite POST passo all'oggetto http una stringa 'regione'
		//in tale modo in select.php viene chiamata la funzione getProvince
		$.ajax({
			type: 'POST',
			url:'ajax/select.php',
			dataType: 'json',
			data: {'regione':elem},
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
					$('#provincia option').each($(this).attr('name',e.nome)();
					$('#provincia option').each($(this).attr('value',e.nome));
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