<script>document.getElementById('nav_server').setAttribute('class', 'active');</script>
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

.server_container .desc .descinner {
	margin-left:50px;
}

.server_container div {
	display:inline-block;
}

.server_container .icon {
	position:absolute;
	height:38px;
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

<div id="mainwrapper">
	
    <div id="news">Servere</div>
    <i style="font-size:12px;float: right;">Du kan søke om whitelist <a href="/whitelistapply">her.</a></i>
    <br><br>
    
    <div class="server_container container_special" style="/*float:left;*/">
    	<div class="icon"><img src="/resources/img/discord.png" height="60px"></div>
    	<div class="name">Discord</div>
        <div class="status"> <i style="font-size:10px;"> https://discord.gg/0ZxrM9v5nxQ1bt1g </i> 
        <!--<b style="color:#FF5400; text-decoration:underline; font-size: 14px;">ANBEFALT!</b>--></div>
        <div class="desc">
        <div class="descinner"><b><a style="text-decoration:underline;" href="https://discordapp.com/apps" target="new">Last ned</a></b> <i>(valgfritt)</i></div>
            <div class="ip">Discord: <a style="text-decoration:underline;" href="https://discord.gg/0ZxrM9v5nxQ1bt1g" target="new">Join</a></div>
        </div>
    </div>
    <!--
    <div class="server_container container_special" style="float:right;">
    	<div class="icon"><img src="/resources/img/teamspeak-logo.png" height="60px"></div>
    	<div class="name">Teamspeak 3</div>
        <div class="desc">
        	<div class="descinner"><b>Passord</b>: Ja <i>"dontask"</i></div>
            <div class="ip">ts.byggeklosser.net</div>
        </div>
    </div>-->
    
    <br><br>
    <?php #require_once("resources/MinecraftServerStatus/server_vanilla.php"); ?>
    <?php #require_once("resources/MinecraftServerStatus/server_regrowth.php"); ?>
    <?php #require_once("resources/MinecraftServerStatus/server_ftbinfinity_expert.php"); ?>
    <?php #require_once("resources/MinecraftServerStatus/server_ftbinfinity_vip.php"); ?>
    
    <!--<iframe src="http://www.byggeklosser.net/resources/MinecraftServerStatus/server_vanilla.php" width="100%" frameborder="0"></iframe>
    
    <iframe src="http://www.byggeklosser.net/resources/MinecraftServerStatus/dyna_server.php?server=22" width="100%" frameborder="0"></iframe>-->
    
    
    <!--    NEW CODE    -->
    
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
	
	$sql = "SELECT * FROM serverlist WHERE HideFromServerlist = '0' ORDER BY `Order` ASC";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			//echo $row["IGN"]."\n";
			?>
<iframe src="http://www.byggeklosser.net/resources/MinecraftServerStatus/dyna_server.php?server=<?php echo $row["Server_ID"]; ?>" width="100%" frameborder="0" height="100px"></iframe>
			<?php
		}
	} else {
		//echo "0 results";
	}
	$conn->close();
	
    ?>
    
    
    
    
    
    
</div>