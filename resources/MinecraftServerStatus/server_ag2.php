<?php

	include_once 'status.class.php';
	$status = new MinecraftServerStatus();
	$response = $status->getStatus('mc.byggeklosser.net', 20000);
	if(!$response) {
		?>
      
      <div class="server_container">
    	<div class="icon"><img src="/resources/img/ag2.png" height="60px"></div>
    	<div class="name">Agrarian Skies 2 - 1.1.13</div>
        <div class="status"><img src="/resources/img/offline.png"></div>
        <div class="desc">
      		<div class="descinner"><b>Whitelist</b>: Ja <i>(<a href="/whitelist">Søk Her</a>)</i>.</div>
      
      		<div class="ip">mc.byggeklosser.net:20000</div>
		</div>
    </div>
	
	<?php } else { ?>
      
<div class="server_container">
	<div class="icon"><img src="/resources/img/ag2.png" height="60px"></div>
	<div class="name">Agrarian Skies 2 - 1.1.13</div>
	<div class="status"><?php echo $response['players']; ?> / <?php echo $response['maxplayers']; ?> 
    	<img src="/resources/img/online.png"></div>
	<div class="desc">
      <div class="descinner"><b>Whitelist</b>: Ja <i>(<a href="/whitelist">Søk Her</a>)</i>.</div>
      
      <div class="ip">mc.byggeklosser.net:20000</div>
	</div>
</div>
<?php
	}

?>