<form class="row row-cols-lg-auto g-3 align-items-center " id="edit" action="../country/index.php" method="POST" name="countryForm">
	<div class="col-12">
		<div class="input-group">
			<input type="text" class="form-control" placeholder="Страна" name ="countryName">
		</div>
	</div>
	<div class="col-12">
		<div class="input-group">
			<input type="text" class="form-control" placeholder="Столица" name="countryCapital">
		</div>
	</div>
	<div class="col-12">
		<div class="input-group">
			<input type="text" class="form-control" placeholder="Население" name="countryPopulation">
		</div>
	</div>
	<div class="col-12"><button type="submit" class="btn btn-primary">Отправить</button>	</div>
</form>
<button type="button" class="btn btn-primary" id="addCountry">Добавить</button>
</div>

<script>
	$( document ).ready(function() {
		$("#edit").hide();
		$( "#addCountry" ).click(function() {
			$("#edit").slideDown();
			$(this).hide();
		});
	});
	</script>			