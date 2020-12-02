<?php
#ini_set('display_startup_errors',1);
#ini_set('display_errors',1);
#error_reporting(-1);
require_once('config.php');

try { $DBH = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME, DB_USER, DB_PASS); }
catch(PDOException $e) { echo $e->getMessage(); }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title>MinePanel - By Zuiron For Byggeklosser.net</title>
<link rel="stylesheet" href="/resources/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>

</head>
<?php
function parse_path() {
  $path = array();
  if (isset($_SERVER['REQUEST_URI'])) {
    $request_path = explode('?', $_SERVER['REQUEST_URI']);

    $path['base'] = rtrim(dirname($_SERVER['SCRIPT_NAME']), '\/');
    $path['call_utf8'] = substr(urldecode($request_path[0]), strlen($path['base']) + 1);
    $path['call'] = utf8_decode($path['call_utf8']);
    if ($path['call'] == basename($_SERVER['PHP_SELF'])) {
      $path['call'] = '';
    }
    $path['call_parts'] = explode('/', $path['call']);

    $path['query_utf8'] = urldecode($request_path[1]);
    $path['query'] = utf8_decode(urldecode($request_path[1]));
    $vars = explode('&', $path['query']);
    foreach ($vars as $var) {
      $t = explode('=', $var);
      $path['query_vars'][$t[0]] = $t[1];
    }
  }
return $path;
}

$path_info = parse_path();
?>
<body>
<div class="wrapper">
<?php
require_once("../header.php"); //main header
require_once("header.php"); //minepanel header
?>
<script>document.getElementById('nav_minepanel').setAttribute('class', 'active');</script>
<?php
$url_path = $path_info['call_parts'];

if($url_path[0] == "") {
	require_once("pages/dashboard.php");
}
else if($url_path[0] == "whitelist") {
	require_once("pages/whitelist.php");
}
else if($url_path[0] == "servers") {
	require_once("pages/servers.php");
}
else if($url_path[0] == "newserver") {
	require_once("pages/newserver.php");
}
else if($url_path[0] == "deleteserver") {
	require_once("pages/deleteserver.php");
}
else if($url_path[0] == "delserver") {
	require_once("pages/delserver.php");
}
else if($url_path[0] == "editserver") {
	require_once("pages/editserver.php");
}
else if($url_path[0] == "manualwl") {
	require_once("pages/manualwhitelistadd.php");
}
else if($url_path[0] == "editserverwhitelist") {
	require_once("pages/editserverwhitelist.php");
}
else if($url_path[0] == "removewhitelistentry") {
	require_once("pages/removewhitelistentry.php");
}
else {
	require_once("../pages/404.php");
} ?>
<div class="push"></div>
</div>
<?php 
	require_once("../footer.php");
	
	$DBH = null; //end mysql connection
?>
</body>
</html>