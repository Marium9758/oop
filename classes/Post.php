<?php 

/**
 * 
 */
class Post extends Config
{
	
	public function save_post($data){
		$con = $this->connection();
		$sql = "INSERT INTO posts(title,body,author_id,image)values('$data[title]','$data[body]','$data[author_id]','')";
		if (mysqli_query($con,$sql)) {
			return true;
		}
		else{
			die('Query not correct'.mysqli_error($con));
		}
	}

	public function get_all_posts()
	{
		$con = $this->connection();
		$sql = "SELECT * FROM posts";
		if (mysqli_query($con,$sql)) {
			$result = mysqli_query($con,$sql);
			return $result;
		}
		else{
			die('Query not correct'.mysqli_error($con));
		}
	}

	public function get_post_details($id)
	{
		$con = $this->connection();
		$sql = "SELECT * FROM posts WHERE id = $id";
		if (mysqli_query($con,$sql)) {
			$result = mysqli_query($con,$sql);
			$result = mysqli_fetch_assoc($result);
			return $result;
		}
		else{
			die('Query not correct'.mysqli_error($con));
		}
	}
	public function update_post($data){
		$con = $this->connection();
		$sql = "UPDATE  posts SET title = '$data[title]',body='$data[body]',author_id='$data[author_id]',image='' WHERE id = '$data[id]'";
		if (mysqli_query($con,$sql)) {
			return true;
		}
		else{
			die('Query not correct'.mysqli_error($con));
		}
	}

	public function delete_post($id){
		$con = $this->connection();
		$sql = "DELETE FROM posts WHERE id = $id ";
		if (mysqli_query($con,$sql)) {
			return true;
		}
		else{
			die('Query not correct'.mysqli_error($con));
		}
	}
}


 ?>