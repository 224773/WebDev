<?php
//processStudentLogin.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {//Check it is coming from a form
    
		//mysql credentials
    $mysql_host = "localhost";
    $mysql_username = "mattscalf";
    $mysql_password = "Thunder21";
    $mysql_database = "shoes";
	
	//delcare PHP variables
	
	$password = $_POST["password"];
	$ssn = $_POST["ssn"];
	//$lastName = $_POST["lastName"];
	//$currentLocation = $_POST["currentLocation"];
	//$destinationLocation = $_POST["destinationLocation"];
	//$postButton = $_POST["givePass"];
    //$passError = ("Please enter a Valid password");
	
 
if (true)	
{
	//Open a new connection to the MySQL server
	//see https://www.sanwebe.com/2013/03/basic-php-mysqli-usage for more info
	$mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
    
	//Output any connection error
	if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}   
    
	$statement = $mysqli->prepare("INSERT INTO shoe (style) VALUES(?)"); //prepare sql insert query
	//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
	$statement->bind_param('s', $ssn); //bind value
	 if($statement->execute()){
	//print output text
	echo nl2br("Thanks for your social security number ". $ssn . "\r\n", false);
	 }else{
		 print $mysqli->error; //show mysql error if any 
	 }
}
else{ 
die($passError);
}	
}			
?>