<form class="row row-cols-lg-auto g-3 align-items-center " id="edit"  name="countryForm" >
	<div class="col-12">
		<div class="input-group">
			<input type="text" class="form-control" placeholder="Страна" name ="countryName" id="countryName" title="Страна"  maxlength="60">
		</div>
	</div>
	<div class="col-12">
		<div class="input-group">
			<input type="text" class="form-control" placeholder="Столица" name="countryCapitalName" id="countryCapitalName" title="Столица"  maxlength="60">
		</div>
	</div>
	<div class="col-12">
		<div class="input-group">
			<input type="text" class="form-control" placeholder="Население" name="countryPopulation" id="countryPopulation"  title="Население"  maxlength="11">
		</div>
	</div>
	<div class="col-12"><button  class="btn btn-primary" type="button" id="submit">Отправить</button>	</div>
</form>
<button type="button" class="btn btn-primary" id="addCountry">Добавить</button>
</div>

<script>
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
					} catch(e) { // если ответ не JSON, значит все ОК, перегружаем страницу для обновления данных
					location.reload(true);
				}
			});
		});
	});
	</script>										