<div id="mainwrapper">
	<div id="news">MinePanel New Server</div>

	er du sikker på at du vil slette server med ID: <?php echo $url_path[1]; ?>
    <br>
    
    <?php
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
	
	$sql = "SELECT * FROM serverlist WHERE ID=".$url_path[1];
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
	?>
    
    <br><br>
    <?php echo "servername: ".$row["Shortdesc"]; ?>
    <br><br>
    <a href="/minepanel/servers" style="background-color:green;color:white;padding:20px;">Nei </a> ----- <a style="background-color:red;color:white;padding:20px;" href="/minepanel/deleteserver/<?php echo $url_path[1]; ?>">Ja</a>
    
    <?php } } ?>
    
    <br><br>
    
    
</div>