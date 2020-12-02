<script>document.getElementById('nav_mp_servers').setAttribute('class', 'active');</script>

<style>
#mainwrapper {
	max-width: none !important;
	width: 95% !important;
}
</style>

<div id="mainwrapper">
	<div id="news">MinePanel Servers</div>
	<br>
    <div style="text-align:center;"><a href="/minepanel/newserver/">Legg til ny server...</a></div>
    
    <table id="table_id" class="display">
    <thead>
        <tr>
        	<th>ID</th>
            <th>Server_ID</th>
            <th>Order</th>
            <th>IP</th>
            <th>Nice-IP</th>
            <th>Port</th>
            <th>Shortdesc</th>
            <th>Longdesc</th>
            <th>MCVersion</th>
            <th>Modpack</th>
            <th>Modpack-ver</th>
            <th>Hide</th>
            <th>Icon</th>
            <th>Whitelist</th>
            <th>wl-open</th>
            <th>Whitelist-URL</th>
            <th>Modify</th>
            <th>Remove</th>
        </tr>
    </thead>
    <tbody>
        
	<?php 
    
	//Mysql connect...
   	$servername = "byggeklosser.mysql.domeneshop.no";
	$username = "byggeklosser";
	$password = "Y7TMEq8m";
	$dbname = "byggeklosser";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	$sql = "SELECT * FROM serverlist";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			?>
            
        <tr>
        	<td><?php echo $row["ID"]; ?></td>
            <td><?php echo $row["Server_ID"]; ?></td>
            <td><?php echo $row["Order"]; ?></td>
            <td><?php echo $row["IP"]; ?></td>
            <td><?php echo $row["Nice-IP"]; ?></td>
            <td><?php echo $row["Port"]; ?></td>
            <td><?php echo $row["Shortdesc"]; ?></td>
            <td><?php echo $row["Longdesc"]; ?></td>
            <td><?php echo $row["MCVersion"]; ?></td>
            <td><?php echo $row["Modpack"]; ?></td>
            <td><?php echo $row["Modpack-version"]; ?></td>
            <td><?php echo $row["HideFromServerlist"]; ?></td>
            <td><?php echo $row["Icon"]; ?></td>
            <td><?php echo $row["Whitelist"]; ?></td>
            <td><?php echo $row["wl-open"]; ?></td>
            <td style="color:green;"><a href="/whitelist/?server=<?php echo $row["Server_ID"]; ?>"><b>[URL]</b></a></td>
            <td style="color:orange;"><a href="/minepanel/editserver/<?php echo $row["ID"]; ?>"><b>[EDIT]</b></a></td>
            <td style="color:red;"><a href="/minepanel/delserver/<?php echo $row["ID"]; ?>"><b>[DELETE]</b></a></td>
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