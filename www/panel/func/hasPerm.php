<?php
	function hasPermission( $string ){
		
  		include ('../config/mysql.php');
  		
		$sql = "SELECT * FROM users WHERE nick='".$_SESSION['nickname']."' LIMIT 1";
			
		$result = $conn->query($sql);
  		
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				if($row['permissions'] == "all") return true;
				return false;
			}
		}else{
			return false;
		}
	}	
?>