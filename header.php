<div id="header">
	<div id="logo"><img src="/resources/img/logo_small.png"></div>
</div>
<div id="header_navbar">
    <ul>
        <a href="/"><li id="nav_hjem"><i class="fa fa-home"></i> Hjem</li></a>
        <a href="/server"><li id="nav_server"><i class="fa fa-server"></i> Servere</li></a>
        <!--<a href="/stream"><li id="nav_stream"><i class="fa fa-twitch"></i> Stream</li></a>
        <a href="/omoss"><li id="nav_omoss"><i class="fa fa-users"></i> Om Oss</li></a>-->
        <a href="/server"><li id="nav_server"><i class="fa fa-comments"></i> Discord</li></a>
        <a href="/whitelistapply"><li id="nav_whitelist"><i class="fa fa-pencil-square-o"></i> Whitelist</li></a>
        
        <a href="/minepanel"><li id="nav_minepanel" style="display:none;"><i class="fa fa-cog"></i> MinePanel</li></a>
    </ul>
</div>

<?php
if($_SERVER['REMOTE_ADDR'] == '88.84.42.69' || $_SERVER['REMOTE_ADDR'] == '95.34.70.254') {
?>
<style>#nav_minepanel { display:inline-block !important; }</style>
<?php
}
?>