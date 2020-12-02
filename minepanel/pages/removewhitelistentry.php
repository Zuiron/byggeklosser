<div id="mainwrapper">
<br>

<style>
			.link {
				padding: 20px;
				color: #FFF;
				margin-left: 20px;
				margin-right: 20px;
			}
			.red { background-color: red; }
			.green { background-color: green; }
			</style>

<?php
	//Mysql connect...
   	$servername = "byggeklosser.mysql.domeneshop.no";
	$username = "byggeklosser";
	$password = "Y7TMEq8m";
	$dbname = "byggeklosser";
	$srv;
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	$sql2 = "SELECT * FROM global_whitelist WHERE ID=".$url_path[1];
	$result2 = $conn->query($sql2);
	
	if ($result2->num_rows > 0) {
		// output data of each row
		while($row2 = $result2->fetch_assoc()) {
			//$srv = $row2["Shortdesc"]; 
			$pieces = explode("-", $url_path[2]);
			?>
            <div style="text-align:center">
            Er du sikker på at du vil fjerne whitelist for <b><?php echo $row2["IGN"]; ?></b> på server <b><?php echo $url_path[2]; ?></b> ?<br>
            <br>
            <br>
            <a class="link red" href="/minepanel/editserverwhitelist/<?php echo $pieces[0]; ?>/delentry/<?php echo $row2["ID"] ?>"> Ja </a> 
             
            <a class="link green" href="/minepanel/editserverwhitelist/<?php echo $pieces[0]; ?>"> Nei</a>
            
            </div>
            <?php
		}
	}
	?>


</div>