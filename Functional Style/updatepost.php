<?php require_once "php/auth.php" ?>
<?php require_once "fragments/header.php" ?>

		


	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="nav mt-5 d-flex justify-content-between">
					<div>Welcome</div>
					<div>

						<?php 

							if(isset($_POST['LOT_BTN'])){
								echo logout();
							}

						?>
						<form href="" method="post">
							<button class="border-0 btn-secondary" name="LOT_BTN">Logout</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="post-form p-5">

					<?php 	

							$post=postDetail($_GET['id']);

							if(isset($_POST['UPD_BTN'])){
								echo update($_POST['id']);
							}

						?>
					<form action="" method="post" enctype="multipart/form-data">


						<input type="" value="<?php echo $post['id'] ?>" hidden name="id"> </input>

						<input type="" value="<?php echo $post['image_uniqid_id'] ?>" hidden name="image_uniqid_id"> </input>
						
						<div class="form-group">
							<label for="title">Title</label>
							<input class="form-control" value="<?php echo $post['title'] ?>" id="title" name="title"></input>
						</div>
						<div class="form-group">
							<label for="description">Description</label>
							<input class="form-control" id="description" value="<?php echo $post['description'] ?>" name="description"></input>
						</div>
						<div class="form-group">
							<label for="cover">Cover</label>
							<input type="file" class="form-control"  id="cover" name="cover"></input>
						</div>
						<div class="form-group">
							<label for="images">Images</label>
							<input type="file" class="form-control"  id="images" name="images[]" multiple></input>
						</div>
						<button class="btn btn-secondary" name="UPD_BTN">Post</button>
				   </form>
				</div>
			</div>

			<div class="col-8">
				<?php

					$images=showImages($_GET['imageid']);

					if(isset($_POST['DEL_BTN'])){

						if(delImage($_POST['imgid'])){

							$id=$_GET['id'];
							$imageid=$_GET['imageid'];
		                   return header("location:updatepost.php?id=$id && imageid=$imageid");

						}


					}

				?>
				<div class="img-container">
						
					<?php

						foreach ($images as $key => $img) {
								


					?>

						<form href="" method="post">

							<input type="" value="<?php echo $img['id'] ?>" hidden name="imgid">
							<img class="images" src="assets/images/<?php echo $img['name'] ?> ">

							<button name="DEL_BTN" class="btn btn-danger border-circle mt-2">D</button>

						</form>


					<?php

						}

					?>

				</div>
			</div>
		</div>
	</div>

<?php require_once "fragments/footer.php" ?>
