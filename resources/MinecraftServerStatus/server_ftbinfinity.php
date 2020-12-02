<?php

	include_once 'status.class.php';
	$status = new MinecraftServerStatus();
	$response = $status->getStatus('mc.byggeklosser.net', 40009);
	if(!$response) {
		?>
      
      <div class="server_container">
    	<div class="icon"><img src="/resources/img/FTB_infinity.png" height="60px"></div>
    	<div class="name">FTB Infinity Evolved - 2.0.2 <b style="color:#59CD37;">(EASY)</b></div>
        <div class="status"><img src="/resources/img/offline.png"></div>
        <div class="desc">
      <div class="descinner"><b>Whitelist</b>: Ja (<a href="/whitelist">Søk Her</a>) | <a href="http://mc.byggeklosser.net:40010/" target="new"><i class="fa fa-globe fa-lg"></i> Kart</a> | Custom <a href="http://www.curse.com/mc-mods/minecraft/228356-alternate-terrain-generation/2231153" target="new">ATG</a>.</div>
      
      <div class="ip">mc.byggeklosser.net:40009</div>
	</div>
    </div>
	
	<?php } else { ?>
      
<div class="server_container">
	<div class="icon"><img src="/resources/img/FTB_infinity.png" height="60px"></div>
	<div class="name">FTB Infinity Evolved - 2.0.2 <b style="color:#59CD37;">(EASY)</b></div>
	<div class="status"><?php echo $response['players']; ?> / <?php echo $response['maxplayers']; ?> 
    	<img src="/resources/img/online.png"></div>
	<div class="desc">
      <div class="descinner"><b>Whitelist</b>: Ja (<a href="/whitelist">Søk Her</a>) | <a href="http://mc.byggeklosser.net:40010/" target="new"><i class="fa fa-globe fa-lg"></i> Kart</a> | Custom <a href="http://www.curse.com/mc-mods/minecraft/228356-alternate-terrain-generation/2231153" target="new">ATG</a>.</div>
      
      <div class="ip">mc.byggeklosser.net:40009</div>
	</div>
</div>
<?php
	}

?>