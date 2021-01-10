<?php
/*for beginners, it is recommended to use Procedural way of connecting mySQL database.*/

$insert = false;
if(isset($_POST['Name'])){

// agar kisi ne name field ke andar value dali toh hi yeh php code run hoga warna nai.





// when we go to page source we don't find any php code, bcs PHP IS A DYNAMICALLY TYPED LANGUAGE
// IT'S GENERATED ON SERVERS.





	$server = "localhost";
	$username = "root";
	$password = "";

	$con = mysqli_connect($server, $username, $password);

	if(!$con){
		die("connection to this database failed due to" . mysql_connect_error());
	}

	//echo "Success connecting to the db";

	$name = $_POST['Name'];
	$age = $_POST['Age'];
	$gender = $_POST['Gender'];
	$email = $_POST['Email'];
	$phone = $_POST['Phone'];
	$other = $_POST['Desc'];
	$sql = "INSERT INTO `trip`.`trip` (`Name`, `Age`, `Gender`, `Email`, `Phone`, `Other`, `Date`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";
	//echo $sql;
//this is my first time in making database, made it through harry php course, trip.

	if($con->query($sql) == true){
		//echo "insert successful";
		$insert = true;
	}
	else{
		echo "insert unsuccessful due to error $sql <br> $con->error";
	}

	$con->close();

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Travel Website Project</title>
	<link href="https://fonts.googleapis.com/css2?family=Lato&family=Potta+One&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<img class= "bg" src="ves.jpg" alt = "VESIT">
	<div class="container">
	<h1>Welcome to VESIT Manali Trip Form.</h1>
	<p>Enter your details here and submit this form to confirm your seat !!!</p>


	<?php
	if($insert == true){
	echo "<p id = 'positive'>Thanks for filling your form. We are happy to hear from you. </p>";

	}
	?>


<form action = "index.php" method = "post">
		<input type="text" id="name" name= "Name" placeholder="Enter your name.">
		<input type="text" id="age" name= "Age" placeholder="Enter your age.">
		<input type="text" id="gender" name= "Gender" placeholder="Enter your gender.">
		<!--<input type="text" id="year" name= "year" placeholder="Enter your year."> --->
		<input type="email" id="Email" name= "Email" placeholder="Enter your Email.">
		<input type="phone" id="Phone" name= "Phone" placeholder="Enter your Phone.">
		<textarea name = "Desc" id="desc" rows = "6" cols="30" placeholder="Enter extra information here."></textarea>
		<button class = "btn">Submit</button>
	</form>


	</div>
	<script type="text/javascript" src="index.js"></script>

</body>
</html>