
<?php 

include 'Config.php';
/**
 * 
 */
class User extends Config
{
	
	public function register_user($data)
	{
		print_r($data);
	}

	public function view_all_users()
	{
		$connection = $this->connection();

		$sql = 'SELECT * FROM users';
		$result = mysqli_query($connection,$sql);

		return $result;

	}
	
}

 ?>