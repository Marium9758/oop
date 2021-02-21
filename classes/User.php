
<?php 


/**
 * 
 */
class User extends Config
{
	
	public function register_user($data)
	{
		
		$con = $this->connection();
		$sql="INSERT INTO users(name,email,password) values('$data[name]','$data[email]',md5($data[password]))";
		if (mysqli_query($con,$sql)) {
			return true;
		}
		else{
			die('query not correct'.mysqli_error($con));
		}
	}


	public function get_all_users()
	{
		
		$con = $this->connection();
		$sql="SELECT * FROM users";
		if (mysqli_query($con,$sql)) {
			$result = mysqli_query($con,$sql);
			return $result;
		}
		else{
			die('query not correct'.mysqli_error($con));
		}
	}

	public function get_user_details($id){
		$con = $this->connection();
		$sql="SELECT * FROM users WHERE id = $id";
		if (mysqli_query($con,$sql)) {
			$result = mysqli_query($con,$sql);
			$result = mysqli_fetch_assoc($result);
			return $result;
		}
		else{
			die('query not correct'.mysqli_error($con));
		}
	}

	public function update_user($id){
		$con = $this->connection();
		$sql="UPDATE users SET name = '$_POST[name]', email = '$_POST[email]' WHERE id = $id";
		if (mysqli_query($con,$sql)) {
			return true;
		}
		else{
			die('query not correct'.mysqli_error($con));
		}
	}
	
	public function delete_user($id){
		$con = $this->connection();
		$sql="DELETE FROM users WHERE id = $id";
		if (mysqli_query($con,$sql)) {
			return true;
		}
		else{
			die('query not correct'.mysqli_error($con));
		}
	}

	public function view_all_users()
	{
		$connection = $this->connection();

		$sql = 'SELECT * FROM users';
		$result = mysqli_query($connection,$sql);

		return $result;

	}

	function search_data($search_item){
		$link = $this->connection();
		$sql  = "SELECT * FROM users WHERE (name LIKE '%$search_item%') OR (email LIKE '%$search_item%') AND  status != 0 ORDER BY id DESC";
		if (mysqli_query($link,$sql)) {
			$result=mysqli_query($link,$sql);
			return $result;
		}
		else{
			die('Query not correct'.mysqli_error($link));
		}
	}
	
}

 ?>