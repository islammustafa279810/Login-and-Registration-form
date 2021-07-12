<?php
	session_start();

	$db = mysqli_connect('localhost', 'root', '', 'reg');

$name = "";
 $em    = "";
	$_SESSION['submit'] = "";
	$mistakes = array();


if (isset($_POST['sub2'])) {

		$em = mysqli_real_escape_string($db, $_POST['email']);
		$encrypted = mysqli_real_escape_string($db, $_POST['password']);

if (empty($em)) { array_push($mistakes, "Enter your email"); }
		if (empty($encrypted)) { array_push($mistakes, "Enter your password"); }

if (count($mistakes) == 0) {

			$encrypted = md5($encrypted);
			$query = "SELECT * FROM registration WHERE email='$em' AND password='$encrypted' ";
			$results = mysqli_query($db, $query);

			/*$count=mysqli_num_rows($result);
			if ($count == 1) {
      $row = $result->fetch_assoc();
      $_SESSION['username'] = $row['username'];
      header("Location: welcome2.php");
		}*/


			/*$finfo = mysqli_fetch_fields($result);

			if ($results=mysqli_query($con,$sql))
			  {
			  // Fetch one and one row
			  while ($row=mysqli_fetch_row($results))
			    {
			    printf ("%s (%s)\n",$row[0],$row[1]);
			    }
			  // Free result set
			  mysqli_free_result($results);
			}*/


			if (mysqli_num_rows($results) == 1) {

		 /*	$ses_sql=mysqli_query("select username from login where username='$name'", $connection);
	 		 $row = mysqli_fetch_assoc($ses_sql);
	 		 $login_session =$_SESSION['username'];*/
       //$results["username"];

			 //$row = mysqli_fetch_assoc($results);

			// $name = $record["username"];
			$row = $results->fetch_assoc();
      $_SESSION['username'] = $row['username'];
				//$_SESSION['email'] = $em;//globalvar access in func /return and check
				$_SESSION['submit'] ="You can submit now";

				header('location: welcome.php');
			}else {
				array_push($mistakes, "There is a mistake in your email or password");
			}
		}
	}




		if (isset($_POST['sub1'])) {

			$name = mysqli_real_escape_string($db, $_POST['username']);
			$em = mysqli_real_escape_string($db, $_POST['email']);
			$encrypted = mysqli_real_escape_string($db, $_POST['password']);


if (empty($name)) { array_push($mistakes, "required username"); }
			if (empty($em)) { array_push($mistakes, "required email"); }
			if (empty($encrypted)) { array_push($mistakes, "required password"); }

$sql_u = "SELECT * FROM registration WHERE username='$name'";
			  	$sql_e = "SELECT * FROM registration WHERE email='$em'";
			  	$res_u = mysqli_query($db, $sql_u);
			  	$res_e = mysqli_query($db, $sql_e);

					if (count($mistakes) == 0) {
						$encrypted = md5($encrypted);

			  	if (mysqli_num_rows($res_u) > 0) {
			  	  //$name_error = "Sorry... username already taken";
						array_push($mistakes, "Username is taken");
			  	}else if(mysqli_num_rows($res_e) > 0){
			  	  //$em_error = "Sorry... email already taken";
						array_push($mistakes, "Email is taken");
			  	}else{

			/*$em = test_input($_POST["email"]);
	    if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
	  $emErr = "Invalid email format";
	   }
		 echo 'fdddf';*/

		 /*if (mysqli_num_rows($name) > 0) {
		 			$name_error = "Sorry... username already taken";
		 		}else if(mysqli_num_rows($em) > 0){
		 			$em_error = "Sorry... email already taken";
		 		}else {*/


				/*if($em != "") {
				$result = mysql_query("SELECT * FROM registration where email='".$em."'");
				$num_rows = mysql_num_rows($result);
				if($num_rows >= 1){
						echo "email exist";
				}else{
						$sql = mysql_query ("INSERT INTO registration (email) VALUES ('$em')");
						echo "Thank you for Submitting. Redirecting back to Home Page";
				}
			}*/

	    	$query = "INSERT INTO registration (username, email, password) VALUES('$name', '$em', '$encrypted')";
				mysqli_query($db, $query);


				$_SESSION['username'] = $name;
				$_SESSION['submit'] = "You can submit now";
				header('location: welcome.php');

			}
		 }
		}


?>
