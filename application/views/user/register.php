<!DOCTYPE html>
<html lang="es">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Register</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	</head>
	<body>
		<div class="container mt-3">
			<div class="d-flex justify-content-between">
				<h2>Register</h2>
				<a class="btn btn-primary" href="<?php echo site_url('login'); ?>" role="button">Back</a>		
			</div>
			<form class="mt-4" method="POST" action="user/save" enctype="multipart/form-data">
				
     
			<div class="form-group row">
				<label for="name" class="col-sm-2 form-control-label">Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="name" name="name" placeholder="Name" required="">
				</div>
			</div>
			<div class="form-group row">
				<label for="lastname" class="col-sm-2 form-control-label">Last Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required="">
				</div>
			</div>
			<div class="form-group row">
				<label for="avatar" class="col-sm-2 form-control-label">Avatar</label>
				<div class="col-sm-10">
					<input type="file" class="form-control" name="avatar" id="avatar" required="" size="20">
				</div>
			</div>
			<div class="form-group d-flex justify-content-center">

					<img src="https://cdn.pixabay.com/photo/2016/08/20/05/38/avatar-1606916_960_720.png" class="avatar img-circle" alt="avatar" id="imgAvatar" width="100px" height="100px">
			</div>
			<div class="form-group row">
				<label for="name" class="col-sm-2 form-control-label">Address</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="address" name="address" placeholder="Address" required="">
				</div>
			</div>
			<div class="form-group row">
				<label for="genre" class="col-sm-2 form-control-label">Instruments</label>
				<div class="col-sm-10">
					<?php foreach ($instruments as $instrument) {?>
						<div class="checkbox">
						  <label><input type="checkbox" name="instruments[]" value="<?php echo "$instrument->id" ?>"><?php echo "$instrument->name" ?></label>
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="form-group row">
				<label for="genre" class="col-sm-2 form-control-label">Genre</label>
				<div class="col-sm-10">
					<?php foreach ($genres as $genre) {?>
						<div class="checkbox">
						  <label ><input type="checkbox" name="genres[]" value="<?php echo "$genre->id" ?>"><?php echo "$genre->name" ?></label>
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="form-group row">
				<label for="email" class="col-sm-2 form-control-label">Email</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" id="email" name="email" placeholder="Email" required="">
				</div>
			</div>
			<div class="form-group row">
				<label for="password" class="col-sm-2 form-control-label">Password</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" id="password" name="password" placeholder="Password" required="">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-success">Sign in</button>
				</div>
			</div>
		</form>
		</div>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
		<script src="<?php echo site_url().'js/showImage.js'; ?>"></script>
	</body>
</html>