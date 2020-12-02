<?php

	include_once 'status.class.php';
	$status = new MinecraftServerStatus();
	$response = $status->getStatus('mc.byggeklosser.net', 30000);
	if(!$response) {
		?>
      
      <div class="server_container">
    	<div class="icon"><img src="/resources/img/FTB_infinity.png" height="60px"></div>
    	<div class="name">FTB Infinity Evolved - 2.4.2 <b style="color:#FF2327;">(VIP) (EXPERT)</b></div>
        <div class="status"><img src="/resources/img/offline.png"></div>
        <div class="desc">
      <div class="descinner"><b>Whitelist</b>: Ja (<u>kun invites</u>)</div>
      
      <div class="ip">mc.byggeklosser.net:30000</div>
	</div>
    </div>
	
	<?php } else { ?>
      
<div class="server_container">
	<div class="icon"><img src="/resources/img/FTB_infinity.png" height="60px"></div>
	<div class="name">FTB Infinity Evolved - 2.4.2 <b style="color:#FF2327;">(VIP) (EXPERT)</b></div>
	<div class="status"><?php echo $response['players']; ?> / <?php echo $response['maxplayers']; ?> 
    	<img src="/resources/img/online.png"></div>
	<div class="desc">
      <div class="descinner"><b>Whitelist</b>: Ja (<u>kun invites</u>)</div>
      <div class="ip">mc.byggeklosser.net:30000</div>
	</div>
</div>
<?php
	}

?>