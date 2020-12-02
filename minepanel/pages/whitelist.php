<script>document.getElementById('nav_mp_whitelist').setAttribute('class', 'active');</script>

<style>
#whitelist_application {
	border: 1px solid #E2E2E2;
	border-radius:5px;
	padding:5px;
	font-size:14px;
	position: relative;
}
.fullname, .email, .date, .mcname {
	display:inline-block;
}
a.checkname { font-size:12px; }
#minecraft_dude { float:left; }
#minecraft_dude img {
	max-width: 47px;
	padding: 5px 20px 0px 10px;
}
form {
	display:inline-block;
}
#knapperinos {
	padding:5px;
	position:absolute;
	right:0px;
	bottom:0px;
}
</style>

<div id="mainwrapper">
	<div id="news">MinePanel Whitelist</div>
        
        Manuell whitelisting:<br>
        <form action="/minepanel/manualwl" method="post" style="padding-left:30px;">
        	<br>
        	Minecraft navn (IGN): <input type="text" name="IGN"><br>
            Server_ID: <select name="Server_ID">
                <!--<option value="volvo">Volvo</option>
                <option value="saab">Saab</option>
                <option value="fiat">Fiat</option>
                <option value="audi">Audi</option>-->
                
                
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
				
				$sql = "SELECT * FROM serverlist WHERE Whitelist = 'Ja' ORDER BY `Order` ASC";
				$result = $conn->query($sql);
				
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) { ?>
						<option value="<?php echo $row["Server_ID"]; ?>"><?php echo $row["Shortdesc"]; ?></option>
                        <?php
					}
				}
				?>
                
                
              </select>
            
            <br>
        	<br>
            <input type="submit" value="Legg til...">
        	<input type="hidden" name="secret" value="manualaddwl">
        </form>
        <br><br><br>
        
        
        
        
        Redigere server whitelister
        <br><br>
        <div style="padding-left: 30px;">
        <?php
		$sql = "SELECT * FROM serverlist WHERE Whitelist = 'Ja' ORDER BY `Order` ASC";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) { ?>
            
                <a href="/minepanel/editserverwhitelist/<?php echo $row["Server_ID"]; ?>">
				<?php echo "<".$row["Shortdesc"].">"; ?>
                </a>
                <br><br>
                
                <?php
			}
		}
		?>
        </div>
        
        
        
        
        <br>
        <div id="news">Whitelist Søknader Behandler</div>
        <br>
        
        <style>
		.actions {
			padding: 10px;
			text-align: center;
			color: #fff;
			text-shadow: 1px 1px 0px #000;
			border-radius: 10px;
			box-shadow: 0px 1px 5px #000;
		}
		#accepted {
			display: block;
			background-color:green;
		}
		#declined {
			display: block;
			background-color:red;
		}
		#msgwrapper {
			min-height: 50px;
		}
		</style>
        
        
        <div id="msgwrapper">
        <?php 
		if(isset($_POST["name"]) && isset($_POST["type"]) && isset($_POST["ID"]) && isset($_POST["server"])) {
			if($_POST["type"] == "avvis") {
		//code------------------------------------------------------------
		
		$sql = "UPDATE `whitelist_applications` SET 
		`Status`='-1' WHERE `ID`='".$_POST["ID"]."'";	//update application.
		if ($conn->query($sql) === TRUE) {
			
			
		//send mail on avvist til søker!
		$to = $_POST["email"]; //send mail til søker
		$subject = "Byggeklosser.net whitelist søknad for ".$_POST["name"]." på server ".$_POST["server"]." Avvist!";
		$txt = "Hei ".$_POST["name"].", Vi har nå behandlet din søknad om whitelist på server ".$_POST["server"].", Og desverre ble den ikke godkjent. Det kan vere mange grunner til dette. Hvis du ønsker å kontakte oss vennligst bruk vår Discord server. Link finner du på våre hjemmesider under 'servere'.";
		$headers = "From: noreply@byggeklosser.net" . "\r\n" .
"Content-Type: text/html; charset=UTF-8";
		mail($to,$subject,$txt,$headers);
			
			
			?>
            <div id="declined" class="actions"> <?php
        	echo "Avviste søknad med ID: ".$_POST["ID"].", Navn: ".$_POST["name"]." på server: ".$_POST["server"];
        	?> </div>
            
		<?php
		}
		else {
			echo "Error updating record 12: " . $conn->error;
		}
		
		//----------------------------------------------------------------
		?>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        	<?php } else if($_POST["type"] == "godkjenn") {
		//code------------------------------------------------------------
		
		
		$pieces = explode("-", $_POST["server"]);
		$serverid = $pieces[0]; // serverid
		
		$sql = "INSERT INTO global_whitelist (IGN, ServerID)
	VALUES ('".$_POST["name"]."', '".$serverid."')";
		if ($conn->query($sql) === TRUE) {
			
			$sql2 = "UPDATE `whitelist_applications` SET 
		`Status`='1' WHERE `ID`='".$_POST["ID"]."'";	//update application.
			if ($conn->query($sql2) === TRUE) {
				
				//send mail on godkjening til søker!
				$to = $_POST["email"]; //send mail til søker
				$subject = "Byggeklosser.net whitelist søknad for ".$_POST["name"]." på server ".$_POST["server"]." GODKJENT!";
				$txt = "Hei ".$_POST["name"].", Vi har nå behandlet din søknad om whitelist på server ".$_POST["server"].", Og har godkjent den. Velkommen og håper du har en hyggelig tid på våre servere!. \n \n Vær obs på at det kan ta opp til ~20 minutter før whitelisten blir oppdatert på serveren.";
				$headers = "From: noreply@byggeklosser.net" . "\r\n" .
	"Content-Type: text/html; charset=UTF-8";
				mail($to,$subject,$txt,$headers);
				
			?>
            <div id="accepted" class="actions"> <?php
        	echo "Godjente søknad med ID: ".$_POST["ID"].", Navn: ".$_POST["name"]." på server: ".$_POST["server"];
        	?> </div>
		<?php
			}
			else {
				echo "Error updating record 94: " . $conn->error;
			}
		
		}
		else {
			echo "Error updating record 87: " . $conn->error;
		}
	
	
		
		
		//----------------------------------------------------------------
			}
		}
		?>
        </div>
        
        
        
        
        <script>
		setTimeout(function() {
			$('.actions').slideUp(800);
		}, 8000); // <-- time in milliseconds
		</script>
        
        
        
        
        
        
        <br><br>
        
        <?php
			$statusid = 0;
			$stmt = $DBH->prepare("SELECT * FROM whitelist_applications 
			WHERE Status = :status"); //query
			$stmt->bindParam(':status', $statusid);
			$stmt->execute(); //execute
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$rows_affected = $stmt->rowCount();
			if($rows_affected < 1) { echo "Ingen ubehandlede whitelist søknader! Bra jobba :D"; }
			while($row = $stmt->fetch()) {
				//$status = $row['Status'];
			?>
			
		<div id="whitelist_application" class="unread">
        <div id="minecraft_dude">
        	<?php $imageURL = "https://crafatar.com/renders/body/".$row['MC_Name']; ?>
            
            <?php if(getimagesize($imageURL)) { ?>
            <img src="<?php echo $imageURL; ?>">
            <?php } else { ?><img src="/resources/img/unknown.png"><?php } ?>
        </div>
        	<b>Minecraft Navn:</b>
            <div class="mcname"><?php echo $row['MC_Name']; ?>
            <a class="checkname" href="https://namemc.com/s?<?php echo $row['MC_Name']; ?>" 
            target="new">(Check Name History & Legitability)</a></div><br>
            
            <b>Email:</b>
            <div class="email"><?php echo $row['Email']; ?></div><br>
            
            <b>F&oslash;dselsdato</b>:
            <div class="date"><?php echo $row['Date']; ?>
            <b>(<?php echo date_diff(date_create($row['Date']), date_create('today'))->y; ?> &aring;r.)</b></div><br>
            
            <b>Check Bans:</b>
            <div class="mcname"><a class="checkname" href="http://www.mcbans.com/player/<?php echo $row['MC_Name']; ?>" 
            target="new">(Check Bans)</a></b></div><br>
            
            <b>Server:</b><?php echo $row['Server']; ?>
            <br>
            <a href="http://www.ip-tracker.org/locator/ip-lookup.php?ip=<?php echo $row['IP']; ?>" target="new">(ip-tracker.org)</a>
            <br><br>
            
            <b>Litt om deg selv og hvorfor du vil joine valgt server:</b><br>
            <div class="desc">
			<?php echo $row['Textform']; ?></div>
            <div id="knapperinos">
            	<form action="/minepanel/whitelist" method="post">
                	<input type="hidden" name="ID" value="<?php echo $row['ID']; ?>">
                	<input type="hidden" name="name" value="<?php echo $row['MC_Name']; ?>">
                    <input type="hidden" name="email" value="<?php echo $row['Email']; ?>">
                    <input type="hidden" name="server" value="<?php echo $row['Server']; ?>">
                	<input type="hidden" name="type" value="godkjenn">
                	<input type="submit" value="Godkjenn">
                </form>
                
                <form action="/minepanel/whitelist" method="post">
                	<input type="hidden" name="ID" value="<?php echo $row['ID']; ?>">
                	<input type="hidden" name="name" value="<?php echo $row['MC_Name']; ?>">
                    <input type="hidden" name="email" value="<?php echo $row['Email']; ?>">
                    <input type="hidden" name="server" value="<?php echo $row['Server']; ?>">
                	<input type="hidden" name="type" value="avvis">
                	<input type="submit" value="Avvis">
                </form>
			</div>
            
        </div><br>
            <?php } //white loop end ?>
    
</div>