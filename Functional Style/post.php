<?php require_once "php/auth.php" ?>
<?php require_once "fragments/header.php" ?>

		


	<div class="container">
		<div class="row">
			
			<div class="col-4">
				<div class="post-form p-5">

					<?php 

							if(isset($_POST['POST_BTN'])){
								echo post();
							}

						?>
					<form action="" method="post" enctype="multipart/form-data">

						

						<input type="" value="<?php echo uniqid() ?>" hidden name="image_uniqid_id"> </input>
						
						<div class="form-group">
							<label for="title">Title</label>
							<input class="form-control" id="title" name="title"></input>
						</div>
						<div class="form-group">
							<label for="description">Description</label>
							<input class="form-control" id="description" name="description"></input>
						</div>
						<div class="form-group">
							<label for="cover">Cover</label>
							<input type="file" class="form-control" id="cover" name="cover"></input>
						</div>
						<div class="form-group">
							<label for="images">Images</label>
							<input type="file" class="form-control" id="images" name="images[]" multiple></input>
						</div>
						<button class="btn btn-secondary" name="POST_BTN">Post</button>
				   </form>
				</div>
			</div>
		</div>
	</div>

<?php require_once "fragments/footer.php" ?>
