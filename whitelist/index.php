<?php
	//Generate text file on the fly

   header("Content-type: text/plain");
   #below only for download...
   #header("Content-Disposition: attachment; filename=savethis.txt");
   
   $debug = false; //DEBUG ONLY FOR DEV PURPOSES!

   // do your Db stuff here to get the content into $content
   if($debug) {
   print "debug: fetching whitelist for serverid: ".$_GET["server"]." ...\n";
   }
   #print $content;
   
   	//Mysql connect...
   	$servername = "byggeklosser.mysql.domeneshop.no";
	$username = "byggeklosser";
	$password = "Y7TMEq8m";
	$dbname = "byggeklosser";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	$sql = "SELECT * FROM global_whitelist WHERE ServerID = '".$_GET["server"]."'";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo $row["IGN"]."\n";
		}
	} else {
		//echo "0 results";
	}
	$conn->close();
   
 ?>