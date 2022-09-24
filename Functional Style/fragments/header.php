<?php require_once "php/connection.php"  ?>
<?php require_once "php/functions.php" ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title>PHP Crud Functional</title>

	<style>
		
		.img-container{

			width: 500px;
			columns: 3 150px;


		}
		.images{

			width: 150px;
			height: 150px;
			margin-top: 10px;

		}

	</style>


</head>
<body>	


<!-- 	// I make a mistake in layout .. well this is about auth and crud so don't mind it -->

	   <div class="col-12">
				<div class="nav mt-5 px-5 d-flex justify-content-between align-items-center">
					<div class="d-flex justify-content-between align-items-center">
						<div class="brand">
							Welcome
						</div>
						<nav class="d-flex ml-5 align-items-center">

							<a href="<?php echo $dynamicurl ?>postlists.php" class="ml-2 btn btn-secondary">Post List</a>
							<a href="<?php echo $dynamicurl ?>post.php" class='ml-2 btn btn-secondary'>Post</a>

						</nav>
					</div>
					<div>

						<?php 

							if(isset($_POST['LOT_BTN'])){
								echo logout();
							}

						?>
						<form href="" method="post">
							<button class="border-0 btn btn-secondary" name="LOT_BTN">Logout</button>
						</form>
					</div>
				</div>
			</div>