<?php include('db.php') ?>

<!DOCTYPE html>
<html>
<head>
	<script>
function checkEmail() {

		var email = document.getElementById('E');
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

		if (!filter.test(email.value)) {
		alert('Please provide a valid email address');
		email.focus;
		return false;
 }
}
	</script>
	<title>Database Systems</title>
<style>
	body {
	  background-image: url("image1.jpg");
	  background-repeat: repeat-x;
	}
	input[type=text],input[type=password],input[type=email]{
	  width: 100%;
	  padding: 12px 20px;
	  margin: 8px 0;
	  display: inline-block;
	  box-sizing: border-box;
	  border: 2px solid red;
	  border-radius: 4px;
	}
	button[type=submit] {
	  width: 100%;
	  background-color: blue;
	  color: white;
	  padding: 14px 20px;
	  margin: 8px 0;
	  border: none;
	  border-radius: 4px;
	  cursor: pointer;
	}

	button[type=submit]:hover {
	  background-color: #45a049;
	}
	div {
	  border-radius: 5px;
	  background-color: orange;
	  padding: 5px;
	}
	#mistake {
		width: 94%;
		padding: 10px;
		margin: 0px auto;
		text-align: center;
		color: green;
	}
	#log {
		border: 1px solid green;
		border-radius: 5px 5px 0px 0px;
		border-bottom: none;
		padding: 10px;
		text-align: center;
		background: red;
		color: white;
		width: 50%;
		margin: 10px auto 0px;
	}
	.action {
		border: 1px solid green;
		border-radius: 0px 0px 10px 10px;
		background: white;
		padding: 10px;
		margin: 0px auto;
		width: 50%;
	}

</style>
</head>


<body>

<br>
		<p id="log" style = "font-size:20px">Login</p>

	<form class="action" action="log.php" method="post" onsubmit="return checkEmail();" >

		<div>
			<label>Email</label>
			<input type="email" name="email" id='E' >
		</div>
		<div>
			<label>Password</label>
			<input type="password" name="password">
		</div>

		<?php  if (count($mistakes) > 0) : ?>
			<div id="mistake">
				<?php foreach ($mistakes as $error) : ?>
					<p><?php echo $error ?></p>
				<?php endforeach ?>
			</div>
		<?php  endif ?>

		<div>
			<button type="submit" name="sub2">Login</button>
		</div>
		<p>
			If you are not register before please <a href="reg.php">Register</a> or go to home page <a href="home.php"> Home </a>
		</p>
	</form>


</body>
</html>
