<?php 


/**
 * 
 */
class Config
{
	
	public function connection()
	{
		$host = 'localhost';
		$user = 'root';
		$pass = '';
		$db = 'blog';
		$link = mysqli_connect($host,$user,$pass,$db);
		
		if (!$link) {
			echo '<h2>Connect Database failed</h2>';
			exit();
		}
		return $link;
	}
}

?>