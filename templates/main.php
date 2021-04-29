<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../vendor/jquery-3.6.0.min.js"></script>
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
			<tr>
				<th scope="row">1</th>
				<td>Mark</td>
				<td>Otto</td>
				<td>@mdo</td>
			</tr>
			<tr>
				<th scope="row">2</th>
				<td>Jacob</td>
				<td>Thornton</td>
				<td>@fat</td>
			</tr>
			<tr>
				<th scope="row">3</th>
				<td colspan="2">Larry the Bird</td>
				<td>@twitter</td>
			</tr>
			
			
		</tbody>
	</table>
	<form class="row row-cols-lg-auto g-3 align-items-center " id="edit" action="../index.php" method="POST" name="countryForm">
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
