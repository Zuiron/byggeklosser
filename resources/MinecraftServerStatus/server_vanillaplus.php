<?php

	include_once 'status.class.php';
	$status = new MinecraftServerStatus();
	$response = $status->getStatus('mc.byggeklosser.net', 30000);
	if(!$response) {
		?>
      
      <div class="server_container">
    	<div class="icon"><img src="/resources/img/vanillaplus.png" height="60px"></div>
    	<div class="name">Vanilla+ 1.7.10</div>
        <div class="status"><img src="/resources/img/offline.png"></div>
        <div class="desc">
      		<div class="descinner"><b>Whitelist</b>: Ja <i>(søk på facebook sidene våres!)</i>.</div>
      
      		<div class="ip">mc.byggeklosser.net:30000 <a title="Kopier" onclick="myFunction()" class="js-copy-2-btn bkclipboard"><i class="fa fa-clipboard"></i></a></div>
		</div>
    </div>
	
	<?php } else { ?>
      
<div class="server_container">
	<div class="icon"><img src="/resources/img/vanillaplus.png" height="60px"></div>
	<div class="name">Vanilla+ <?php echo $response['motd']; ?></div>
	<div class="status"><?php echo $response['players']; ?> / <?php echo $response['maxplayers']; ?> 
    	<img src="/resources/img/online.png"></div>
	<div class="desc">
      <div class="descinner"><b>Whitelist</b>: Ja <i>(søk på facebook sidene våres!)</i>.</div>
      
      <div class="ip">mc.byggeklosser.net:30000</div>
	</div>
</div>
<?php
	}

?>