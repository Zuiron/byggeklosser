<div id="mainwrapper">
	<div id="news">MinePanel New Server</div>

	sletter server, vent...
    
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
	
	// sql to delete a record
	$sql = "DELETE FROM serverlist WHERE ID=".$url_path[1];

	if ($conn->query($sql) === TRUE) {
		echo "serveren ble nå slettet!";
		?>
        <script>setTimeout(function () { window.location.href = "/minepanel/servers"; }, 3000);</script>
        <?php
	} else {
		echo "Error deleting record: " . $conn->error;
	}
			
	?>
    
</div>