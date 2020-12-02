<?php

	include_once 'status.class.php';
	$status = new MinecraftServerStatus();
	$response = $status->getStatus('mc.byggeklosser.net', 9999);
	if(!$response) {
		?>
      
      <div class="server_container">
    	<div class="icon"><img src="/resources/img/FTB_infinity.png" height="60px"></div>
    	<div class="name">FTB Infinity Evolved <b style="color:#59CD37;">(PUBLIC)</b></div>
        <div class="status"><img src="/resources/img/offline.png"></div>
        <div class="desc">
      <div class="descinner"><b>Whitelist</b>: Ja (<a href="/whitelist">Søk Her</a>)</div>
      
      <div class="ip">mc.byggeklosser.net:???</div>
	</div>
    </div>
	
	<?php } else { ?>
      
<div class="server_container">
	<div class="icon"><img src="/resources/img/FTB_infinity.png" height="60px"></div>
	<div class="name">FTB Infinity Evolved <b style="color:#59CD37;">(PUBLIC)</b></div>
	<div class="status"><?php echo $response['players']; ?> / <?php echo $response['maxplayers']; ?> 
    	<img src="/resources/img/online.png"></div>
	<div class="desc">
      <div class="descinner"><b>Whitelist</b>: Ja (<a href="/whitelist">Søk Her</a>)</div>
      <div class="ip">mc.byggeklosser.net:???</div>
	</div>
</div>
<?php
	}

?>