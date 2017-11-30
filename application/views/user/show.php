<!DOCTYPE html>
<html lang="es">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Show User</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	</head>
	<body>
		<div class="container mt-3">
			<div class="d-flex justify-content-between">
				<h2><?php echo "$user->name" ?> <?php echo "$user->lastname" ?></h2>
				<a class="btn btn-primary" href="<?php echo site_url('home'); ?>" role="button">Back</a>		
			</div>
			<div class="form-group ">

					<img src="<?php echo site_url().'uploads/'.$user->avatar; ?>" class="avatar img-circle" alt="avatar" id="imgAvatar" width="250px" height="250px">
			</div>
			<div class="form-group row">
				<label for="name" class="col-sm-2 form-control-label">Address</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" value="<?php echo $user->address ?>" readonly>
				</div>
			</div>
			<?php if($instruments){ ?>
				<div class="form-group row">
					<label for="genre" class="col-sm-2 form-control-label">Instruments</label>
					<div class="col-sm-10">
						<?php foreach ($instruments as $instrument) {?>
							<div class="checkbox">
							  <label><input type="checkbox" checked><?php echo "$instrument->name" ?></label>
							</div>
						<?php } ?>
					</div>
				</div>
			<?php }?>
			<?php if($genres){ ?>
			<div class="form-group row">
				<label for="genre" class="col-sm-2 form-control-label">Genre</label>
				<div class="col-sm-10">

					<?php foreach ($genres as $genre) {?>
						<div class="checkbox">
						  <label ><input type="checkbox" checked><?php echo "$genre->name" ?></label>
						</div>
					<?php } ?>
				</div>
			</div>
			<?php }?>
			<div class="form-group row">
				<label for="email" class="col-sm-2 form-control-label">Email</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" value="<?php echo $user->email ?>" readonly>
				</div>
			</div>
		</div>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	</body>
</html>