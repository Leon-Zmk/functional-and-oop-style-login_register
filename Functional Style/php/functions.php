<?php


// normal functions //
	function runQuery($sql){
		 
		  if(mysqli_query(con(),$sql)){
		  	 return 1;
		  }else{
		  	return 0;
		  }
	}

	function moveImages($name,$key ,$imgtmparr,$imageid){

		$newName=uniqid().$name;
  	    	move_uploaded_file($imgtmparr[$key],"assets/images/".$newName);

  	    	$sql="INSERT INTO images (name,image_uniqid_id) VALUES ('$newName','$imageid')";

  	    	runQuery($sql);

	}
// end normal functions //


// validations functions//

		
	function if_acc_exist($name="",$email=""){


			$sql="SELECT * FROM users";
			$execute=mysqli_query(con(),$sql);
			$num_row=mysqli_num_rows($execute);

			if($num_row){
				while ($row=mysqli_fetch_assoc($execute)) {

					
					
					if(in_array($name, $row)){

							echo "User Name already Taken";

							return 0;

					}elseif (in_array($email, $row)) {
							
							echo "Already Have a account";

							return 0;
					}else{

						return 1;
					}

			}
		}else{

			return 1;

		}


	}


// end validations functions //



// auth //

	function register(){

		$name=$_POST['name'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$password=password_hash($password, PASSWORD_DEFAULT);

			// Validations	//

		
				if(if_acc_exist($name,$email) == 0){

						return;

				}

			//  End Validations //

		$sql="INSERT INTO users (name,email,pass) VALUES ('$name','$email','$password')";

		 if(runQuery($sql)){

		 		echo "Success";

		 }else{

		 		echo "Error";
		 };


		return header("location:login.php");

}

	
   function sessionSet($user){

   	     session_start();
   		 $_SESSION['user']=$user;

   }

  function login(){

	  	$email=$_POST['email'];
	  	$password=$_POST['password'];

	  	$sql="SELECT * FROM users WHERE email='$email'";
	  	$execute=mysqli_query(con(),$sql);
	  	$user=mysqli_fetch_assoc($execute);

	  	if($user){
	  		$userPass=$user['pass'];

	  	if(password_verify($password,$userPass)){
	  		
	  		sessionSet($user);
	  		return header("location:post.php");
	  	}
	  	else{
	  		echo "no";
	  	}
	  }else{

	  		echo "There is no account with this email";

	  }
  }


  function logout(){

  		if(session_destroy()){

  			return header("location:login.php");

  		}

  }


// end auth//




// post //



  function post(){

  		$title=$_POST['title'];
  		$description=$_POST['description'];
  		$cover=$_FILES['cover'];
  		$covertmp=$_FILES['cover']['tmp_name'];
        $covername=$_FILES['cover']['name'];
  		$image_uniqid_id=$_POST['image_uniqid_id'];
  		$images=$_FILES['images'];
  		$imgtmparr=$_FILES['images']['tmp_name'];
  		$imgname=$_FILES['images']['name'];

  		$newcovername=uniqid().$covername;
  		move_uploaded_file($covertmp,"assets/covers/".$newcovername);

  		foreach ($imgname as $key => $name){
  				
  				moveImages($name,$key,$imgtmparr,$image_uniqid_id);

  		}


		$sql="INSERT INTO posts (title,description,cover,image_uniqid_id) VALUES ('$title','$description','$newcovername','$image_uniqid_id')";

		 runQuery($sql);

		 echo "Success";
  }


  function posts(){

  	$sql="SELECT * FROM posts";
  	$execute=mysqli_query(con(),$sql);
  	$posts=[];

  	while($row=mysqli_fetch_assoc($execute)){
  		array_push($posts, $row);
  	}

  	return $posts;


  }


   function postDetail($id){

  		$sql="SELECT * FROM posts WHERE id=$id";
  		$execute=mysqli_query(con(),$sql);
  		$row=mysqli_fetch_assoc($execute);

  		return $row;

  }


  function update($id){

  		$title=$_REQUEST['title'];
  		$description=$_REQUEST['description'];
  		$cover=$_FILES['cover'];
  		$imageuniqidid=$_POST['image_uniqid_id'];
  		$covername=$cover['name'];
  		$covertmpname=$cover['tmp_name'];
  		$images=$_FILES['images'];
  		$imagesnamearr=$images['name'];
  		$imagestmparr=$images['tmp_name'];
  		
  		echo "<pre>";

  		// if has cover //
  		if($covername){
  				
  				$newName=uniqid().$covername;
  				move_uploaded_file($covertmpname,"assets/covers/".$newName);
  					

  				if($covername){
  					$sql="UPDATE posts SET title='$title',description='$description',cover='$newName' WHERE id=$id";
  				}

  		}

  		// end cover //

  		else{

  		  $sql="UPDATE posts SET title='$title',description='$description' WHERE id=$id";

  		}

  		// if has images //

  		if($imagesnamearr[0]){
  			foreach ($imagesnamearr as $key => $name) {
  					
	  				moveImages($name,$key,$imgtmparr,$imageuniqidid);

  			}

  		// end images //


  		}
  		
  		
  		if(runQuery($sql)){
  			echo "Post Updated Successfully";
  		}else{
  			echo "Error";
  		}

  }


  function showImages($imageid){

  		$sql="SELECT * FROM images WHERE image_uniqid_id='$imageid'";
  		$execute=mysqli_query(con(),$sql);
  		$images=[];

  		while($img=mysqli_fetch_assoc($execute)){
  			array_push($images,$img);
  		}

  		return $images;

  }


  function delImage($id){

  		$sql="DELETE FROM images WHERE id=$id";

  		// unlink images

  		$selectSql="SELECT * FROM images WHERE id=$id";
  		$execute=mysqli_query(con(),$selectSql);
  		$image=mysqli_fetch_assoc($execute);

  		unlink("assets/images/".$image['name']);

  		// end unlink

  		// del row

  		if(runQuery($sql)){

  			return 1;
  		}
  		else{
  			return 0;
  		}

  		// end del row
  }	

  function delete(){

  		$id=$_POST['id'];
  		$imageid=$_POST['imageid'];


  		// get cover row

  		$selectSql="SELECT cover FROM posts WHERE id=$id";
  		$execute=mysqli_query(con(),$selectSql);
  		$cover=mysqli_fetch_assoc($execute);

  		// end cover row



  		// row query

  		$sql="DELETE FROM posts WHERE id=$id";

  		// end row query

  		// image del
  		$selectimagessql="SELECT * FROM images WHERE image_uniqid_id='$imageid'";


  		$imagesexecute=mysqli_query(con(),$selectimagessql);

  		while($image=mysqli_fetch_assoc($imagesexecute)){

  			delImage($image['id']);

  		}

  		$imagedelsql="DELETE FROM images WHERE image_uniqid_id='$imageid'";
  		runQuery($imagedelsql);

  		// end image


  		// if has cover delete cover image
  		if(!empty($cover)){
  			if(file_exists("assets/covers/".$cover['cover'])){
  				unlink("assets/covers/".$cover['cover']);
  			}
  		}
  		// end cover

  		// delete row
  		if(runQuery($sql)){
  			return header("location:postlists.php");
  		}else{
  			return 0;
  		}

  		// end delete row

  }

// end post //
