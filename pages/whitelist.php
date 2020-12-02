<?php
	define("DB_HOST", "byggeklosser.mysql.domeneshop.no");
	define("DB_NAME", "byggeklosser");
	define("DB_USER", "byggeklosser");
	define("DB_PASS", "Y7TMEq8m");
?>

<script>document.getElementById('nav_whitelist').setAttribute('class', 'active');</script>
<style>
textarea {
	min-width:100%;
	max-width:100%;
	height:120px;
}
#minecraft_dude { float:left; }
#minecraft_dude img {
	padding: 5px 20px 0px 10px;
}
</style>
<div id="mainwrapper">
  <div id="news">Whitelist</div>
  <?php
  if($_POST["fullname"] == "" || $_POST["email"] == "" || $_POST["dd"] == "-1" || $_POST["mm"] == "-1" || $_POST["yyyy"] == "-1" || $_POST["text"] == "" || $_POST["server"] == "-1") {
  ?>
    Her kan du søke om whitelist på våres servere som har whitelist <i>enabled</i>.<br>
    Det du trenger å gjøre er å fylle ut skjemaet <b>under</b> og "Send Søknad"
    <br>
    <?php
		//crafatar no longer supports username, must convert username -> uuid then ask crafater with uuid!
		$json = file_get_contents("https://api.mojang.com/users/profiles/minecraft/".$_POST["fullname"]);
		$obj = json_decode($json);
		$uuid = $obj->{'id'};
		$imageURL = "https://crafatar.com/renders/body/".$uuid;

		//debug
		//print $json;
		//print $uuid;
		//print $imageURL;

		//this line OLD code. no longer works / supported.
		//$imageURL = "https://crafatar.com/renders/body/".$_POST["fullname"]; ?>
	<br>
    <form action="/whitelistapply" method="post"> <!-- Søknad sendt til samme 'page' og bruk scan basert på post data -->
    	<fieldset>
    		<legend>Søknad om whitelist:</legend>

            <div id="minecraft_dude">
            <?php if($_POST["exist"] == "1" && $_POST["fullname"] != "") { ?>

            <?php if(getimagesize($imageURL) !== false) { ?>
            <img src="https://crafatar.com/renders/body/<?php echo $uuid; ?>">
            <?php } else { ?> <img src="/resources/img/unknown.png"> <?php } ?>
             <?php }
			else { ?><img src="/resources/img/unknown.png"><?php } ?>
            </div>

            Minecraft Navn:<br>
    		<input type="text" required name="fullname" placeholder="Postman Pat" value="<?php echo $_POST["fullname"]; ?>" <?php
			if($_POST["exist"] == "1" && getimagesize($imageURL) !== false) { echo "readonly"; } ?>>
            <?php if($_POST["exist"] == "1" && $_POST["fullname"] == "") { ?> <i class="fa fa-exclamation-triangle" style="color:#FF0004;"> Må fylles ut!</i> <?php } ?>

            <?php if($_POST["exist"] == "1" && getimagesize($imageURL) == false) { echo "<b style='color:red;'>Kunne ikke finne dette minecraft navnet...</b>"; } ?>

            <br><br>
<?php if($_POST["exist"] == "1" && getimagesize($imageURL) !== false) { //only load once pressed fortsett... ?>

            Email:<br>
    		<input type="email" required name="email" placeholder="Pat@posten.no" value="<?php echo $_POST["email"]; ?>">
            <?php if($_POST["exist"] == "1" && $_POST["email"] == "") { ?> <i class="fa fa-exclamation-triangle" style="color:#FF0004;"> Må fylles ut!</i> <?php } ?>
            <br><br>

            Fødselsdato:<br>
    		<select name="dd" size="1" required>
              <option value="-1">Dag</option>
              <option value="01">1</option><option value="02">2</option><option value="03">3</option>
              <option value="04">4</option><option value="05">5</option><option value="06">6</option>
              <option value="07">7</option><option value="08">8</option><option value="09">9</option>
              <option value="10">10</option><option value="11">11</option><option value="12">12</option>
              <option value="13">13</option><option value="14">14</option><option value="15">15</option>
              <option value="16">16</option><option value="17">17</option><option value="18">18</option>
              <option value="19">19</option><option value="20">20</option><option value="21">21</option>
              <option value="22">22</option><option value="23">23</option><option value="24">24</option>
              <option value="25">25</option><option value="26">26</option><option value="27">27</option>
              <option value="28">28</option><option value="29">29</option><option value="30">30</option>
              <option value="31">31</option>
            </select>
            <select name="mm" size="1" required>
            	<option value="-1">Måned</option>
              	<option value="01">Januar</option>
                <option value="02">Februar</option>
                <option value="03">Mars</option>
                <option value="04">April</option>
                <option value="05">Mai</option>
                <option value="06">Juni</option>
                <option value="07">Juli</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
            <select name="yyyy" size="1" required>
            	<option value="-1">År</option>
                <option value="2010">2017</option>
                <option value="2010">2016</option>
                <option value="2010">2015</option>
                <option value="2010">2014</option>
                <option value="2010">2013</option>
                <option value="2010">2012</option>
                <option value="2010">2011</option>
                <option value="2010">2010</option>
                <option value="2009">2009</option>
                <option value="2008">2008</option>
                <option value="2007">2007</option>
                <option value="2006">2006</option>
                <option value="2005">2005</option>
                <option value="2004">2004</option>
                <option value="2003">2003</option>
                <option value="2002">2002</option>
                <option value="2001">2001</option>
                <option value="2000">2000</option>
                <option value="1999">1999</option>
                <option value="1998">1998</option>
                <option value="1997">1997</option>
                <option value="1996">1996</option>
                <option value="1995">1995</option>
                <option value="1994">1994</option>
              	<option value="1993">1993</option>
                <option value="1992">1992</option>
                <option value="1991">1991</option>
                <option value="1990">1990</option>
                <option value="1989">1989</option>
                <option value="1988">1988</option>
                <option value="1987">1987</option>
                <option value="1986">1986</option>
                <option value="1985">1985</option>
                <option value="1984">1984</option>
                <option value="1983">1983</option>
                <option value="1982">1982</option>
                <option value="1981">1981</option>
                <option value="1980">1980</option>
                <option value="1979">1979</option>
                <option value="1978">1978</option>
                <option value="1977">1977</option>
                <option value="1976">1976</option>
                <option value="1975">1975</option>
                <option value="1974">1974</option>
                <option value="1973">1973</option>
                <option value="1972">1972</option>
                <option value="1971">1971</option>
                <option value="1970">1970</option>
                <option value="1969">1969</option>
                <option value="1968">1968</option>
                <option value="1967">1967</option>
                <option value="1966">1966</option>
                <option value="1965">1965</option>
                <option value="1964">1964</option>
                <option value="1963">1963</option>
                <option value="1962">1962</option>
                <option value="1961">1961</option>
                <option value="1960">1960</option>
                <option value="1959">1959</option>
                <option value="1958">1958</option>
                <option value="1957">1957</option>
                <option value="1956">1956</option>
                <option value="1955">1955</option>
                <option value="1954">1954</option>
                <option value="1953">1953</option>
                <option value="1952">1952</option>
                <option value="1951">1951</option>
                <option value="1950">1950</option>
                <option value="1949">1949</option>
                <option value="1948">1948</option>
                <option value="1947">1947</option>
                <option value="1946">1946</option>
                <option value="1945">1945</option>
                <option value="1944">1944</option>
                <option value="1943">1943</option>
                <option value="1942">1942</option>
                <option value="1941">1941</option>
                <option value="1940">1940</option>
            </select>
			<?php if($_POST["exist"] == "1") { ?><i class="fa fa-exclamation-triangle" style="color:#FF0004;"> Må fylles ut!</i><?php } ?>
            <br><br>

            Server:<br>
            <select name="server" size="1" required>
              <option value="-1">Velg server...</option>



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

				$sql = "SELECT * FROM `serverlist` WHERE `wl-open` = '1' ORDER BY `Order` ASC";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {

						//now check if user is already whitelisted on this server...
						$sql54 = "SELECT * FROM `global_whitelist` WHERE `IGN` = '".$_POST["fullname"]."' AND `ServerID` = '".$row["Server_ID"]."'";
						$result54 = $conn->query($sql54);

						if ($result54->num_rows > 0) {
							// output data of each row
							while($row54 = $result54->fetch_assoc()) {

						?>
						<option value="<?php echo $row["Shortdesc"]; ?>" disabled><?php echo $row["Shortdesc"]; ?></option>
                        <?php

							}
						} else { ?>
							<option value="<?php echo $row["Shortdesc"]; ?>"><?php echo $row["Shortdesc"]; ?></option>
                            <?php
						}

					}
				}
				?>



            </select>
            <?php if($_POST["exist"] == "1") { ?><i class="fa fa-exclamation-triangle" style="color:#FF0004;"> Må fylles ut!</i><?php } ?>
            <br><br>
            <br>
            <br>
            <br>






            Du har allerede whitelist på følgende servere: <br>
            <i style="font-size: 13px;">
            <?php
    		try { $DBH = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME, DB_USER, DB_PASS); }
			catch(PDOException $e) { echo $e->getMessage(); }

			$stmt33 = $DBH->prepare("SELECT * FROM global_whitelist
			WHERE IGN = :ign"); //query
			$stmt33->bindParam(':ign', $_POST["fullname"]);
			$stmt33->execute(); //execute
			$stmt33->setFetchMode(PDO::FETCH_ASSOC);
			$rows_affected33 = $stmt33->rowCount();

			if($rows_affected33 == 0) { echo "ingen."; }

			while($row = $stmt33->fetch()) {
				//echo "<".$row['ServerID']."> <br>";

				$stmt44 = $DBH->prepare("SELECT * FROM serverlist
				WHERE Server_ID = :ign"); //query
				$stmt44->bindParam(':ign', $row['ServerID']);
				$stmt44->execute(); //execute
				$stmt44->setFetchMode(PDO::FETCH_ASSOC);

				while($row44 = $stmt44->fetch()) {
					echo "<".$row44['Shortdesc']."> <br>";
				}

			}
			?>
            </i>











            <br>
            <br>
            Litt om deg selv og hvorfor du vil joine valgt server:<br>
    		<textarea cols="50" rows="4" name="text" placeholder="Fordi jeg bare vil..."><?php echo $_POST["text"]; ?></textarea><br><br>
<?php } ?>
            <input type="hidden" name="exist" value="1">
            <?php
            if($_POST["fullname"] != "" && getimagesize($imageURL) !== false) {
			?>
            <input type="hidden" name="rq" value="9">
            <input type="submit" value="Send Søknad!">
            <?php
			} else {
			?>
            <input type="submit" value="Verifiser mitt Minecraft Navn...">
            <?php } ?>
        </fieldset>
    </form>
    <br>
    Du vil få bekreftelse på din email når vi har mottat din søknad. <b style="color:red;font-size:22px;">Vennligst sjekk 'SPAM' foldern!</b><br>
    Innen 48 timer <i>(somregel)</i> får du svar på din søknad. Svar sendes pr email så vennligst fyll ut dette ordentlig.
    <?php }
