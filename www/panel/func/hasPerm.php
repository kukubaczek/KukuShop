<?php
	function hasPermission( $string ){
		
  		include ('../config/mysql.php');
  		
		$sql = sprintf("SELECT permissions FROM users WHERE nick='%s' LIMIT 1",
			@mysql_real_escape_string($_SESSION['nickname']));
			
		$result = $conn->query($sql);
  		
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				if($row['permissions'] == "all") return true;
				$pos = strpos($row['permissions'], $string);

				return false;

			}
		}else{
			return false;
		}
	}	
?>