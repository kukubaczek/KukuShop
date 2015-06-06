<?php
	
	function getServerList(){
		
		include('func/hasPerm.php');
		$perms = "server.list.view";
		if(hasPermission($perms) == false){
			
			echo('
			
			  <div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>  Brak uprawnień!</h3></div>
			  
				<div class="panel-body">
					
					<div class="alert alert-danger" role="alert">
					  Aby mieć dostęp do tej strony musisz posiadać uprawnienie "server.list.view" lub "all".
					</div>
				
				</div>
			</div>
			
			');
		}else{
			
			if(isset($_GET['delete_server']) && $_GET['delete_server'] != ""){
				
				
				include('../config/mysql.php');
				$sql = sprintf("DELETE FROM servers WHERE id=%s",
					@mysql_real_escape_string($_GET['delete_server']));
				
				if (mysqli_query($conn, $sql)) {
					echo('
							
						<div class="alert alert-warning" role="alert">
						  Serwer o ID: '.$_GET['delete_server'].' został pomyślnie usunięty z bazy danych!
						</div>			
					
					
					');
					
					echo('<meta http-equiv="refresh" content="2; url=index.php?page=serverList" />');
				} else {
				    echo "Error deleting record: " . mysqli_error($conn);
				}
			}
		
			echo('
	  <table class="table table-striped">
	    <thead>
	      <tr>
	      	<th>Nr</th>
	        <th>Nazwa</th>
	        <th>ID</th>
	        <th>IP</th>
	        <th>QUERY</th>
	        <th>RCON</th>
	        <th>Hasło RCON</th>
	        <th>Edycja</th>
	      </tr>
	    </thead>
	    <tbody>
	    ');
	    
  		include ('../config/mysql.php');
  		
		$sql = sprintf("SELECT * FROM servers");
			
		$result = $conn->query($sql);
  		
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {

			echo('
			
	      <tr>
	        <td>'.$row['id'].'</td>	      	
	        <td>'.$row['nazwa'].'</td>
	        <td>'.$row['server_id'].'</td>
	        <td>'.$row['ip'].'</td>
	        <td>'.$row['port_query'].'</td>
	        <td>'.$row['port_rcon'].'</td>
	        <td>'.$row['pasw_rcon'].'</td>
	        <td>
	        
				<div class="btn-group" role="group" aria-label="...">
					<a class="btn btn-danger" href="index.php?page=serverList&delete_server='.$row['id'].'">Usuń</a>
				<!--  <form action="index.php?page=serverList&delete_server='.$row['id'].'"><input type="submit" class="btn btn-danger" value="Usuń"></input></form>-->
				  <button type="button" class="btn btn-default">Edytuj</button>
				</div>
	        
	        </td>
	      </tr>
			
			');

			}
		}else{
			echo('Brak serwerów w bazie danych!');
		}
	    
	    echo('
	    </tbody>
	  </table>
			');
			
		}
	}

?>