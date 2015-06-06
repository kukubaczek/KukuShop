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
		
			echo('
	  <table class="table table-striped">
	    <thead>
	      <tr>
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
	        <td>'.$row['nazwa'].'</td>
	        <td>'.$row['server_id'].'</td>
	        <td>'.$row['ip'].'</td>
	        <td>'.$row['port_query'].'</td>
	        <td>'.$row['port_rcon'].'</td>
	        <td>'.$row['pasw_rcon'].'</td>
	        <td>
	        
				<div class="btn-group" role="group" aria-label="...">
				  <button type="button" class="btn btn-danger">Usuń</button>
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