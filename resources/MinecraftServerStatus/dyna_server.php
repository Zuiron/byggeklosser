<style>
.server_container {
	border: 1px solid #E4E4E4;
	padding: 5px;
	border-radius:5px;
	
	/*min-height:60px;*/
	position:relative;
	
	max-width: 700px;
    margin: 13px auto;
}

.desc { display: block !important; }

.server_container .desc .descinner {
	margin-left:50px;
}

.server_container div {
	display:inline-block;
}

.server_container .icon {
	position:absolute;
	height:45px;
	width:38px;
}

.server_container .name {
	font-size:16px;
	
	position:relative;
	top: -14px;
    left: 65px;
	
	letter-spacing:2px;
	
	background-color:#FFF;
	/*border:2px solid #D8D8D8;*/
	border-radius:5px;
	/*padding: 5px;*/
	
	max-width: 80%;
}

.icon img {
	width:auto;
	height:inherit;
	border-radius: 5px;
}

.server_container .status {
	/*min-width: 100%;
    text-align: right;*/
	float:right;
}

.server_container .desc {
	font-size:13px;
}

.server_container .desc a {
	text-decoration:none;
	color: #FF8300;
}
.server_container .desc a:hover {
	text-decoration:underline;
}

.server_container .ip {
	/*right: 4px;
    position: absolute;
    bottom: 3px;*/
	position: static;
    float: right;
	font-style:italic;
}

.container_special {
	/* asd */
	max-width: 45%;
    min-width: 45%;
}

</style>
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
	
	$sql = "SELECT * FROM serverlist WHERE Server_ID = '".$_GET["server"]."'";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			//echo $row["IGN"]."\n";
			$srv_id = $row["Server_ID"];
			$srv_ip = $row["IP"];
			$srv_niceip = $row["Nice-IP"];
			$srv_port = $row["Port"];
			$sdesc = $row["Shortdesc"];
			$ldesc = $row["Longdesc"];
			$mcver = $row["MCVersion"];
			$modpack = $row["Modpack"];
			$modpackv = $row["Modpack-version"];
			$hideornot = $row["HideFromServerlist"];
			$icon = $row["Icon"];
			$wht = $row["Whitelist"];
		}
	} else {
		//echo "0 results";
	}
	$conn->close();
	
	
	include_once 'status.class.php';
	$status = new MinecraftServerStatus();
	$response = $status->getStatus($srv_ip, $srv_port);
	if(!$response) {
		?>
      
      <div class="server_container">
    	<div class="icon"><img src="/resources/img/servers/<?php echo $icon; ?>" height="60px"></div>
    	<div class="name"><?php echo $ldesc; ?></div>
        <div class="status"><img src="/resources/img/offline.png"></div>
        <div class="desc">
      <div class="descinner"><b>Servernavn</b>: <?php echo $sdesc; ?><br><b>Whitelist</b>: <?php echo $wht; ?></div>
      
      <div class="ip"> <?php echo $srv_niceip.":".$srv_port ?> </div>
	</div>
    </div>
	
	<?php } else { ?>
      
<div class="server_container">
	<div class="icon"><img src="/resources/img/servers/<?php echo $icon; ?>" height="60px"></div>
	<div class="name"><?php echo $ldesc; ?></div>
	<div class="status"><?php echo $response['players']; ?> / <?php echo $response['maxplayers']; ?> 
    	<img src="/resources/img/online.png"></div>
	<div class="desc">
      <div class="descinner"><b>Servernavn</b>: <?php echo $sdesc; ?><br><b>Whitelist</b>: <?php echo $wht; ?></div>
      
      <div class="ip"> <?php echo $srv_niceip.":".$srv_port ?> </div>
	</div></div>
<?php
	}

?>