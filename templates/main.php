<?php include_once __DIR__ ."./inc/header.php" ?>
<div class="container">


<div class="alert alert-danger" role="alert" id="errorDiv" >
</div>
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
				<td><?=$country->countryPopulation ?></td>
				<?php endforeach; ?>
			</tr>	
		</tbody>
	</table>
	
<?php include_once __DIR__ ."./inc/footer.php" ?>