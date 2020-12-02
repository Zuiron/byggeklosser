<div id="mainwrapper">
	<div id="news">MinePanel New Server</div>

	lager ny server, vent...
    
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
	
	$sql = "INSERT INTO serverlist (Shortdesc, HideFromServerlist)
	VALUES ('Server_ID-desc-desc', '1')";
	
	if ($conn->query($sql) === TRUE) {
		echo "Ny server er nå lagd!";
		?>
        <script>setTimeout(function () { window.location.href = "/minepanel/servers"; }, 3000);</script>
        <?php
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
			
	?>
    
</div>