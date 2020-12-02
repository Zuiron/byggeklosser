<style>
.server_container {
	border: 1px solid #E4E4E4;
	padding: 5px;
	border-radius:5px;
	
	/*min-height:60px;*/
	position:relative;
	
	max-width: 700px;
    margin: 13px auto;
}

.server_container .desc .descinner {
	margin-left:50px;
}

.server_container div {
	display:inline-block;
}

.server_container .icon {
	position:absolute;
	height:38px;
	width:38px;
}

.server_container .name {
	font-size:16px;
	
	position:relative;
	top: -14px;
    left: 65px;
	
	letter-spacing:2px;
	
	background-color:#FFF;
	/*border:2px solid #D8D8D8;*/
	border-radius:5px;
	/*padding: 5px;*/
	
	max-width: 80%;
}

.icon img {
	width:auto;
	height:inherit;
	border-radius: 5px;
}

.server_container .status {
	/*min-width: 100%;
    text-align: right;*/
	float:right;
}

.server_container .desc {
	font-size:13px;
}

.server_container .desc a {
	text-decoration:none;
	color: #FF8300;
}
.server_container .desc a:hover {
	text-decoration:underline;
}

.server_container .ip {
	/*right: 4px;
    position: absolute;
    bottom: 3px;*/
	position: static;
    float: right;
	font-style:italic;
}

.container_special {
	/* asd */
	max-width: 45%;
    min-width: 45%;
}

</style>

<?php

	include_once 'status.class.php';
	$status = new MinecraftServerStatus();
	$response = $status->getStatus('mc.byggeklosser.net');
	if(!$response) {
		?>
      
      <div class="server_container" style="clear:both;">
    	<div class="icon"><img src="/resources/img/vanilla.png" height="60px"></div>
    	<div class="name">Vanilla</div>
        <div class="status"><img src="/resources/img/offline.png"></div>
        <div class="desc">
      		<div class="descinner"><b>Whitelist</b>: Nei <i>(Åpen for alle!)</i>.</div>
      
      		<div class="ip">mc.byggeklosser.net <a title="Kopier" onclick="myFunction()" class="js-copy-1-btn bkclipboard"><i class="fa fa-clipboard"></i></a></div>
		</div>
    </div>
	
	<?php } else { ?>
      
<div class="server_container" style="clear:both;">
	<div class="icon"><img src="/resources/img/vanilla.png" height="60px"></div>
	<div class="name">Vanilla <?php echo $response['motd']; ?></div>
	<div class="status"><?php echo $response['players']; ?> / <?php echo $response['maxplayers']; ?> 
    	<img src="/resources/img/online.png"></div>
	<div class="desc">
      <div class="descinner"><b>Whitelist</b>: Nei <i>(Åpen for alle!)</i>.</div>
      
      <div class="ip">mc.byggeklosser.net</div>
	</div>
</div>
<?php
	}

?>