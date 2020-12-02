<div id="mainwrapper">
	<div id="news">MinePanel Redigerer Server Whitelist</div>
	<?php
	//Mysql connect...
   	$servername = "byggeklosser.mysql.domeneshop.no";
	$username = "byggeklosser";
	$password = "Y7TMEq8m";
	$dbname = "byggeklosser";
	$srv;
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	$sql2 = "SELECT * FROM serverlist WHERE Server_ID = ".$url_path[1];
	$result2 = $conn->query($sql2);
	
	if ($result2->num_rows > 0) {
		// output data of each row
		while($row2 = $result2->fetch_assoc()) {
			$srv = $row2["Shortdesc"];
		}
	}
	?>
	<div style="text-align:center;">redigerer server whitelist for server<br> <b style="font-size:22px;"><?php echo $srv; ?></b></div>
    
    
    <br><br>
    
    <style>
		.actions {
			padding: 10px;
			text-align: center;
			color: #fff;
			text-shadow: 1px 1px 0px #000;
			border-radius: 10px;
			box-shadow: 0px 1px 5px #000;
		}
		#ok {
			display: block;
			background-color:green;
		}
	</style>
    <div style="min-height:50px;">
    <?php
    
	if($url_path[2] == "delentry" && isset($url_path[3])) {
		$entryid = $url_path[3];
		
		// sql to delete a record
		$sql = "DELETE FROM global_whitelist WHERE ID=".$entryid;
	
		if ($conn->query($sql) === TRUE) { ?>
			
            <div id="ok" class="actions">whitelist fjernet!</div>
            
            <?php
		} else {
			echo "Error deleting record 530: " . $conn->error;
		}
	}
    
    ?>
    </div>
    	<script>
		setTimeout(function() {
			$('.actions').slideUp(800);
		}, 8000); // <-- time in milliseconds
		</script>
    
    
    
    <table id="table_id" class="display">
    <thead>
        <tr>
        	<th>ID</th>
            <th>IGN</th>
            <th>ServerID</th>
            <th>Redigere</th>
        </tr>
    </thead>
    <tbody>
    
    <?php 
	
	$sql = "SELECT * FROM global_whitelist WHERE ServerID = ".$url_path[1];
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			?>
            
        <tr>
        	<td><?php echo $row["ID"]; ?></td>
            <td><?php echo $row["IGN"]; ?></td>
            <td><?php echo $row["ServerID"]; ?></td>
            <td style="color:red;" align="right"><a href="/minepanel/removewhitelistentry/<?php echo $row["ID"]; ?>/<?php echo $srv; ?>"><b>[DELETE]</b></a></td>
        </tr>
            
            <br><br>
            
            <?php
		}
	} else {
		//echo "0 results";
	}
	$conn->close();
	
    ?>
    
    </tbody>
</table>

<script>

$(document).ready(function() {
    $('#table_id').DataTable( {
        "order": [[ 1, "asc" ]]
    } );
} );
</script>
    
</div>
    