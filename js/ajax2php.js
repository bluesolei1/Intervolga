	$( document ).ready(function() {
		$("#edit").hide();
		$("#errorDiv").hide();
		$( "#addCountry" ).click(function() {
			$("#edit").slideDown();
			$(this).hide();
		});
		$("#submit").click(function () {	
			$.post( "../country/index.php", { countryName: $("#countryName").val(), countryCapitalName: $("#countryCapitalName").val(),countryPopulation: $("#countryPopulation").val()})
			.done(function( data ) {
				try {  //если ответ на POST запрос валидный JSON, значит в форме были ошибки, выводим их
					errArray=$.parseJSON(data)
					$("#errorDiv").show();
					$("#errorDiv").text("");
					$("html, body").animate({ scrollTop: 0 }, "slow")
					$("#countryName, #countryCapitalName, #countryPopulation ").removeClass("is-invalid");
					$.each(errArray, function(n, elem) {
						$.each(elem, function(key, value) {
							$("#errorDiv").append("<li>"+value+"</li>");    
							$("#"+key).addClass("is-invalid");
						});
					});
					} catch(e) { // если ответ не JSON, значит все ќ , перегружаем страницу дл€ обновлени€ данных
					location.reload(true);
				}
			});
		});
	});