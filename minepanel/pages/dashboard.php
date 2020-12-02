<script>document.getElementById('nav_mp_dashboard').setAttribute('class', 'active');</script>

<?php
$string1 = "null";
$string2 = "null";
$string3 = "null";

$string4 = "null";
$string5 = "null";
$string6 = "null";
$string7 = "null";

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

//antall servere
$sql = "SELECT * FROM serverlist";
$result = $conn->query($sql);
	$string1 = $result->num_rows;

//servere med whitelist
$sql = "SELECT * FROM serverlist WHERE Whitelist = 'Ja'";
$result = $conn->query($sql);
	$string2 = $result->num_rows;

//servere med åpen whitelist
$sql = "SELECT * FROM `serverlist` WHERE `wl-open` = '1'";
$result = $conn->query($sql);
	$string3 = $result->num_rows;




//antall søknader
$sql = "SELECT * FROM `whitelist_applications`";
$result = $conn->query($sql);
	$string4 = $result->num_rows;
	
//ubehandlede søknader
$sql = "SELECT * FROM `whitelist_applications` WHERE `Status` = '0'";
$result = $conn->query($sql);
	$string5 = $result->num_rows;
	
//avviste
$sql = "SELECT * FROM `whitelist_applications` WHERE `Status` = '-1'";
$result = $conn->query($sql);
	$string6 = $result->num_rows;
	
//godkjente
$sql = "SELECT * FROM `whitelist_applications` WHERE `Status` = '1'";
$result = $conn->query($sql);
	$string7 = $result->num_rows;

?>

<style>
.link {
	padding: 20px;
	color: #FFF;
	margin-left: 20px;
	margin-right: 20px;
	border-radius: 10px;
	text-align:center;
}
.red { background-color: red; }
.warnings { display: none; }
</style>

<div id="mainwrapper">
	<div id="news">MinePanel Dashboard</div>
    
    <br>
    <div style="min-height:60px;">
    	<div class="warnings link red">Det er en eller flere ubehandlede whitelist søknader!</div>
    </div>

	<br><b>Servere</b>
    	<div style="padding-left: 20px;">
        Antall Servere: <?php echo $string1; ?>
        <br>Servere med whitelist: <?php echo $string2; ?>
        <br>Servere som folk kan søke om whitelist: <?php echo $string3; ?>
        </div>
    
    <br><b>Whitelist</b>
    	<div style="padding-left: 20px;">
        Antall søknader: <?php echo $string4; ?>
        <br>Ubehandlede søknader: <?php echo $string5; ?>
        <br>Søknader som er avvist: <?php echo $string6; ?>
        <br>Søknader som er godkjent: <?php echo $string7; ?>
        </div>
        
    <div id="news">Nye servere info</div>
    <br>
    link til google doc: 
    <a href="https://docs.google.com/spreadsheets/d/1E9dP6uRiIVYodxQ6XJsyiBHtXNoZ_wyVmFvMYj664GM/edit#gid=1416684270" target="_blank">trykk her</a>
    <br>
    <b>Mods ligger på //filserver under "Forge Mods"</b>
    <br><br>
    <b>Setup</b> for nye servere:<br>
    1. legg til 2 mods & configen for de. -> 
    	<a href="https://mods.curse.com/mc-mods/minecraft/245288-discordintegration" target="_blank">DiscordIntegration</a> -> 
        <a href="https://mods.curse.com/mc-mods/minecraft/224493-whitelister" target="_blank">Whitelister</a><br>
    2. fix config for Whitelister -> endre på linken / add server ID.<br>
    3. fix config for DiscordIntegration -> endre på channelID.<br>
    4. skru på autorestart ~ 6timer.<br>
    5. worldborder 5000 radius/blocks.<br>
    6. legg til server-icon.png i server root, ligger under //filserver.<br>
    7. sett opp <b>server.properties</b>, port, motd, whitelist: false <b style="color:red;">(VIKTIG, vi bruker mod)</b>, allow-flight: true.<br>
    
</div>
<?php
if($string5 >= 1) {
?>
		<script>
		setTimeout(function() {
			$('.warnings').slideDown(800);
		}, 1000); // <-- time in milliseconds
		</script>
<?php
}
?>