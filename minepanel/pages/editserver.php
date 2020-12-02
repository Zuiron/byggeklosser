<div id="mainwrapper">
	<div id="news">MinePanel Redigerer Server</div>

	redigerer server med ID: <?php echo $url_path[1]; ?>
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
	
	//update if post detected...
	
	if($_POST["secret"] == "edit") {
		
		$ID = $url_path[1];
		
		$sql = "UPDATE `serverlist` SET 
		`Server_ID`='".$_POST["Server_ID"]."', 
		`Order`='".$_POST["Order"]."', 
		`IP`='".$_POST["IP"]."', 
		`Nice-IP`='".$_POST["Nice-IP"]."', 
		`Port`='".$_POST["Port"]."', 
		`Shortdesc`='".$_POST["Shortdesc"]."', 
		`Longdesc`='".$_POST["Longdesc"]."', 
		`MCVersion`='".$_POST["MCVersion"]."', 
		`Modpack`='".$_POST["Modpack"]."', 
		`Modpack-version`='".$_POST["Modpack-version"]."', 
		`HideFromServerlist`='".$_POST["HideFromServerlist"]."', 
		`Icon`='".$_POST["Icon"]."', 
		`Whitelist`='".$_POST["Whitelist"]."', 
		`wl-open`='".$_POST["wl-open"]."'
		 WHERE `ID`=$ID;";

		
		if ($conn->query($sql) === TRUE) {
			?>
            <div id="lagret" style="color:#000; background-color:green;"> LAGRET! </div>
            <script>
			setTimeout(function() {
				$('#lagret').fadeOut('fast');
			}, 3000); // <-- time in milliseconds
			</script>
            <?php
		} else {
			echo "Error updating record: " . $conn->error;
		}
		
	}
	
	//load
	
	$sql = "SELECT * FROM serverlist WHERE ID=".$url_path[1];
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
	?>
        
    <form action="" method="post">
    	ID: <input type="text" name="ID" value="<?php echo $row["ID"]; ?>" disabled><br>
      	Server_ID: <input type="text" name="Server_ID" value="<?php echo $row["Server_ID"]; ?>"><br>
      	Order: <input type="text" name="Order" value="<?php echo $row["Order"]; ?>"><br>
        
        IP: <input type="text" name="IP" value="<?php echo $row["IP"]; ?>"><br>
        Nice-IP: <input type="text" name="Nice-IP" value="<?php echo $row["Nice-IP"]; ?>"><br>
        Port: <input type="text" name="Port" value="<?php echo $row["Port"]; ?>"><br>
        Shortdesc: <input type="text" name="Shortdesc" value="<?php echo $row["Shortdesc"]; ?>"><br>
        Longdesc: <input type="text" name="Longdesc" value="<?php echo $row["Longdesc"]; ?>"><br>
        MCVersion: <input type="text" name="MCVersion" value="<?php echo $row["MCVersion"]; ?>"><br>
        Modpack: <input type="text" name="Modpack" value="<?php echo $row["Modpack"]; ?>"><br>
        Modpack-version: <input type="text" name="Modpack-version" value="<?php echo $row["Modpack-version"]; ?>"><br>
        HideFromServerlist: <input type="text" name="HideFromServerlist" value="<?php echo $row["HideFromServerlist"]; ?>">1 = gjømt, 0 = vis.<br>
        Icon: <input type="text" name="Icon" value="<?php echo $row["Icon"]; ?>"><br>
        Whitelist: <input type="text" name="Whitelist" value="<?php echo $row["Whitelist"]; ?>"><br>
        wl-open: <input type="text" name="wl-open" value="<?php echo $row["wl-open"]; ?>">1 = søknad åpent, 0 = kan ikke søke om whitelist.<br>
        
        <br><br><br>
        <input type="hidden" name="secret" value="edit">
        <input type="submit" value="Lagre...">
    </form>
        
	<?php
		}
	}
	?>
    
</div>