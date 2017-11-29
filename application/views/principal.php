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
					<h1>All Users of the Database</h1>
					<form action="<?php echo site_url('logout'); ?>" method="post">
						<button type="submit" class="btn btn-primary" <?php if (!isset($_SESSION['user'])) {
																			echo "disabled"; 				
																		}?>>Cerrar Sesión</button>
					</form>
				</div>
			</div>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Email</th>
					<th>Name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					foreach ($query->result() as $row)
					{ ?>
				        <tr>
							<td><?php echo"$row->email"?></td>
							<td><?php echo"$row->name"?></td>
							<td>
								<?php  if ($row->email != $_SESSION['user']->email) {?>
									<div class="d-flex">
										<form action="<?php echo site_url("edit/".$row->id); ?>" method="post">
											<button type="submit" class="btn btn-warning btn-sm" <?php if (!isset($_SESSION['user'])) {
																				echo "disabled"; 				
																			}?>>Edit</button>
										</form>
										<form action="<?php echo site_url("destroy/".$row->id); ?>" method="post" class="ml-1">
											<button type="submit" class="btn btn-danger btn-sm" <?php if (!isset($_SESSION['user'])) {
																				echo "disabled"; 				
																			}?>>Delete</button>
										</form>
									</div>
								<?php } ?>
							</td>
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