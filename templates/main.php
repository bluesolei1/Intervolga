<link href="../country/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="../country/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../country/vendor/jquery-3.6.0.min.js"></script>
<div class="container">
	<table class="table table-hover">
		<thead>
			<tr>
				<th scope="col">id</th>
				<th scope="col">Страна</th>
				<th scope="col">Столица</th>
				<th scope="col">Население</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($countries as $country): ?>
			<tr>
				<th scope="row"><?=$country->id?></th>
				<td><?=$country->countryName ?></td>
				<td><?=$country->countryCapital?></td>
				<td><?=$country->population ?></td>
				<?php endforeach; ?>
			</tr>	
		</tbody>
		
	</table>
	<form class="row row-cols-lg-auto g-3 align-items-center " id="edit" action="../country/index.php" method="POST" name="countryForm">
		<div class="col-12">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Страна" name ="name">
			</div>
		</div>
		
		<div class="col-12">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Столица" name="capital">
			</div>
		</div>
		
		<div class="col-12">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Население" name="population">
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
