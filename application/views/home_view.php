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
  
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
		<a class="nav-link" href="<?php echo site_url('login');?>">
			สำหรับ เจ้าหน้าที่
		</a>
    </li>
  </ul>
</nav>

<body>

	<div class="container-fluid" style="padding-top: 10px">
		<table class="table table-hover">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">First</th>
		      <th scope="col">Last</th>
		      <th scope="col">Handle</th>
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
	</div>

	<div class="jumbotron text-center fixed-bottom" style="margin-bottom:0">
	  <p>2021</p>
	</div>

</body>
</html>