<?php
	session_start();

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You are not a member";
		header('location: log.php');
	}

	if (isset($_GET['return'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: home.php");
		//header("location: reg.php");
	}

	if (isset($_GET['return1'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: reg.php");
		//header("location: reg.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Database Systems</title>

<style>
	body {
	  background-image: url("image1.jpg");
	  background-repeat: repeat-x;
	}
	#welcome {
		width: 50%;
		margin: 10px auto 0px;
		color: white;
		background: red;
		text-align: center;
		border: 1px solid green;
		border-bottom: none;
		border-radius: 5px 5px 0px 0px;
		padding: 30px;
	}
	p1 {
    display: block;
    font-size: 2em;
    margin-block-start: 0.67em;
    margin-block-end: 0.67em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: bold;
		margin: 10px 0;
    font-family: inherit;
    font-weight: bold;
    line-height: 20px;
    color: inherit;
		font-size: 32px;
		line-height: 40px;
    color: blue;
}
.welcome{
	width: 50%;
	margin: 0px auto;
	padding: 30px;
	border: 1px solid green;
	background: orange;
	border-radius: 0px 0px 10px 10px;
 }
	</style>
</head>
<body>

	<br>
			<p1 id="welcome">
				 Alexandria Elearning Center
      </p1>

	<div class="welcome">

		<?php if (isset($_SESSION['submit'])) : ?>
			<div>
				<h3>
					<?php
						echo $_SESSION['submit'];
						unset($_SESSION['submit']);
					?>
				</h3>
			</div>
		<?php endif ?>


		<?php  if (isset($_SESSION['username'])) : ?>
			<h2 style="color:blue;">Welcome <em><?php echo $_SESSION['username']; ?></em></h2><br>

			<p>A database is an organized collection of data, generally stored and accessed electronically from a computer system. Where databases are more complex they are often developed using formal design and modeling techniques.</p>

     <p>The database management system (DBMS) is the software that interacts with end users, applications, and the database itself to capture and analyze the data. The DBMS software additionally encompasses the core facilities provided to administer the database. The sum total of the database, the DBMS and the associated applications can be referred to as a "database system". Often the term "database" is also used to loosely refer to any of the DBMS, the database system or an application associated with the database.</p>

    <p>Computer scientists may classify database-management systems according to the database models that they support. Relational databases became dominant in the 1980s. These model data as rows and columns in a series of tables, and the vast majority use SQL for writing and querying data. In the 2000s, non-relational databases became popular, referred to as NoSQL because they use different query languages.</p>
<br>

			<h5> <a href="Welcome.php?return='1'" style="color: green;">Logout</a> or create a new account <a href="welcome.php?return1='1'" style="color: green;">Register</a>  </h5>
   <?php endif ?>






	</div>

</body>
</html>
