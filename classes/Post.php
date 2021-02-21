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
			$id = mysqli_insert_id($con);

			$img_name = $_FILES["image"]['name'];
			$source_path = $_FILES["image"]['tmp_name'];
			$img_path = 'assets/public/images/'.$id."_".$img_name;
			$destination_path = '../assets/public/images/'.$id."_".$img_name;
			move_uploaded_file($source_path,$destination_path);

			$sql = "UPDATE posts SET image = '$img_path' WHERE id = $id";
			mysqli_query($con,$sql);
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