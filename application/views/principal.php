<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Page Title</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<div class="d-flex justify-content-center">
				<h1>Bienvenido <?php if (isset($_SESSION['user'])) {
						echo $_SESSION['user']->name; 				
					}else{
						echo 'Invitado';
					}?>
				</h1>
			</div>
			<div class="mt-4 mb-4">
				<div class="d-flex justify-content-between">	
					<h1>All Musicians of Database</h1>
					<form action="<?php echo site_url('logout'); ?>" method="post">
						<button type="submit" class="btn btn-outline-danger" <?php if (!isset($_SESSION['user'])) {
																			echo "disabled"; 				
																		}?>>Cerrar Sesión</button>
					</form>
				</div>
			</div>
	<form action="<?php echo site_url('search'); ?>" method="post">
		<div class="row mb-2">
			<div class="col-md-6">
				<select name="instruments" class="form-control">
					 <?php  foreach ($instruments as $instrument) {  ?>
			                 <option value="<?php echo $instrument->id ?>"><?php echo "$instrument->name"; ?></option>
					 <?php } ?>
				</select>
			</div>
			<div class="col-md-6">
				<select name="genre" class="form-control">
					 <?php  foreach ($genres as $genre) {  ?>
			                 <option value="<?php echo $genre->id ?>"><?php echo "$genre->name"; ?></option>
					 <?php } ?>
				</select>
			</div>
		</div>
		<button type="submit" class="btn btn-outline-success mb-2">Buscar</button>

	</form>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Name</th>
					<th>Last Name</th>
					
				</tr>
			</thead>
			<tbody>
				<?php 
					foreach ($users as $row)
					{ ?>
				        <tr>
							<td><?php echo"$row->name"?></td>
							<td><?php echo"$row->lastname"?></td>
							
				        </tr>
					<?php } ?>
			</tbody>
		</table>
		</div>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	</body>
</html>