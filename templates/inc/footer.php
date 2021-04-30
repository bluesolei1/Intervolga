<form class="row row-cols-lg-auto g-3 align-items-center " id="edit"  name="countryForm" >
	<div class="col-12">
		<div class="input-group">
			<input type="text" class="form-control" placeholder="Страна" name ="countryName" id="countryName" title="Страна">
		</div>
	</div>
	<div class="col-12">
		<div class="input-group">
			<input type="text" class="form-control" placeholder="Столица" name="countryCapital" id="countryCapital" title="Столица">
		</div>
	</div>
	<div class="col-12">
		<div class="input-group">
			<input type="text" class="form-control" placeholder="Население" name="countryPopulation" id="countryPopulation"  title="Население">
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
			$.post( "../country/index.php", { countryName: $("#countryName").val(), countryCapital: $("#countryCapital").val(),countryPopulation: $("#countryPopulation").val()})
			.done(function( data ) {
				try {
					errArray=$.parseJSON(data)
					$("#errorDiv").show();
					$("#errorDiv").text("");
					$("html, body").animate({ scrollTop: 0 }, "slow")
					$.each(errArray, function(n, elem) {
						$("#errorDiv").append("<li>"+elem+"</li>");     
					});
					} catch(e) {
					location.reload(true);
				}
			});
		});
	});
	</script>									