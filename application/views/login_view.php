<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title> Welcome</title>
</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">
  <a class="navbar-brand" href="<?php echo site_url('home');?>">Recruiting CMEx</a>
</nav>

<body>

	<div class="container">
		<form>
		  <div class="form-group">

		    <input type="username" class="form-control" id="username" aria-describedby="usernameHelp" placeholder="Username">

		  </div>
		  <div class="form-group">

		    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
		  </div>
		  
		  <button type="submit" class="btn btn-primary">Submit</button>
		  <button type="submit" class="btn btn-warning">Back</button>
		</form>
	</div>
</body>
</html>