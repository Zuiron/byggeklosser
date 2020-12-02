<div id="mainwrapper">
	<div id="news">MinePanel New Server</div>

	legger til bruker i whitelist... vent...
    
    <br><br>
    
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
	
	if($_POST["secret"] == "manualaddwl") {
	
		$sql = "INSERT INTO global_whitelist (IGN, ServerID)
		VALUES ('".$_POST["IGN"]."', '".$_POST["Server_ID"]."')";
		
		if ($conn->query($sql) === TRUE) {
			echo "bruker '".$_POST["IGN"]."' ble lagt til whitelist! på server: '".$_POST["Server_ID"]."'";
			?> <script>setTimeout(function () { window.location.href = "/minepanel/whitelist"; }, 3000);</script> <?php
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	
	}
			
	?>
    
</div>