else if($_POST["fullname"] != "" && $_POST["email"] != "" && $_POST["dd"] != "-1" && $_POST["mm"] != "-1" && $_POST["yyyy"] != "-1" && $_POST["server"] != "-1" && $_POST["text"] != "" && $_POST["rq"] == "9") { ?>

	<?php if(isset($_POST["exist"]) && isset($_POST["rq"])) { ?>

    <?php //send søknad nå! all data verifisert, til en viss grad vertfall...

	//først sjekk om '$fulltnavn' allerede har en søknad under '$server'
	//deretter put søknaden i DB...
	try { $DBH = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME, DB_USER, DB_PASS); }
	catch(PDOException $e) { echo $e->getMessage(); }

	$statusid = 0;
	$stmt = $DBH->prepare("SELECT * FROM whitelist_applications
	WHERE Status = :status AND MC_Name = :mcname"); //query
	$stmt->bindParam(':status', $statusid);
	$stmt->bindParam(':mcname', $_POST["fullname"]);
	$stmt->execute(); //execute
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$rows_affected = $stmt->rowCount();

	//crafatar no longer supports username, must convert username -> uuid then ask crafater with uuid!
	$json = file_get_contents("https://api.mojang.com/users/profiles/minecraft/".$_POST["fullname"]);
	$obj = json_decode($json);
	$uuid = $obj->{'id'};
	$imageURL = "https://crafatar.com/renders/body/".$uuid;
	
	//$imageURL = "https://crafatar.com/renders/body/".$uuid;
	if(getimagesize($imageURL) == false) { die("error #420BlazeIt"); }

	if($rows_affected > 0) { //if higher then 0 = 1 or more user has a unread or unhandled whitelist application.
		die("<div align='center' style='color:red;'>Du har allerede en eller flere ubehandlede søknader, Behandlingstid pr søknad er 24-48 timer.</div>");
	}
	else {
		//no "active/unread" applications found, submit a new one. verify submit and send email to whitelist@byggeklosser.net AND $email to user that we have recieved application.

		$datefull = $_POST["yyyy"].$_POST["mm"].$_POST["dd"];

		$stmt_p2 = $DBH->prepare("INSERT INTO whitelist_applications (MC_Name, Email, Textform, Server, Date, IP) VALUES (:mcname, :email, :text, :server, :date, :IP)"); //query
		$stmt_p2->bindParam(':mcname', $_POST["fullname"]);
		$stmt_p2->bindParam(':email', $_POST["email"]);
		$stmt_p2->bindParam(':date', $datefull);
		$stmt_p2->bindParam(':server', $_POST["server"]);
		$stmt_p2->bindParam(':text', $_POST["text"]);

		$theip = $_SERVER["REMOTE_ADDR"];

		if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
			$theip .= '('.$_SERVER["HTTP_X_FORWARDED_FOR"].')';
		}

		if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
			$theip .= '('.$_SERVER["HTTP_CLIENT_IP"].')';
		}

		$realip = substr($theip, 0, 250);

		$stmt_p2->bindParam(':IP', $realip); //should be real IP
		$stmt_p2->execute(); //execute

		$rows_affected = $stmt_p2->rowCount();

		if($rows_affected > 0){ //SWEET!

			$to = $_POST["email"]; //send mail til søker
			$subject = "Byggeklosser.net Whitelist Søknad Mottat!";
			$txt = "Hei ".$_POST["fullname"].", Vi har nå mottat din søknad om whitelist. Du vil motta en ny mail når søknaden har blitt behandlet, Normal behandlingstid er 24-48 timer.";
			$headers = "From: noreply@byggeklosser.net" . "\r\n" .
"Content-Type: text/html; charset=UTF-8";
			mail($to,$subject,$txt,$headers);

			$to = "whitelist@byggeklosser.net"; //send mail til BK konto om ny søknad mottat.
			$subject = "Ny whitelist søknad mottat! Fra: ".$_POST["fullname"];
			$txt = "Ny whitelist søknad mottat, vennligst behandle denne snarest på http://www.byggeklosser.net/minepanel/whitelist";
			$headers = "From: noreply@byggeklosser.net" . "\r\n" .
"Content-Type: text/html; charset=UTF-8";
			mail($to,$subject,$txt,$headers);

			?><script>window.location = "/whitelistapply/submit";</script><?php
		}
		else { die("<div align='center' style='color:red;'>error 64 stack it :/</div>"); }
	}
	} ?>
<?php } else { echo "error 303"; } ?>
</div>
